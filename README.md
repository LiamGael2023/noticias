# NoticiasInvestiga - Portal de Noticias de Investigación

Portal de noticias PHP MVC dedicado a la investigación periodística y seguimiento de proyectos de desarrollo regional, con enfoque en Chavimochic y la región La Libertad.

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Apache con mod_rewrite habilitado

## Instalación

1. **Configurar la base de datos:**
   ```bash
   mysql -u root -p < database/schema.sql
   ```

2. **Configurar el proyecto:**
   Editar `config/config.php` con tus credenciales de base de datos:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'tu_usuario');
   define('DB_PASS', 'tu_contraseña');
   define('DB_NAME', 'noticias_investiga');
   define('APP_URL', 'http://tu-dominio.com');
   ```

3. **Configurar Apache:**
   Asegúrate de que el DocumentRoot apunte a la carpeta `public/` o configura un VirtualHost.

4. **Acceder al sitio:**
   Abre `http://localhost/noticias` en tu navegador.

## Estructura del Proyecto

```
noticias/
├── app/
│   ├── controllers/     # Controladores MVC
│   ├── models/          # Modelos de datos
│   └── views/           # Vistas y plantillas
│       ├── layouts/     # Layouts principales
│       ├── partials/    # Componentes reutilizables
│       ├── home/        # Vistas de inicio
│       ├── news/        # Vistas de noticias
│       └── category/    # Vistas de categorías
├── config/              # Configuración
├── core/                # Clases base MVC
├── database/            # Scripts SQL
└── public/              # Punto de entrada web
    ├── css/
    ├── js/
    └── images/
```

## Ubicaciones de Anuncios

El sistema incluye espacios para anuncios en las siguientes posiciones:

| Posición | Tamaño | Ubicación |
|----------|--------|-----------|
| Header Principal | 728x90 | Parte superior del sitio |
| Sidebar Superior | 300x250 | Barra lateral (arriba) |
| Sidebar Medio | 300x600 | Barra lateral (sticky) |
| Sidebar Inferior | 300x250 | Barra lateral (abajo) |
| In-Feed | 728x90 | Entre noticias |
| Mid-Article | 728x90 | Dentro de artículos |
| Pre-Footer | 728x90 | Antes del footer |
| Footer | 728x90 | En el footer |

## Características

- Diseño responsive con Tailwind CSS
- Sistema MVC completo
- Rutas amigables (SEO)
- 5 categorías: Chavimochic, Infraestructura, Agricultura, Tecnología, Economía
- Noticias destacadas
- Búsqueda de noticias
- Noticias relacionadas
- Contador de visitas
- Formulario de suscripción

## Categorías

- **Chavimochic** - Proyecto de irrigación
- **Infraestructura** - Obras y construcción
- **Agricultura** - Cultivos y producción
- **Tecnología** - Innovación tecnológica
- **Economía** - Desarrollo económico

## Licencia

Todos los derechos reservados.
