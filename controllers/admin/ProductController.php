<?php
    class ProductController {
        private $productModel;

        public function __construct() {
            $this->productModel = new ProductModel();
        }

        // Hiển thị trang danh sách
        public function index() {
            $view = 'product/index';
            $title = 'Quản lý sản phẩm';
            $data = $this->productModel->getAll();
            require_once PATH_VIEW_MAIN_ADMIN; 
        }

        // Hiển thị trang tạo mới
        public function create() {}

        // Hiển thị trang chi tiết
        public function show(){
            $view = 'product/show';
            $title = 'Chi tiết sản phẩm';
            try {
                if(!isset($_GET['id'])) {
                    throw new Exception("ID không tồn tại");
                }
                $id = $_GET['id'];
                // Kiểm tra id có trong csld không
                $pro = $this->productModel->getById($id);
                if(empty($pro)) {
                    throw new Exception("Sản phẩm không tồn tại ID này");
                }
                require_once PATH_VIEW_MAIN_ADMIN;

            }catch(Exception $ex){}
        }

        // Hiển thị trang cập nhật
        public function edit(){}

        // Hàm thực hiện xóa
        public function delete() {
            // kiểm tra id có tồn tại không
            try {
                if (!isset($_GET['id'])) {
                    throw new Exception ("ID không tồn tại");
                }
                $id = $_GET['id'];
                
                // Kiểm tra id có trong csld không
                $pro = $this->productModel->getById($id);
                if(empty($pro)) {
                    throw new Exception("Sản phẩm không tồn tại ID này");
                }
                // thực hiện xóa
                $this->productModel->delete($id);
                
                // xóa thành công quay lại trang danh sách
                header('Location:' .BASE_URL_ADMIN . '&action=product-list');

            } catch (Exception $ex){
                throw new Exception("Có lỗi trong quá trình xóa" . $ex->getmessage());
            }
          
        }
    }
?>