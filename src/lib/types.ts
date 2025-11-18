export interface News {
  id: string;
  title: string;
  slug: string;
  excerpt: string;
  content: string;
  image: string;
  category: string;
  author: string;
  date: string;
  readTime: number;
  featured?: boolean;
}

export interface AdSlot {
  id: string;
  position: 'header' | 'sidebar-top' | 'sidebar-middle' | 'sidebar-bottom' | 'in-feed' | 'mid-article' | 'pre-footer' | 'footer';
  size: string;
  imageUrl?: string;
  link?: string;
  alt?: string;
}

export interface Category {
  id: string;
  name: string;
  slug: string;
  color: string;
}
