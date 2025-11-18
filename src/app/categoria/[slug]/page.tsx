import { notFound } from 'next/navigation';
import { categories, getNewsByCategory, newsData } from '@/data/news';
import Sidebar from '@/components/layout/Sidebar';
import NewsList from '@/components/news/NewsList';

interface Props {
  params: Promise<{ slug: string }>;
}

export async function generateStaticParams() {
  return categories.map((category) => ({
    slug: category.slug,
  }));
}

export async function generateMetadata({ params }: Props) {
  const { slug } = await params;
  const category = categories.find(c => c.slug === slug);

  if (!category) {
    return {
      title: 'Categoría no encontrada',
    };
  }

  return {
    title: `${category.name} - NoticiasInvestiga`,
    description: `Últimas noticias sobre ${category.name} en NoticiasInvestiga`,
  };
}

export default async function CategoryPage({ params }: Props) {
  const { slug } = await params;
  const category = categories.find(c => c.slug === slug);

  if (!category) {
    notFound();
  }

  const categoryNews = newsData.filter(
    news => news.category.toLowerCase() === category.name.toLowerCase()
  );

  return (
    <div className="container mx-auto px-4 py-8">
      {/* Category Header */}
      <div className="mb-8">
        <div className="flex items-center gap-3 mb-4">
          <span className={`w-4 h-4 rounded-full ${category.color}`}></span>
          <h1 className="text-3xl md:text-4xl font-bold text-gray-900">
            {category.name}
          </h1>
        </div>
        <p className="text-gray-600">
          {categoryNews.length} {categoryNews.length === 1 ? 'noticia' : 'noticias'} encontradas
        </p>
      </div>

      {/* Main Content with Sidebar */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {/* News List */}
        <div className="lg:col-span-2">
          {categoryNews.length > 0 ? (
            <NewsList news={categoryNews} />
          ) : (
            <div className="text-center py-12">
              <p className="text-gray-500 text-lg">
                No hay noticias en esta categoría por el momento.
              </p>
            </div>
          )}
        </div>

        {/* Sidebar */}
        <div className="lg:col-span-1">
          <Sidebar />
        </div>
      </div>
    </div>
  );
}
