<?php

class ProductModel extends BaseModel {

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
}