<?php

class HomeController
{
    public function index() 
    {
        $productModel = new Product();
        $products = $productModel->getLatest(8); // Lấy 8 sản phẩm mới nhất
        
        $title = 'Trang chủ';
        $view = 'home';
        require_once PATH_VIEW . 'main.php';
    }
}