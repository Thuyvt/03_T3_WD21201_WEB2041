<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    // '/'         => (new HomeController)->index(),
    '/'            => (new ProductController)->index(),

    'product-list' => (new ProductController)->index(),// Hiển thị trang danh sách
    'product-create' => (new ProductController)->create(), // Hiển thị trang tạo mới
    'product-edit' => (new ProductController)->edit(),// Hiển thị trang cập nhật
    'product-show' => (new ProductController)->show(),// Hiển thị trang chi tiết
    'product-delete' => (new ProductController)->delete(), // Xóa theo id
};