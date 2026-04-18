<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4 class="text-white text-center mb-4">ADMIN PANEL</h4>
                <a href="<?= BASE_URL ?>?action=admin/dashboard">🏠 Dashboard</a>
                <a href="<?= BASE_URL ?>?action=admin/products">📦 Quản lý Sản phẩm</a>
                <a href="<?= BASE_URL ?>?action=admin/categories">📂 Quản lý Danh mục</a>
                <hr class="text-white">
                <a href="<?= BASE_URL ?>" class="text-warning">⬅️ Quay lại Website</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <h2 class="mb-4"><?= $title ?? 'Dashboard' ?></h2>
                
                <!-- Hiển thị thông báo nếu có -->
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= is_array($_SESSION['error']) ? implode('<br>', $_SESSION['error']) : $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <!-- Nội dung động được nhúng vào đây -->
                <div class="card p-4 shadow-sm">
                    <?php
                        if (isset($view)) {
                            require_once PATH_VIEW . $view . '.php';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
