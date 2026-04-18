<?php

class DashboardController {
    public function index() {
        $title = 'Dashboard Quản Trị';
        $view = 'admin/dashboard';
        
        // Gọi layout của admin thay vì main layout
        require_once PATH_VIEW_ADMIN;
    }
}
