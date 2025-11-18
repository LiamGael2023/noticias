import { News, Category } from '@/lib/types';

export const categories: Category[] = [
  { id: '1', name: 'Chavimochic', slug: 'chavimochic', color: 'bg-blue-600' },
  { id: '2', name: 'Infraestructura', slug: 'infraestructura', color: 'bg-green-600' },
  { id: '3', name: 'Agricultura', slug: 'agricultura', color: 'bg-yellow-600' },
  { id: '4', name: 'Tecnología', slug: 'tecnologia', color: 'bg-purple-600' },
  { id: '5', name: 'Economía', slug: 'economia', color: 'bg-red-600' },
];

export const newsData: News[] = [
  {
    id: '1',
    title: 'Avance del 85% en la Tercera Etapa del Proyecto Chavimochic',
    slug: 'avance-tercera-etapa-chavimochic',
    excerpt: 'El megaproyecto de irrigación alcanza un hito histórico con el avance significativo en las obras de la presa Palo Redondo.',
    content: `
      <p>El Proyecto Especial Chavimochic ha alcanzado un avance del 85% en la construcción de la Tercera Etapa, marcando un hito histórico en el desarrollo de la infraestructura hidráulica del norte del Perú.</p>

      <h2>Detalles del Avance</h2>
      <p>La presa Palo Redondo, pieza central de esta etapa, presenta un avance significativo en su estructura principal. Los trabajos de revestimiento del canal madre continúan según lo programado.</p>

      <h2>Impacto Regional</h2>
      <p>Se estima que esta etapa beneficiará a más de 63,000 hectáreas de tierras agrícolas, generando empleo directo para más de 150,000 familias en la región La Libertad.</p>

      <h2>Próximos Pasos</h2>
      <p>Las autoridades proyectan la culminación de las obras principales para el segundo semestre del próximo año, con pruebas de funcionamiento programadas para inicios del 2026.</p>
    `,
    image: 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=800',
    category: 'Chavimochic',
    author: 'Carlos Mendoza',
    date: '2024-11-15',
    readTime: 5,
    featured: true,
  },
  {
    id: '2',
    title: 'Nueva Tecnología de Riego Inteligente se Implementa en Valles de La Libertad',
    slug: 'tecnologia-riego-inteligente-libertad',
    excerpt: 'Sistemas de sensores IoT permiten optimizar el uso del agua en un 40%, beneficiando a agricultores de la región.',
    content: `
      <p>Una revolucionaria tecnología de riego inteligente basada en Internet de las Cosas (IoT) está siendo implementada en los valles irrigados por el Proyecto Chavimochic.</p>

      <h2>Tecnología de Punta</h2>
      <p>Los sensores instalados en campo monitorean en tiempo real la humedad del suelo, temperatura y necesidades hídricas de los cultivos, permitiendo una gestión precisa del recurso hídrico.</p>

      <h2>Resultados Preliminares</h2>
      <p>Las pruebas piloto han demostrado una reducción del 40% en el consumo de agua, manteniendo e incluso mejorando los rendimientos agrícolas.</p>
    `,
    image: 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=800',
    category: 'Tecnología',
    author: 'María Torres',
    date: '2024-11-14',
    readTime: 4,
    featured: true,
  },
  {
    id: '3',
    title: 'Exportaciones Agrícolas de La Libertad Crecen 25% Gracias a Chavimochic',
    slug: 'exportaciones-agricolas-crecen-chavimochic',
    excerpt: 'El arándano y la palta lideran el crecimiento de las agroexportaciones regionales con mercados en Asia y Europa.',
    content: `
      <p>Las exportaciones agrícolas de la región La Libertad han experimentado un crecimiento del 25% durante el presente año, impulsadas principalmente por la producción en las áreas irrigadas por Chavimochic.</p>

      <h2>Productos Estrella</h2>
      <p>El arándano continúa siendo el producto líder, seguido por la palta Hass y los espárragos. Nuevos cultivos como los arándanos orgánicos están ganando terreno en mercados premium.</p>
    `,
    image: 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=800',
    category: 'Economía',
    author: 'Roberto Sánchez',
    date: '2024-11-13',
    readTime: 3,
  },
  {
    id: '4',
    title: 'Inauguran Moderno Centro de Investigación Agrícola en Virú',
    slug: 'centro-investigacion-agricola-viru',
    excerpt: 'El nuevo centro permitirá desarrollar variedades de cultivos adaptadas a las condiciones climáticas de la costa norte.',
    content: `
      <p>Con una inversión de 15 millones de soles, se inauguró el Centro de Investigación Agrícola de Virú, una instalación de última generación dedicada al desarrollo de nuevas variedades de cultivos.</p>

      <h2>Instalaciones</h2>
      <p>El centro cuenta con laboratorios de biotecnología, invernaderos automatizados y campos experimentales que permitirán realizar investigación de alto nivel.</p>
    `,
    image: 'https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=800',
    category: 'Agricultura',
    author: 'Ana García',
    date: '2024-11-12',
    readTime: 4,
  },
  {
    id: '5',
    title: 'Plan Maestro de Infraestructura Vial Conectará Zonas Agrícolas',
    slug: 'plan-maestro-infraestructura-vial',
    excerpt: 'Proyecto contempla 200 km de nuevas carreteras para mejorar la conectividad de las áreas productivas.',
    content: `
      <p>El Gobierno Regional de La Libertad presentó el Plan Maestro de Infraestructura Vial que contempla la construcción de 200 kilómetros de nuevas carreteras.</p>

      <h2>Objetivos</h2>
      <p>El plan busca reducir los tiempos de traslado de productos agrícolas hacia los puertos de embarque, mejorando la competitividad de las exportaciones regionales.</p>
    `,
    image: 'https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=800',
    category: 'Infraestructura',
    author: 'Pedro López',
    date: '2024-11-11',
    readTime: 5,
  },
  {
    id: '6',
    title: 'Programa de Capacitación Beneficia a 5,000 Agricultores',
    slug: 'programa-capacitacion-agricultores',
    excerpt: 'Iniciativa público-privada fortalece las capacidades técnicas de los productores en manejo de cultivos de exportación.',
    content: `
      <p>Un ambicioso programa de capacitación está beneficiando a más de 5,000 agricultores de la región, brindándoles conocimientos actualizados sobre técnicas de cultivo y gestión empresarial.</p>

      <h2>Contenido del Programa</h2>
      <p>Los módulos incluyen manejo integrado de plagas, fertirrigación, buenas prácticas agrícolas y certificaciones internacionales.</p>
    `,
    image: 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?w=800',
    category: 'Agricultura',
    author: 'Luis Ramírez',
    date: '2024-11-10',
    readTime: 3,
  },
  {
    id: '7',
    title: 'Innovador Sistema de Monitoreo Satelital para Cultivos',
    slug: 'sistema-monitoreo-satelital-cultivos',
    excerpt: 'Imágenes satelitales de alta resolución permiten detectar problemas en cultivos antes de que sean visibles.',
    content: `
      <p>Un nuevo sistema de monitoreo satelital está revolucionando la agricultura de precisión en los valles de Chavimochic, permitiendo a los agricultores tomar decisiones basadas en datos.</p>

      <h2>Funcionamiento</h2>
      <p>El sistema utiliza imágenes multiespectrales para analizar la salud de los cultivos, detectando estrés hídrico, deficiencias nutricionales y presencia de plagas.</p>
    `,
    image: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800',
    category: 'Tecnología',
    author: 'Carmen Vega',
    date: '2024-11-09',
    readTime: 4,
  },
  {
    id: '8',
    title: 'Récord Histórico en Producción de Arándanos',
    slug: 'record-produccion-arandanos',
    excerpt: 'La Libertad consolida su posición como principal productor de arándanos del país con cifras sin precedentes.',
    content: `
      <p>La región La Libertad ha establecido un nuevo récord en la producción de arándanos, consolidándose como el principal polo arandanero del Perú y uno de los más importantes de Sudamérica.</p>

      <h2>Cifras</h2>
      <p>La producción alcanzó las 180,000 toneladas métricas, representando un incremento del 30% respecto al año anterior.</p>
    `,
    image: 'https://images.unsplash.com/photo-1498557850523-fd3d118b962e?w=800',
    category: 'Economía',
    author: 'Jorge Flores',
    date: '2024-11-08',
    readTime: 3,
  },
];

export function getNewsBySlug(slug: string): News | undefined {
  return newsData.find(news => news.slug === slug);
}

export function getFeaturedNews(): News[] {
  return newsData.filter(news => news.featured);
}

export function getNewsByCategory(category: string): News[] {
  return newsData.filter(news => news.category.toLowerCase() === category.toLowerCase());
}
