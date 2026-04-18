<?php
    class ProductController{
        private Product $productModel;
        private Category $categoryModel;
        public function __construct()
        {
            $this->productModel = new Product();
            $this->categoryModel = new Category();
        }
        public function index(){
            $products = $this->productModel->getAll();
            $view = 'products/index';
            $title = 'Danh sách sản phẩm';
            //var_dump($products);
            require_once PATH_VIEW_MAIN;
        }
    }

 ?>
