<?php
    class CategoryController{
        private Category $categoryModel;
        public function __construct()
        {
            $this->categoryModel = new Category();
        }
        public function index(){
            $categories = $this->categoryModel->getAll();
            $view = 'admin/categories/index';
            $title = 'Quản lý danh mục';
            require_once PATH_VIEW_ADMIN;
        }
        public function delete(){
            $id = $_POST['id'] ?? null;
            $category = $this->categoryModel->getById($id);
            if(!$category){
                $_SESSION['error'] = "Danh mục không tồn tại";
            }else{
                try {
                    $this->categoryModel->delete($id);
                    $_SESSION['success'] = "Danh mục đã được xóa thành công";
                } catch (Exception $e) {
                    $_SESSION['error'] = "Không thể xoá danh mục này vì có thể đang chứa sản phẩm bên trong.";
                }
            }
            header("Location: " . BASE_URL . "?action=admin/categories");
            exit;
        }
        // Hiện thị form thêm
        public function create(){
            $title = 'Thêm danh mục';
            $view = 'admin/categories/create';
            require_once PATH_VIEW_ADMIN;
        }
        // Xử lý thêm
        public function store(){
            $name = trim($_POST['name'] ?? '');
            if(empty($name)){
                $_SESSION['error'] = "Tên danh mục không được để trống";
                header("Location: " . BASE_URL . "?action=admin/category/create");
                exit;
            }else{
                $data = ['name' => $name];
                if($this->categoryModel->create($data)){
                    $_SESSION['success'] = "Danh mục đã được thêm thành công";
                    header("Location: " . BASE_URL . "?action=admin/categories");
                    exit;
                }else{
                    $_SESSION['error'] = "Thêm danh mục thất bại";
                    header("Location: " . BASE_URL . "?action=admin/category/create");
                    exit;
                }
            }
        }
        // Hiện thị form sửa
        public function edit(){
            $id = $_GET['id'] ?? null;
            $category = $this->categoryModel->getById($id);
            if(!$category){
                $_SESSION['error'] = "Danh mục không tồn tại";
                header("Location: " . BASE_URL . "?action=admin/categories");
                exit;
            }else{
                $title = 'Sửa danh mục';
                $view = 'admin/categories/edit';
                require_once PATH_VIEW_ADMIN;
            }
        }
        // Xử lý sửa
        public function update(){
            $id = $_POST['id'] ?? null;
            $category = $this->categoryModel->getById($id);
            if(!$category){
                $_SESSION['error'] = "Danh mục không tồn tại";
                header("Location: " . BASE_URL . "?action=admin/categories");
                exit;
            }
            
            $name = trim($_POST['name'] ?? '');
            if(empty($name)){
                $_SESSION['error'] = "Tên danh mục không được để trống";
                header("Location: " . BASE_URL . "?action=admin/category/edit&id=$id");
                exit;
            }else{
                $data = [
                    'id'=> $id,
                    'name' => $name
                ];
                
                if($this->categoryModel->update($data)){
                    $_SESSION['success'] = "Danh mục đã được cập nhật thành công";
                    header("Location: " . BASE_URL . "?action=admin/categories");
                    exit;
                }
                else{
                    $_SESSION['error'] = "Cập nhật danh mục thất bại";
                    header("Location: " . BASE_URL . "?action=admin/category/edit&id=$id");
                    exit;
                }
            }
        }
    }
?>
