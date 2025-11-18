<?php
/**
 * Admin Controller
 */

class AdminController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    /**
     * Check if user is authenticated
     */
    private function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . APP_URL . "/admin/login");
            exit;
        }
    }

    /**
     * Dashboard
     */
    public function index() {
        $newsModel = $this->model('News');
        $categoryModel = $this->model('Category');

        // Get stats
        $allNews = $newsModel->all();
        $totalNews = count($allNews);
        $totalCategories = count($categoryModel->all());

        // Count published news
        $publishedNews = 0;
        $totalViews = 0;
        foreach ($allNews as $news) {
            if (($news['status'] ?? 'published') === 'published') {
                $publishedNews++;
            }
            $totalViews += $news['views'] ?? 0;
        }

        $recentNews = $newsModel->getRecent(5);

        $this->view('admin/dashboard', [
            'title' => 'Dashboard',
            'totalNews' => $totalNews,
            'publishedNews' => $publishedNews,
            'totalCategories' => $totalCategories,
            'totalViews' => $totalViews,
            'recentNews' => $recentNews
        ]);
    }

    /**
     * List all news
     */
    public function news() {
        $newsModel = $this->model('News');
        $news = $newsModel->getAllWithCategory();

        $this->view('admin/news/index', [
            'title' => 'Gestionar Noticias',
            'news' => $news
        ]);
    }

    /**
     * Create news form
     */
    public function newsCreate() {
        $categoryModel = $this->model('Category');
        $categories = $categoryModel->all('name ASC');

        $this->view('admin/news/create', [
            'title' => 'Nueva Noticia',
            'categories' => $categories
        ]);
    }

    /**
     * Store new news
     */
    public function newsStore() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/news');
        }

        $newsModel = $this->model('News');

        $title = trim($_POST['title'] ?? '');
        $slug = $this->createSlug($title);
        $excerpt = trim($_POST['excerpt'] ?? '');
        $content = $_POST['content'] ?? '';
        $image = trim($_POST['image'] ?? '');
        $categoryId = (int)($_POST['category_id'] ?? 0);
        $author = trim($_POST['author'] ?? $_SESSION['user_name']);
        $readTime = (int)($_POST['read_time'] ?? 5);
        $featured = isset($_POST['featured']) ? 1 : 0;

        $sql = "INSERT INTO news (title, slug, excerpt, content, image, category_id, author, read_time, featured)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $newsModel->query($sql, [$title, $slug, $excerpt, $content, $image, $categoryId, $author, $readTime, $featured]);

        $_SESSION['flash_message'] = 'Noticia creada exitosamente';
        $this->redirect('/admin/news');
    }

    /**
     * Edit news form
     */
    public function newsEdit($id) {
        $newsModel = $this->model('News');
        $categoryModel = $this->model('Category');

        $news = $newsModel->find($id);
        if (!$news) {
            $this->redirect('/admin/news');
        }

        $categories = $categoryModel->all('name ASC');

        $this->view('admin/news/edit', [
            'title' => 'Editar Noticia',
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update news
     */
    public function newsUpdate($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/news');
        }

        $newsModel = $this->model('News');

        $title = trim($_POST['title'] ?? '');
        $slug = $this->createSlug($title);
        $excerpt = trim($_POST['excerpt'] ?? '');
        $content = $_POST['content'] ?? '';
        $image = trim($_POST['image'] ?? '');
        $categoryId = (int)($_POST['category_id'] ?? 0);
        $author = trim($_POST['author'] ?? '');
        $readTime = (int)($_POST['read_time'] ?? 5);
        $featured = isset($_POST['featured']) ? 1 : 0;

        $sql = "UPDATE news SET title = ?, slug = ?, excerpt = ?, content = ?, image = ?,
                category_id = ?, author = ?, read_time = ?, featured = ? WHERE id = ?";

        $newsModel->query($sql, [$title, $slug, $excerpt, $content, $image, $categoryId, $author, $readTime, $featured, $id]);

        $_SESSION['flash_message'] = 'Noticia actualizada exitosamente';
        $this->redirect('/admin/news');
    }

    /**
     * Delete news
     */
    public function newsDelete($id) {
        $newsModel = $this->model('News');
        $newsModel->delete($id);

        $_SESSION['flash_message'] = 'Noticia eliminada exitosamente';
        $this->redirect('/admin/news');
    }

    /**
     * List categories
     */
    public function categories() {
        $categoryModel = $this->model('Category');
        $categories = $categoryModel->getAllWithCount();

        $this->view('admin/categories/index', [
            'title' => 'Gestionar Categorías',
            'categories' => $categories
        ]);
    }

    /**
     * Store new category
     */
    public function categoryStore() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/categories');
        }

        $categoryModel = $this->model('Category');

        $name = trim($_POST['name'] ?? '');
        $slug = $this->createSlug($name);
        $color = trim($_POST['color'] ?? 'bg-blue-600');

        $sql = "INSERT INTO categories (name, slug, color) VALUES (?, ?, ?)";
        $categoryModel->query($sql, [$name, $slug, $color]);

        $_SESSION['flash_message'] = 'Categoría creada exitosamente';
        $this->redirect('/admin/categories');
    }

    /**
     * Update category
     */
    public function categoryUpdate($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/categories');
        }

        $categoryModel = $this->model('Category');

        $name = trim($_POST['name'] ?? '');
        $slug = $this->createSlug($name);
        $color = trim($_POST['color'] ?? 'bg-blue-600');

        $sql = "UPDATE categories SET name = ?, slug = ?, color = ? WHERE id = ?";
        $categoryModel->query($sql, [$name, $slug, $color, $id]);

        $_SESSION['flash_message'] = 'Categoría actualizada exitosamente';
        $this->redirect('/admin/categories');
    }

    /**
     * Delete category
     */
    public function categoryDelete($id) {
        $categoryModel = $this->model('Category');
        $categoryModel->delete($id);

        $_SESSION['flash_message'] = 'Categoría eliminada exitosamente';
        $this->redirect('/admin/categories');
    }

    /**
     * Create slug from string
     */
    private function createSlug($string) {
        $slug = strtolower(trim($string));
        $slug = preg_replace('/[áàäâã]/u', 'a', $slug);
        $slug = preg_replace('/[éèëê]/u', 'e', $slug);
        $slug = preg_replace('/[íìïî]/u', 'i', $slug);
        $slug = preg_replace('/[óòöôõ]/u', 'o', $slug);
        $slug = preg_replace('/[úùüû]/u', 'u', $slug);
        $slug = preg_replace('/[ñ]/u', 'n', $slug);
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }
}
