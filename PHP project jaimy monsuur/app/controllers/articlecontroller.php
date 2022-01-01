<?php
require __DIR__ . '/../services/articleservice.php';

class ArticleController
{

    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {


        require __DIR__ . '/../views/article/index.php';
    }

    public function single()
    {


        require __DIR__ . '/../views/article/single.php';
    }
}
