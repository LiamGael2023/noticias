import FeaturedNews from '@/components/news/FeaturedNews';
import NewsList from '@/components/news/NewsList';
import Sidebar from '@/components/layout/Sidebar';
import { newsData } from '@/data/news';

export default function Home() {
  const regularNews = newsData.filter(news => !news.featured);

  return (
    <div className="container mx-auto px-4 py-8">
      {/* Featured News Section */}
      <FeaturedNews />

      {/* Main Content with Sidebar */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {/* News List */}
        <div className="lg:col-span-2">
          <h2 className="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-blue-600">
            Últimas Noticias
          </h2>
          <NewsList news={regularNews} />
        </div>

        {/* Sidebar */}
        <div className="lg:col-span-1">
          <Sidebar />
        </div>
      </div>
    </div>
  );
}
