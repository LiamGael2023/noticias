<?php
/**
 * Category Controller
 */

class CategoryController extends Controller {

    public function show($slug) {
        $newsModel = $this->model('News');
        $categoryModel = $this->model('Category');

        $category = $categoryModel->getBySlug($slug);

        if (!$category) {
            http_response_code(404);
            $this->view('layouts/404', ['title' => 'Categoría no encontrada']);
            return;
        }

        // Get news for this category
        $news = $newsModel->getByCategory($category['id']);

        // Get sidebar data
        $recentNews = $newsModel->getRecent(5);
        $categories = $categoryModel->getAllWithCount();

        $this->view('category/show', [
            'title' => $category['name'],
            'category' => $category,
            'news' => $news,
            'recentNews' => $recentNews,
            'categories' => $categories
        ]);
    }
}
