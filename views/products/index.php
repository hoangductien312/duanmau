<?php
// Dọc và xóa thông báo
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<div class="row">
<div class="col-md-3">
    <div class="list-group shadow-sm">
        <a href="<?= BASE_URL ?>?action=products" class="list-group-item list-group-item-action <?= !isset($_GET['id_category']) ? 'active' : '' ?>">
            Tất cả danh mục
        </a>
        <?php foreach($categories as $cat): ?>
            <a href="<?= BASE_URL ?>?action=products&id_category=<?= $cat['id'] ?>" 
               class="list-group-item list-group-item-action <?= (isset($_GET['id_category']) && $_GET['id_category'] == $cat['id']) ? 'active' : '' ?>">
                <?= $cat['name'] ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="col-md-9">
    <!-- Hiển thị thông báo -->
    <?php if($success): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if($error): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white fw-bold">
            <?= $title ?>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Kho</th>
                            <th>Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($products)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Không có sản phẩm nào trong danh mục này.</td>
                            </tr>   
                        <?php else: ?>
                            <?php foreach($products as $product): ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td>
                                    <?php if(!empty($product['image'])): ?>
                                        <img src="<?= BASE_ASSETS_UPLOADS.$product['image'] ?>" width="60" class="rounded shadow-sm">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/60" width="60" class="rounded shadow-sm">
                                    <?php endif; ?>
                                </td>
                                <td class="fw-bold"><?= htmlspecialchars($product['name']) ?></td>
                                <td class="text-danger fw-bold"><?= number_format($product['price'], 0, ',', '.') ?> ₫</td>
                                <td><?= $product['stock'] ?></td>
                                <td class="small text-muted"><?= htmlspecialchars(mb_strimwidth($product['description'], 0, 50, '...')) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>