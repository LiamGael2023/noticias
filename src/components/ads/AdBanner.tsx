'use client';

import { AdSlot } from '@/lib/types';

interface AdBannerProps {
  position: AdSlot['position'];
  className?: string;
}

const adSizes: Record<AdSlot['position'], { width: string; height: string; label: string }> = {
  'header': { width: 'w-full max-w-[728px]', height: 'h-[90px]', label: '728x90' },
  'sidebar-top': { width: 'w-[300px]', height: 'h-[250px]', label: '300x250' },
  'sidebar-middle': { width: 'w-[300px]', height: 'h-[600px]', label: '300x600' },
  'sidebar-bottom': { width: 'w-[300px]', height: 'h-[250px]', label: '300x250' },
  'in-feed': { width: 'w-full max-w-[728px]', height: 'h-[90px]', label: '728x90' },
  'mid-article': { width: 'w-full max-w-[728px]', height: 'h-[90px]', label: '728x90' },
  'pre-footer': { width: 'w-full max-w-[728px]', height: 'h-[90px]', label: '728x90' },
  'footer': { width: 'w-full max-w-[728px]', height: 'h-[90px]', label: '728x90' },
};

export default function AdBanner({ position, className = '' }: AdBannerProps) {
  const size = adSizes[position];

  return (
    <div className={`flex justify-center ${className}`}>
      <div
        className={`
          ${size.width} ${size.height}
          bg-gradient-to-br from-gray-100 to-gray-200
          border-2 border-dashed border-gray-300
          rounded-lg
          flex flex-col items-center justify-center
          text-gray-500
          hover:border-gray-400 hover:bg-gray-100
          transition-all duration-300
          cursor-pointer
        `}
      >
        <span className="text-xs font-semibold uppercase tracking-wider mb-1">Publicidad</span>
        <span className="text-lg font-bold">{size.label}</span>
        <span className="text-xs mt-1 capitalize">{position.replace('-', ' ')}</span>
      </div>
    </div>
  );
}
