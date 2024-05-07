<?php
require_once('mvc/model/m_listproduct.php');

class c_product {
    public function index() {
        $model = new m_listproduct();

        // Phân trang
        $limit = 9; // Số sản phẩm trên mỗi trang
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Lấy giá trị của tham số 'page' từ URL
        $currentPage = intval($currentPage); // Chuyển đổi giá trị sang kiểu số nguyên để đảm bảo an toàn
        $offset = ($currentPage -1) * $limit;

        $products = $model->getProducts($offset, $limit);
        $totalProducts = $model->getTotalProducts();
        $totalPages = ceil($totalProducts / $limit);
        echo $_GET['page'];
        // Load view
        include('mvc/view/user/v_product.php');
    }
}

$controller = new c_product();
$controller->index();
?>
