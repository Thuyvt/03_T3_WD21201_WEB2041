<div class="row">
    <form action="<?= BASE_URL_ADMIN . '&action=product-store' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Tên:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    
        <div class="mb-3 mt-3">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select class="form-control" id="category_id" name="category_id">
                <?php foreach($list_cat as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="description" class="form-label">Mô tả:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
          <div class="mb-3 mt-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3 mt-3">
            <label for="quantity" class="form-label">Số lượng:</label>
            <input type="number" class="form-control" id="quantity" name="quantity">
        </div>
        <div class="mb-3 mt-3">
            <label for="created_at" class="form-label">Ngày tạo:</label>
            <input type="date" class="form-control" id="created_at" name="created_at">
        </div>
        <div class="mb-3">
            <label for="img_cover" class="form-label">Ảnh:</label>
            <input type="file" class="form-control" id="img_cover" name="img_cover">
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    
        <a href="<?= BASE_URL_ADMIN . '&action=product-list'?>" class="btn btn-danger">Quay lại danh sách</a>
    </form>
</div>