<?php
// Thêm require_once cho model mới
require_once "mvc/model/m_hang.php";

class c_product {
    protected $m_product;
    protected $m_hang; // Thêm model mới
    protected $view;
    protected $model;
    protected $products;
    protected $currentPage;
    protected $itemsPerPage;

    public function __construct($url = null, $currentPage = 1, $itemsPerPage = 9){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->model;
            require_once $this->view;
        }
        $this->m_product = new m_product();
        $this->m_hang = new m_hang(); // Khởi tạo model mới
        $this->currentPage = $currentPage;
        $this->itemsPerPage = $itemsPerPage;
        $this->getProductList(); // Gọi phương thức để lấy danh sách sản phẩm khi khởi tạo controller
    }

    // Phương thức để lấy danh sách sản phẩm từ model và gán vào thuộc tính $products
    public function getProductList() {
        $start = ($this->currentPage - 1) * $this->itemsPerPage;
        $this->products = $this->m_product->getListProductPaginated($start, $this->itemsPerPage);
    }

    // Phương thức để lấy danh sách hãng từ model và gán vào thuộc tính $hangs
    public function getHangList() {
        return $this->m_hang->getHangList();
    }

    // Phương thức để trả về danh sách sản phẩm
    public function getProducts() {
        return $this->products;
    }

    // Phương thức để trả về tổng số trang
    public function getTotalPages() {
        $totalItems = $this->m_product->getTotalProducts();
        return ceil($totalItems / $this->itemsPerPage);
    }
}
?>

