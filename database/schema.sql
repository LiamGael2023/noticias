-- Database Schema for NoticiasInvestiga
-- PHP MVC News Investigation Website

CREATE DATABASE IF NOT EXISTS noticias_investiga;
USE noticias_investiga;

-- Categories Table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    color VARCHAR(50) DEFAULT 'bg-blue-600',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- News Table
CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    image VARCHAR(500) NOT NULL,
    category_id INT NOT NULL,
    author VARCHAR(100) NOT NULL,
    read_time INT DEFAULT 5,
    featured TINYINT(1) DEFAULT 0,
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Ads Table
CREATE TABLE IF NOT EXISTS ads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(50) NOT NULL,
    title VARCHAR(100),
    image_url VARCHAR(500),
    link_url VARCHAR(500),
    size VARCHAR(50) NOT NULL,
    active TINYINT(1) DEFAULT 1,
    clicks INT DEFAULT 0,
    impressions INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert Categories
INSERT INTO categories (name, slug, color) VALUES
('Chavimochic', 'chavimochic', 'bg-blue-600'),
('Infraestructura', 'infraestructura', 'bg-green-600'),
('Agricultura', 'agricultura', 'bg-yellow-600'),
('Tecnología', 'tecnologia', 'bg-purple-600'),
('Economía', 'economia', 'bg-red-600');

-- Insert Sample News
INSERT INTO news (title, slug, excerpt, content, image, category_id, author, read_time, featured) VALUES
(
    'Avance del 85% en la Tercera Etapa del Proyecto Chavimochic',
    'avance-tercera-etapa-chavimochic',
    'El megaproyecto de irrigación alcanza un hito histórico con el avance significativo en las obras de la presa Palo Redondo.',
    '<p>El Proyecto Especial Chavimochic ha alcanzado un avance del 85% en la construcción de la Tercera Etapa, marcando un hito histórico en el desarrollo de la infraestructura hidráulica del norte del Perú.</p><h2>Detalles del Avance</h2><p>La presa Palo Redondo, pieza central de esta etapa, presenta un avance significativo en su estructura principal. Los trabajos de revestimiento del canal madre continúan según lo programado.</p><h2>Impacto Regional</h2><p>Se estima que esta etapa beneficiará a más de 63,000 hectáreas de tierras agrícolas, generando empleo directo para más de 150,000 familias en la región La Libertad.</p><h2>Próximos Pasos</h2><p>Las autoridades proyectan la culminación de las obras principales para el segundo semestre del próximo año, con pruebas de funcionamiento programadas para inicios del 2026.</p>',
    'https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=800',
    1, 'Carlos Mendoza', 5, 1
),
(
    'Nueva Tecnología de Riego Inteligente se Implementa en Valles de La Libertad',
    'tecnologia-riego-inteligente-libertad',
    'Sistemas de sensores IoT permiten optimizar el uso del agua en un 40%, beneficiando a agricultores de la región.',
    '<p>Una revolucionaria tecnología de riego inteligente basada en Internet de las Cosas (IoT) está siendo implementada en los valles irrigados por el Proyecto Chavimochic.</p><h2>Tecnología de Punta</h2><p>Los sensores instalados en campo monitorean en tiempo real la humedad del suelo, temperatura y necesidades hídricas de los cultivos, permitiendo una gestión precisa del recurso hídrico.</p><h2>Resultados Preliminares</h2><p>Las pruebas piloto han demostrado una reducción del 40% en el consumo de agua, manteniendo e incluso mejorando los rendimientos agrícolas.</p>',
    'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=800',
    4, 'María Torres', 4, 1
),
(
    'Exportaciones Agrícolas de La Libertad Crecen 25% Gracias a Chavimochic',
    'exportaciones-agricolas-crecen-chavimochic',
    'El arándano y la palta lideran el crecimiento de las agroexportaciones regionales con mercados en Asia y Europa.',
    '<p>Las exportaciones agrícolas de la región La Libertad han experimentado un crecimiento del 25% durante el presente año, impulsadas principalmente por la producción en las áreas irrigadas por Chavimochic.</p><h2>Productos Estrella</h2><p>El arándano continúa siendo el producto líder, seguido por la palta Hass y los espárragos. Nuevos cultivos como los arándanos orgánicos están ganando terreno en mercados premium.</p>',
    'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=800',
    5, 'Roberto Sánchez', 3, 1
),
(
    'Inauguran Moderno Centro de Investigación Agrícola en Virú',
    'centro-investigacion-agricola-viru',
    'El nuevo centro permitirá desarrollar variedades de cultivos adaptadas a las condiciones climáticas de la costa norte.',
    '<p>Con una inversión de 15 millones de soles, se inauguró el Centro de Investigación Agrícola de Virú, una instalación de última generación dedicada al desarrollo de nuevas variedades de cultivos.</p><h2>Instalaciones</h2><p>El centro cuenta con laboratorios de biotecnología, invernaderos automatizados y campos experimentales que permitirán realizar investigación de alto nivel.</p>',
    'https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=800',
    3, 'Ana García', 4, 1
),
(
    'Plan Maestro de Infraestructura Vial Conectará Zonas Agrícolas',
    'plan-maestro-infraestructura-vial',
    'Proyecto contempla 200 km de nuevas carreteras para mejorar la conectividad de las áreas productivas.',
    '<p>El Gobierno Regional de La Libertad presentó el Plan Maestro de Infraestructura Vial que contempla la construcción de 200 kilómetros de nuevas carreteras.</p><h2>Objetivos</h2><p>El plan busca reducir los tiempos de traslado de productos agrícolas hacia los puertos de embarque, mejorando la competitividad de las exportaciones regionales.</p>',
    'https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=800',
    2, 'Pedro López', 5, 0
),
(
    'Programa de Capacitación Beneficia a 5,000 Agricultores',
    'programa-capacitacion-agricultores',
    'Iniciativa público-privada fortalece las capacidades técnicas de los productores en manejo de cultivos de exportación.',
    '<p>Un ambicioso programa de capacitación está beneficiando a más de 5,000 agricultores de la región, brindándoles conocimientos actualizados sobre técnicas de cultivo y gestión empresarial.</p><h2>Contenido del Programa</h2><p>Los módulos incluyen manejo integrado de plagas, fertirrigación, buenas prácticas agrícolas y certificaciones internacionales.</p>',
    'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?w=800',
    3, 'Luis Ramírez', 3, 0
),
(
    'Innovador Sistema de Monitoreo Satelital para Cultivos',
    'sistema-monitoreo-satelital-cultivos',
    'Imágenes satelitales de alta resolución permiten detectar problemas en cultivos antes de que sean visibles.',
    '<p>Un nuevo sistema de monitoreo satelital está revolucionando la agricultura de precisión en los valles de Chavimochic, permitiendo a los agricultores tomar decisiones basadas en datos.</p><h2>Funcionamiento</h2><p>El sistema utiliza imágenes multiespectrales para analizar la salud de los cultivos, detectando estrés hídrico, deficiencias nutricionales y presencia de plagas.</p>',
    'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800',
    4, 'Carmen Vega', 4, 0
),
(
    'Récord Histórico en Producción de Arándanos',
    'record-produccion-arandanos',
    'La Libertad consolida su posición como principal productor de arándanos del país con cifras sin precedentes.',
    '<p>La región La Libertad ha establecido un nuevo récord en la producción de arándanos, consolidándose como el principal polo arandanero del Perú y uno de los más importantes de Sudamérica.</p><h2>Cifras</h2><p>La producción alcanzó las 180,000 toneladas métricas, representando un incremento del 30% respecto al año anterior.</p>',
    'https://images.unsplash.com/photo-1498557850523-fd3d118b962e?w=800',
    5, 'Jorge Flores', 3, 0
),
(
    'Proyecto de Energía Solar para Estaciones de Bombeo',
    'energia-solar-estaciones-bombeo',
    'Implementación de paneles solares reducirá costos operativos del sistema de riego en un 35%.',
    '<p>El Proyecto Chavimochic iniciará la instalación de sistemas de energía solar en sus principales estaciones de bombeo, buscando reducir la dependencia energética y los costos operativos.</p><h2>Beneficios</h2><p>Se estima un ahorro anual de 2 millones de soles en costos de energía eléctrica, además de reducir la huella de carbono del proyecto.</p>',
    'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800',
    4, 'Elena Vargas', 4, 0
),
(
    'Alianza Estratégica con Universidades para Investigación',
    'alianza-universidades-investigacion',
    'Convenio permitirá desarrollar proyectos de investigación aplicada en agricultura de precisión.',
    '<p>El Proyecto Chavimochic firmó convenios de cooperación con tres universidades peruanas para el desarrollo de investigación aplicada en temas de agricultura de precisión y gestión hídrica.</p><h2>Áreas de Investigación</h2><p>Los proyectos incluyen desarrollo de sensores de bajo costo, modelos predictivos de riego y variedades de cultivos resistentes al cambio climático.</p>',
    'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800',
    4, 'Ricardo Medina', 5, 0
);

-- Insert Default Ad Slots
INSERT INTO ads (position, title, size, active) VALUES
('header', 'Anuncio Principal', '728x90', 1),
('sidebar-top', 'Sidebar Superior', '300x250', 1),
('sidebar-middle', 'Sidebar Medio', '300x600', 1),
('sidebar-bottom', 'Sidebar Inferior', '300x250', 1),
('in-feed', 'Entre Noticias', '728x90', 1),
('mid-article', 'Mitad de Artículo', '728x90', 1),
('pre-footer', 'Pre Footer', '728x90', 1),
('footer', 'Footer', '728x90', 1);
