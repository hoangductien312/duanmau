<?php
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>

<!-- Hiển thị thông báo -->
<?php if($success): ?>
    <div class="alert alert-success"><?= $success ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if($error): ?>
    <div class="alert alert-danger"><?= $error ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="col-12">
    <div class="mb-3">
        <a href="<?= BASE_URL ?>?action=admin/category/create" class="btn btn-primary">Thêm danh mục</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th width="50">ID</th>
                    <th>Tên danh mục</th>
                    <th width="150">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($categories)): ?>
                    <tr>
                        <td colspan="3" class="text-center">Không có danh mục nào</td>
                    </tr>   
                <?php else: ?>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= htmlspecialchars($category['name']) ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>?action=admin/category/edit&id=<?= $category['id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                            <form method="POST" action="<?= BASE_URL ?>?action=admin/category/delete" class="d-inline">
                                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục <?= htmlspecialchars($category['name']) ?>?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
