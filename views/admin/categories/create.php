<?php
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<div class="col-12 col-md-6">
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>?action=admin/category/store" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên danh mục" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Lưu danh mục</button>
        <a href="<?= BASE_URL ?>?action=admin/categories" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
