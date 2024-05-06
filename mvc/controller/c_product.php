<?php
require_once('mvc/model/m_listproduct.php');

class ProductController {
    public function index() {
        $model = new ListProductModel();

        // Phân trang
        $limit = 9; // Số sản phẩm trên mỗi trang
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $limit;

        $products = $model->getProducts($offset, $limit);
        $totalProducts = $model->getTotalProducts();
        $totalPages = ceil($totalProducts / $limit);

        // Load view
        include('mvc/view/user/v_product.php');
    }
}

$controller = new ProductController();
$controller->index();
?>
