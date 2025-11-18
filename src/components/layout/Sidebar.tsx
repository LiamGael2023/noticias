import AdBanner from '../ads/AdBanner';
import { newsData, categories } from '@/data/news';
import Link from 'next/link';

export default function Sidebar() {
  const recentNews = newsData.slice(0, 5);

  return (
    <aside className="space-y-6">
      {/* Top Sidebar Ad */}
      <AdBanner position="sidebar-top" className="hidden lg:flex" />

      {/* Recent News */}
      <div className="bg-white rounded-xl shadow-sm p-4">
        <h3 className="text-lg font-bold text-gray-900 mb-4 pb-2 border-b">
          Noticias Recientes
        </h3>
        <ul className="space-y-4">
          {recentNews.map((news, index) => (
            <li key={news.id} className="flex gap-3">
              <span className="flex-shrink-0 w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm">
                {index + 1}
              </span>
              <div className="flex-1 min-w-0">
                <Link
                  href={`/noticia/${news.slug}`}
                  className="text-sm font-medium text-gray-800 hover:text-blue-600 transition-colors line-clamp-2"
                >
                  {news.title}
                </Link>
                <p className="text-xs text-gray-500 mt-1">{news.date}</p>
              </div>
            </li>
          ))}
        </ul>
      </div>

      {/* Middle Sidebar Ad - Sticky */}
      <div className="sticky top-4">
        <AdBanner position="sidebar-middle" className="hidden lg:flex" />
      </div>

      {/* Categories Widget */}
      <div className="bg-white rounded-xl shadow-sm p-4">
        <h3 className="text-lg font-bold text-gray-900 mb-4 pb-2 border-b">
          Categorías
        </h3>
        <ul className="space-y-2">
          {categories.map((category) => (
            <li key={category.id}>
              <Link
                href={`/categoria/${category.slug}`}
                className="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition-colors group"
              >
                <span className="flex items-center gap-2">
                  <span className={`w-3 h-3 rounded-full ${category.color}`}></span>
                  <span className="text-sm text-gray-700 group-hover:text-blue-600">
                    {category.name}
                  </span>
                </span>
                <svg
                  className="w-4 h-4 text-gray-400 group-hover:text-blue-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M9 5l7 7-7 7"
                  />
                </svg>
              </Link>
            </li>
          ))}
        </ul>
      </div>

      {/* Newsletter Signup */}
      <div className="bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl shadow-sm p-4 text-white">
        <h3 className="text-lg font-bold mb-2">Suscríbete</h3>
        <p className="text-sm text-blue-100 mb-4">
          Recibe las últimas noticias en tu correo
        </p>
        <form className="space-y-2">
          <input
            type="email"
            placeholder="tu@email.com"
            className="w-full px-3 py-2 rounded-lg text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-white"
          />
          <button
            type="submit"
            className="w-full px-3 py-2 bg-white text-blue-600 rounded-lg text-sm font-semibold hover:bg-blue-50 transition-colors"
          >
            Suscribirse
          </button>
        </form>
      </div>

      {/* Bottom Sidebar Ad */}
      <AdBanner position="sidebar-bottom" className="hidden lg:flex" />
    </aside>
  );
}
