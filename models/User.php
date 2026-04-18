<?php
class User extends BaseModel {
    protected $table = 'users';

    public function __construct() {
        parent::__construct();
        
        // Tự động tạo bảng users nếu chưa tồn tại
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )";
        $this->pdo->exec($sql);
        
        // Tạo tài khoản admin mặc định nếu bảng trống (admin / 123456)
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM users");
        if ($stmt->fetchColumn() == 0) {
            $password = password_hash('123456', PASSWORD_DEFAULT);
            $this->pdo->exec("INSERT INTO users (username, password) VALUES ('admin', '$password')");
        }
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
