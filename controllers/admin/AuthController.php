<?php
class AuthController {
    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function loginForm() {
        // Nếu đã đăng nhập thì tự chuyển hướng vào admin
        if (isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "admin/");
            exit;
        }
        $title = 'Đăng nhập Quản trị';
        // Gọi thẳng file view login, không dùng chung layout
        require_once PATH_VIEW . 'admin/login.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ tài khoản và mật khẩu';
            header("Location: " . BASE_URL . "?action=admin/login");
            exit;
        }

        $user = $this->userModel->login($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: " . BASE_URL . "admin/");
            exit;
        } else {
            $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không chính xác';
            header("Location: " . BASE_URL . "?action=admin/login");
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        header("Location: " . BASE_URL . "?action=admin/login");
        exit;
    }
}
?>
