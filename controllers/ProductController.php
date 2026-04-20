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
            $id_category = $_GET['id_category'] ?? null;
            $categories = $this->categoryModel->getAll(); // Lấy tất cả danh mục để hiển thị sidebar

            if ($id_category) {
                $products = $this->productModel->getByCategory($id_category);
                $category = $this->categoryModel->getById($id_category);
                $title = 'Danh mục: ' . ($category['name'] ?? 'Không xác định');
            } else {
                $products = $this->productModel->getAll();
                $title = 'Tất cả sản phẩm';
            }

            $view = 'products/index';
            require_once PATH_VIEW_MAIN;
        }
    }

 ?>
