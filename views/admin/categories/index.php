<?php
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5253 100%);
        --warning-gradient: linear-gradient(135deg, #feca57 0%, #ff9f43 100%);
        --info-gradient: linear-gradient(135deg, #48dbfb 0%, #0abde3 100%);
    }

    .admin-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .admin-header {
        background: var(--primary-gradient);
        padding: 30px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table thead th {
        background-color: #f8f9fa;
        color: #4b5563;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        border-top: none;
        padding: 15px 25px;
    }

    .table tbody td {
        padding: 20px 25px;
        vertical-align: middle;
        color: #1f2937;
        font-weight: 500;
    }

    .badge-count {
        background: var(--info-gradient);
        color: white;
        padding: 8px 15px;
        border-radius: 50px;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(72, 219, 251, 0.3);
    }

    .btn-action {
        border-radius: 12px;
        padding: 8px 16px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-view { background: #f1f5f9; color: #475569; }
    .btn-view:hover { background: #e2e8f0; transform: translateY(-2px); }

    .btn-edit { background: var(--warning-gradient); color: white; }
    .btn-edit:hover { box-shadow: 0 5px 15px rgba(254, 202, 87, 0.4); transform: translateY(-2px); }

    .btn-delete { background: var(--danger-gradient); color: white; }
    .btn-delete:hover { box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4); transform: translateY(-2px); }

    .btn-add {
        background: white;
        color: #764ba2;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .btn-add:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>

<div class="col-12 mt-2">
    <!-- Hiển thị thông báo -->
    <?php if($success): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4"><?= $success ?></div>
    <?php endif; ?>
    <?php if($error): ?>
        <div class="alert alert-danger border-0 shadow-sm rounded-4"><?= $error ?></div>
    <?php endif; ?>

    <div class="admin-card">
        <div class="admin-header">
            <div>
                <h3 class="mb-0 fw-bold">Danh mục sản phẩm</h3>
                <p class="mb-0 opacity-75">Quản lý và phân loại các sản phẩm trong hệ thống</p>
            </div>
            <a href="<?= BASE_URL ?>?action=admin/category/create" class="btn-add">
                + Thêm danh mục mới
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Tên danh mục</th>
                        <th width="150" class="text-center">Số lượng SP</th>
                        <th width="300" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($categories)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <p class="text-muted">Chưa có danh mục nào được tạo.</p>
                            </td>
                        </tr>   
                    <?php else: ?>
                        <?php foreach($categories as $category): ?>
                        <tr>
                            <td class="text-muted">#<?= $category['id'] ?></td>
                            <td>
                                <span class="fs-5"><?= htmlspecialchars($category['name']) ?></span>
                            </td>
                            <td class="text-center">
                                <span class="badge-count"><?= $category['product_count'] ?? 0 ?></span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="<?= BASE_URL ?>?action=admin/products&id_category=<?= $category['id'] ?>" class="btn-action btn-view">
                                        Xem SP
                                    </a>
                                    <a href="<?= BASE_URL ?>?action=admin/category/edit&id=<?= $category['id'] ?>" class="btn-action btn-edit">
                                        Sửa
                                    </a>
                                    <form method="POST" action="<?= BASE_URL ?>?action=admin/category/delete" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                        <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                        <button type="submit" class="btn-action btn-delete">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
