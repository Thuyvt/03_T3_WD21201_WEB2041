 <!-- Slideshow -->
<div id="slide-demo" class="carousel slide">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../assets/uploads/slide1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../assets/uploads/slide2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../assets/uploads/slide3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="../assets/uploads/slide4.png" class="d-block w-100" alt="...">
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slide-demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slide-demo" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Hết slideshow -->
<h3 class="mt-3">Sản phẩm mới giảm giá</h3>
 <!-- Khu vực sản phẩm -->
<div class="row">
   <?php foreach($data as $pro):?>
    <!-- Box sản phẩm -->
    <div class="col-3">
        <div class="border rounded overflow-hidden mb-4">
            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $pro['image_url']?>" alt="" class="mw-100 mh-100">
            </div>
            <!-- Hiển thị text và button -->
            <div class="p-2">
            <h5><?= $pro['name'] ?></h5>
            <div class="d-flex justify-content-between">
                <span class="fw-bold"><?= $pro['price'] ?></span>
                <span class="text-danger text-decoration-line-through">200.000</span>
            </div>
            <button class="btn btn-danger rounded-pill w-100 btn-sm">Mua ngay</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- Hết box sản phẩm -->
</div>
<!-- Hết khu vực sản phẩm -->