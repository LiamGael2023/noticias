import Image from 'next/image';
import Link from 'next/link';
import { News } from '@/lib/types';

interface NewsCardProps {
  news: News;
  variant?: 'default' | 'compact' | 'featured';
}

export default function NewsCard({ news, variant = 'default' }: NewsCardProps) {
  if (variant === 'featured') {
    return (
      <article className="group relative overflow-hidden rounded-2xl bg-gray-900 h-[400px] md:h-[500px]">
        <Image
          src={news.image}
          alt={news.title}
          fill
          className="object-cover opacity-60 group-hover:scale-105 transition-transform duration-500"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent" />
        <div className="absolute bottom-0 left-0 right-0 p-6 md:p-8">
          <span className="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full mb-3">
            {news.category}
          </span>
          <Link href={`/noticia/${news.slug}`}>
            <h2 className="text-xl md:text-3xl font-bold text-white mb-3 group-hover:text-blue-300 transition-colors line-clamp-3">
              {news.title}
            </h2>
          </Link>
          <p className="text-gray-300 text-sm md:text-base mb-4 line-clamp-2">
            {news.excerpt}
          </p>
          <div className="flex items-center text-sm text-gray-400">
            <span>{news.author}</span>
            <span className="mx-2">•</span>
            <span>{news.date}</span>
            <span className="mx-2">•</span>
            <span>{news.readTime} min lectura</span>
          </div>
        </div>
      </article>
    );
  }

  if (variant === 'compact') {
    return (
      <article className="group flex gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
        <div className="relative w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
          <Image
            src={news.image}
            alt={news.title}
            fill
            className="object-cover group-hover:scale-105 transition-transform duration-300"
          />
        </div>
        <div className="flex-1 min-w-0">
          <span className="text-xs font-semibold text-blue-600">{news.category}</span>
          <Link href={`/noticia/${news.slug}`}>
            <h3 className="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 mt-1">
              {news.title}
            </h3>
          </Link>
          <p className="text-xs text-gray-500 mt-1">{news.date}</p>
        </div>
      </article>
    );
  }

  return (
    <article className="group bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
      <div className="relative h-48 overflow-hidden">
        <Image
          src={news.image}
          alt={news.title}
          fill
          className="object-cover group-hover:scale-105 transition-transform duration-300"
        />
        <span className="absolute top-3 left-3 px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">
          {news.category}
        </span>
      </div>
      <div className="p-4">
        <Link href={`/noticia/${news.slug}`}>
          <h3 className="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 mb-2">
            {news.title}
          </h3>
        </Link>
        <p className="text-sm text-gray-600 line-clamp-2 mb-3">
          {news.excerpt}
        </p>
        <div className="flex items-center justify-between text-xs text-gray-500">
          <span>{news.author}</span>
          <span>{news.readTime} min</span>
        </div>
      </div>
    </article>
  );
}
