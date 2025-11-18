import { notFound } from 'next/navigation';
import Image from 'next/image';
import Link from 'next/link';
import { getNewsBySlug, newsData } from '@/data/news';
import Sidebar from '@/components/layout/Sidebar';
import AdBanner from '@/components/ads/AdBanner';
import NewsCard from '@/components/news/NewsCard';

interface Props {
  params: Promise<{ slug: string }>;
}

export async function generateStaticParams() {
  return newsData.map((news) => ({
    slug: news.slug,
  }));
}

export async function generateMetadata({ params }: Props) {
  const { slug } = await params;
  const news = getNewsBySlug(slug);

  if (!news) {
    return {
      title: 'Noticia no encontrada',
    };
  }

  return {
    title: `${news.title} - NoticiasInvestiga`,
    description: news.excerpt,
  };
}

export default async function NewsDetailPage({ params }: Props) {
  const { slug } = await params;
  const news = getNewsBySlug(slug);

  if (!news) {
    notFound();
  }

  const relatedNews = newsData
    .filter(n => n.category === news.category && n.id !== news.id)
    .slice(0, 3);

  return (
    <div className="container mx-auto px-4 py-8">
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {/* Main Content */}
        <article className="lg:col-span-2">
          {/* Breadcrumb */}
          <nav className="text-sm mb-4">
            <ol className="flex items-center space-x-2 text-gray-500">
              <li>
                <Link href="/" className="hover:text-blue-600">
                  Inicio
                </Link>
              </li>
              <li>/</li>
              <li>
                <Link
                  href={`/categoria/${news.category.toLowerCase()}`}
                  className="hover:text-blue-600"
                >
                  {news.category}
                </Link>
              </li>
              <li>/</li>
              <li className="text-gray-900 truncate max-w-[200px]">{news.title}</li>
            </ol>
          </nav>

          {/* Article Header */}
          <header className="mb-6">
            <span className="inline-block px-3 py-1 bg-blue-600 text-white text-sm font-semibold rounded-full mb-4">
              {news.category}
            </span>
            <h1 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
              {news.title}
            </h1>
            <p className="text-lg text-gray-600 mb-4">
              {news.excerpt}
            </p>
            <div className="flex items-center text-sm text-gray-500 pb-4 border-b">
              <div className="flex items-center">
                <div className="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                  <span className="text-gray-600 font-semibold">
                    {news.author.charAt(0)}
                  </span>
                </div>
                <div>
                  <p className="font-medium text-gray-900">{news.author}</p>
                  <p>{news.date} • {news.readTime} min de lectura</p>
                </div>
              </div>
              {/* Share buttons */}
              <div className="ml-auto flex items-center space-x-2">
                <button className="p-2 hover:bg-gray-100 rounded-full" title="Compartir en Twitter">
                  <svg className="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                  </svg>
                </button>
                <button className="p-2 hover:bg-gray-100 rounded-full" title="Compartir en Facebook">
                  <svg className="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                  </svg>
                </button>
              </div>
            </div>
          </header>

          {/* Featured Image */}
          <div className="relative w-full h-[300px] md:h-[400px] rounded-xl overflow-hidden mb-6">
            <Image
              src={news.image}
              alt={news.title}
              fill
              className="object-cover"
              priority
            />
          </div>

          {/* Article Content */}
          <div
            className="article-content prose prose-lg max-w-none mb-8"
            dangerouslySetInnerHTML={{ __html: news.content }}
          />

          {/* Mid Article Ad */}
          <AdBanner position="mid-article" className="my-8" />

          {/* Tags */}
          <div className="flex flex-wrap gap-2 mb-8">
            <span className="text-sm font-medium text-gray-700 mr-2">Etiquetas:</span>
            <Link
              href={`/categoria/${news.category.toLowerCase()}`}
              className="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-blue-100 hover:text-blue-600 transition-colors"
            >
              {news.category}
            </Link>
            <span className="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">
              Chavimochic
            </span>
            <span className="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">
              La Libertad
            </span>
          </div>

          {/* Related News */}
          {relatedNews.length > 0 && (
            <section className="border-t pt-8">
              <h2 className="text-2xl font-bold text-gray-900 mb-6">
                Noticias Relacionadas
              </h2>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                {relatedNews.map((item) => (
                  <NewsCard key={item.id} news={item} />
                ))}
              </div>
            </section>
          )}
        </article>

        {/* Sidebar */}
        <div className="lg:col-span-1">
          <Sidebar />
        </div>
      </div>
    </div>
  );
}
