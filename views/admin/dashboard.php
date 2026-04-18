<div class="row text-center">
    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Tổng Sản phẩm</div>
            <div class="card-body">
                <h5 class="card-title"><?= count($products ?? []) ?></h5>
                <p class="card-text">Sản phẩm đang có trong hệ thống.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Tổng Danh mục</div>
            <div class="card-body">
                <h5 class="card-title"><?= count($categories ?? []) ?></h5>
                <p class="card-text">Danh mục đang quản lý.</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <hr>
    <h4 class="mb-3 text-primary">📦 Quản lý Sản phẩm</h4>
    <?php require_once PATH_VIEW . 'admin/products/index.php'; ?>
</div>

<div class="mt-5">
    <hr>
    <h4 class="mb-3 text-success">📂 Quản lý Danh mục</h4>
    <?php require_once PATH_VIEW . 'admin/categories/index.php'; ?>
</div>
