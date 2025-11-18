import { getFeaturedNews } from '@/data/news';
import NewsCard from './NewsCard';

export default function FeaturedNews() {
  const featuredNews = getFeaturedNews();
  const mainNews = featuredNews[0];
  const secondaryNews = featuredNews.slice(1, 3);

  return (
    <section className="mb-8">
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-4">
        {/* Main Featured */}
        {mainNews && (
          <div className="lg:row-span-2">
            <NewsCard news={mainNews} variant="featured" />
          </div>
        )}

        {/* Secondary Featured */}
        <div className="grid grid-cols-1 gap-4">
          {secondaryNews.map((news) => (
            <div key={news.id} className="relative overflow-hidden rounded-xl bg-gray-900 h-[200px] md:h-[242px] group">
              <img
                src={news.image}
                alt={news.title}
                className="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent" />
              <div className="absolute bottom-0 left-0 right-0 p-4">
                <span className="inline-block px-2 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full mb-2">
                  {news.category}
                </span>
                <a href={`/noticia/${news.slug}`}>
                  <h3 className="text-lg font-bold text-white group-hover:text-blue-300 transition-colors line-clamp-2">
                    {news.title}
                  </h3>
                </a>
                <div className="flex items-center text-xs text-gray-400 mt-2">
                  <span>{news.date}</span>
                  <span className="mx-2">•</span>
                  <span>{news.readTime} min</span>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
