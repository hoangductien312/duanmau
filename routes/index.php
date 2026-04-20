<?php

$action = $_GET['action'] ?? '/';
$action = trim($action, '/');
if (empty($action)) {
    $action = '/';
}

// Authentication Middleware cho các route bắt đầu bằng 'admin'
if (strpos($action, 'admin') === 0 && $action !== 'admin/login' && $action !== 'admin/logout') {
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "admin/login");
        exit;
    }
}

match ($action) {
    '/'         => (new HomeController)->index(),
    // Hiển thị danh sách sản phẩm
    'products' => (new ProductController)->index(),
    // Xóa sản phẩm
    'product/delete' => (new ProductController)->delete(),
    // Thêm 
    // Hiển thị form thêm
    'product/create' => (new ProductController)->create(),
    // Xử lý thêm
    'product/store' => (new ProductController)->store(),
    // Sửa
    // Hiển thị form sửa
    'product/edit' => (new ProductController)->edit(),
    // Xử lý sửa
    'product/update' => (new ProductController)->update(),

    // Admin Auth
    'admin/login' => ($_SERVER['REQUEST_METHOD'] === 'POST') ? (new AuthController)->login() : (new AuthController)->loginForm(),
    'admin/logout' => (new AuthController)->logout(),

    // Admin Routes
    'admin' => (new DashboardController)->index(),
    'admin/dashboard' => (new DashboardController)->index(),

    // Admin Quản lý Sản phẩm
    'admin/products' => (new AdminProductController)->index(),
    'admin/product/create' => (new AdminProductController)->create(),
    'admin/product/store' => (new AdminProductController)->store(),
    'admin/product/edit' => (new AdminProductController)->edit(),
    'admin/product/update' => (new AdminProductController)->update(),
    'admin/product/delete' => (new AdminProductController)->delete(),

    // Admin Quản lý Danh mục
    'admin/categories' => (new CategoryController)->index(),
    'admin/category/create' => (new CategoryController)->create(),
    'admin/category/store' => (new CategoryController)->store(),
    'admin/category/edit' => (new CategoryController)->edit(),
    'admin/category/update' => (new CategoryController)->update(),
    'admin/category/delete' => (new CategoryController)->delete(),

    default     => (new ProductController)->index(),
};
