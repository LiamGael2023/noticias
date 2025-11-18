<?php
/**
 * Home Controller
 */

class HomeController extends Controller {

    public function index() {
        $newsModel = $this->model('News');
        $categoryModel = $this->model('Category');

        $featuredNews = $newsModel->getFeatured(3);
        $regularNews = $newsModel->getNonFeatured();
        $recentNews = $newsModel->getRecent(5);
        $categories = $categoryModel->getAllWithCount();

        $this->view('home/index', [
            'title' => 'Inicio',
            'featuredNews' => $featuredNews,
            'regularNews' => $regularNews,
            'recentNews' => $recentNews,
            'categories' => $categories
        ]);
    }

    public function search() {
        $term = isset($_GET['q']) ? trim($_GET['q']) : '';

        $newsModel = $this->model('News');
        $categoryModel = $this->model('Category');

        $results = [];
        if (!empty($term)) {
            $results = $newsModel->search($term);
        }

        $recentNews = $newsModel->getRecent(5);
        $categories = $categoryModel->getAllWithCount();

        $this->view('home/search', [
            'title' => 'Buscar: ' . htmlspecialchars($term),
            'term' => $term,
            'results' => $results,
            'recentNews' => $recentNews,
            'categories' => $categories
        ]);
    }
}
