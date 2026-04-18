<?php

$action = $_GET['action'] ?? '/';

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

    // Admin Routes
    'admin/dashboard' => (new DashboardController)->index(),
    
    // Admin Quản lý Sản phẩm
    'admin/products' => (new AdminProductController)->index(),
    'admin/product/create' => (new AdminProductController)->create(),
    'admin/product/store' => (new AdminProductController)->store(),
    'admin/product/edit' => (new AdminProductController)->edit(),
    'admin/product/update' => (new AdminProductController)->update(),
    'admin/product/delete' => (new AdminProductController)->delete(),

    default     => (new ProductController)->index(),
};