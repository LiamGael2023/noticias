import { News } from '@/lib/types';
import NewsCard from './NewsCard';
import AdBanner from '../ads/AdBanner';

interface NewsListProps {
  news: News[];
  showAds?: boolean;
}

export default function NewsList({ news, showAds = true }: NewsListProps) {
  return (
    <div className="space-y-6">
      <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
        {news.map((item, index) => (
          <div key={item.id}>
            <NewsCard news={item} />

            {/* In-feed ad after every 4th item */}
            {showAds && (index + 1) % 4 === 0 && index < news.length - 1 && (
              <div className="md:col-span-2 my-6">
                <AdBanner position="in-feed" />
              </div>
            )}
          </div>
        ))}
      </div>

      {/* Show in-feed ad at the end if there are items but not divisible by 4 */}
      {showAds && news.length > 0 && news.length % 4 !== 0 && (
        <div className="mt-6">
          <AdBanner position="in-feed" />
        </div>
      )}
    </div>
  );
}
