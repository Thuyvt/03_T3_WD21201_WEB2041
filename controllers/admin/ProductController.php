<?php
    class ProductController {
        private $productModel;
        private $categoryModel;

        public function __construct() {
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel();
        }

        // Hiển thị trang danh sách
        public function index() {
            $view = 'product/index';
            $title = 'Quản lý sản phẩm';
            $data = $this->productModel->getAll();
            require_once PATH_VIEW_MAIN_ADMIN; 
        }

        // Hiển thị trang tạo mới
        public function create() {
            $view = 'product/create';
            $title = 'Tạo mới sản phẩm';
            $list_cat = $this->categoryModel->getAll();
            require_once PATH_VIEW_MAIN_ADMIN;
        }

        // Lưu dữ liệu vào csld
        public function store(){
            try {
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                    throw new Exception("Phương thức yêu cầu không hợp lệ");
                }

                $data = $_POST + $_FILES;
                // Xử lý ảnh
                if($data['img_cover']['size'] >0) {
                    $data['img_cover'] = upload_file('products', $data['img_cover']);
                } else {
                    $data['img_cover'] == null;
                }
                // thêm dữ liệu vào csld
                $this->productModel->insert($data);
                
                // xóa thành công quay lại trang danh sách
                header('Location:' .BASE_URL_ADMIN . '&action=product-list');

                } catch(Exception $ex) {
                    throw new Exception("Có lỗi xảy ra:" . $ex->getmessage());
            }
        }

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
        public function edit(){
            $view = 'product/edit';
            $title = 'Cập nhật sản phẩm';
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
                // Lấy danh sách danh mục
                $list_cat = $this->categoryModel->getAll();
                require_once PATH_VIEW_MAIN_ADMIN;

            }catch(Exception $ex){}
        }

        // Cập nhật sản phẩm
        public function update() {
            try {
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                    throw new Exception("Phương thức yêu cầu phải là POST");
                }
                if (!isset($_GET['id'])) {
                    throw new Exception ("ID không tồn tại");
                }
                $id = $_GET['id'];  

                $pro = $this->productModel->getById($id);

                if (empty($pro)) {
                    throw new Exception("Không có sản phẩm tồn tại với id =".$id);
                }
                $data = $_POST + $_FILES;

                // Xử lý ảnh
                if($data['img_cover']['size'] >0) {
                    $data['img_cover'] = upload_file('products', $data['img_cover']);
                } else {
                    // Nếu không upload ảnh mới lên thì lấy giá trị ảnh cũ
                    $data['img_cover'] == null;
                }

                // Cập nhật dữ liệu mới 

            } catch(Exception $ex) {
                throw new Exception("Có lỗi xảy ra" . $ex->getmessage());
            }
        }
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