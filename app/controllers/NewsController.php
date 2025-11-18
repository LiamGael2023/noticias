<?php
/**
 * News Controller
 */

class NewsController extends Controller {

    public function show($slug) {
        $newsModel = $this->model('News');
        $categoryModel = $this->model('Category');

        $news = $newsModel->getBySlug($slug);

        if (!$news) {
            http_response_code(404);
            $this->view('layouts/404', ['title' => 'Noticia no encontrada']);
            return;
        }

        // Increment views
        $newsModel->incrementViews($news['id']);

        // Get related news
        $relatedNews = $newsModel->getRelated($news['category_id'], $news['id'], 3);

        // Get sidebar data
        $recentNews = $newsModel->getRecent(5);
        $categories = $categoryModel->getAllWithCount();

        $this->view('news/show', [
            'title' => $news['title'],
            'news' => $news,
            'relatedNews' => $relatedNews,
            'recentNews' => $recentNews,
            'categories' => $categories
        ]);
    }
}
