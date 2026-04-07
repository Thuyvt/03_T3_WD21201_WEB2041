<?php

class ProductModel extends BaseModel {

    // Top 4 sản phẩm mới nhất
    public function getTop4Lastest() {
        $sql = "SELECT pro.*, pro_im.image_url
         FROM products as pro LEFT JOIN product_images as pro_im
          ON pro.id = pro_im.product_id
         AND pro_im.is_main = 1
          ORDER BY pro.id DESC LIMIT 4;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Danh sách sản phẩm
    public function getAll() {
        $sql = "SELECT pro.*, cat.name as category_name
         FROM `products` as pro 
        JOIN categories as cat ON 
        pro.category_id = cat.id ORDER BY pro.id DESC;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Xóa sản phẩm
    public function delete($id) {
        // Xóa bảng con liên quan nếu csdl dùng restric
        // Xóa bảng chính
        $sql = "DELETE FROM products WHERE id =:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

    }

    // Lấy theo ID
    public function getById($id) {
        $sql = "SELECT pro.*, cat.name as category_name
        FROM products as pro
        JOIN categories as cat 
        ON pro.category_id = cat.id AND pro.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Lưu dữ liệu và csdl
    public function insert($data) {
        $sql = "INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `quantity`, `created_at`) 
        VALUES (NULL, ?, ? , ?, ? ,? ,?);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['category_id'], $data['name'],$data['description']
        ,$data['price'],$data['quantity'],$data['created_at']]);
        
        // Lưu ảnh đại diện nếu có 
        if ($data['img_cover'] != null) {
            $sql = "INSERT INTO `product_images` (`id`, `product_id`, `image_url`, `is_main`)
             VALUES (NULL, ?, ?, ?);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->pdo->lastInsertId(), $data['img_cover'], '1']);
        }
        // Lưu ảnh phụ
    }

    // Cập nhật dữ liệu
    public function update($data, $id) {
        $sql = "UPDATE `products` SET `category_id` = ?, `name` = ?, `description` = ?, `price` = ?, `quantity` = ?
         WHERE `products`.`id` = ?;";
          $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['category_id'], $data['name'],$data['description']
        ,$data['price'],$data['quantity'], $id]);

        // THAY ĐỔI ẢNH
        if ($data['img_cover'] != null) {
            // Xóa ảnh cũ
            $sql = "DELETE FROM `product_images` WHERE product_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            // Thêm ảnh mới
            $sql = "INSERT INTO `product_images` (`id`, `product_id`, `image_url`, `is_main`)
             VALUES (NULL, ?, ?, ?);";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->pdo->lastInsertId(), $data['img_cover'], '1']);
        }
    }

}