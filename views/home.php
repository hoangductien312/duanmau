<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
        border-radius: 10px;
        margin-bottom: 40px;
    }
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .product-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
        border-top-left-radius: var(--bs-card-inner-border-radius);
        border-top-right-radius: var(--bs-card-inner-border-radius);
    }
    .price-tag {
        color: #e53e3e;
        font-weight: bold;
        font-size: 1.25rem;
    }
</style>

<!-- Hero Section -->
<div class="hero-section shadow">
    <div class="container">
        <h1 class="display-4 fw-bold">Chào mừng đến với Cửa Hàng</h1>
        <p class="lead">Khám phá các sản phẩm công nghệ tuyệt vời nhất với giá ưu đãi.</p>
        <a href="#products" class="btn btn-light btn-lg mt-3 fw-bold rounded-pill px-4">Mua sắm ngay</a>
    </div>
</div>

<!-- Product List Section -->
<div id="products" class="container mb-5">
    <h2 class="text-center mb-1 text-uppercase fw-bold">❤️ Sản Phẩm Yêu Thích</h2>
    <p class="text-center text-muted mb-4">8 sản phẩm mới nhất của chúng tôi</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <?php if(empty($products)): ?>
            <div class="col-12 text-center">
                <p class="text-muted">Hiện chưa có sản phẩm nào.</p>
            </div>
        <?php else: ?>
            <?php foreach($products as $product): ?>
                <div class="col">
                    <div class="card product-card shadow-sm border-0">
                        <!-- Ảnh sản phẩm -->
                        <?php if(!empty($product['image'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" class="card-img-top product-img" alt="<?= htmlspecialchars($product['name']) ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top product-img" alt="No image">
                        <?php endif; ?>
                        
                        <!-- Thông tin -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate" title="<?= htmlspecialchars($product['name']) ?>"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="price-tag mb-2"><?= number_format($product['price'], 0, ',', '.') ?> ₫</p>
                            <p class="card-text text-muted small flex-grow-1"><?= htmlspecialchars(mb_strimwidth($product['description'], 0, 60, '...')) ?></p>
                            <a href="#" class="btn btn-outline-primary w-100 mt-auto rounded-pill">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
