<?php
class c_admin
{
    protected $view;
    protected $model;
    protected $m_admin;

    public function __construct($url = null)
    {
        if ($url !== null) {
            $this->view = "mvc/view/admin/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->view;
            require_once $this->model;
            $this->m_admin = new m_admin();
        }
    }

    public function login()
    {
        $this->view = "mvc/view/absolutePart/v_login.php";
        $this->model = "mvc/model/m_login.php";
        require_once $this->view;
        require_once $this->model;
    }

    public function users()
    {
        $this->view = "mvc/view/admin/v_users.php";
        $this->model = "mvc/model/m_admin.php";
        require_once $this->view;
        require_once $this->model;
    }

    public function products()
    {
        $this->view = "mvc/view/admin/v_products.php";
        $this->model = "mvc/model/m_admin.php";
        require_once $this->view;
        require_once $this->model;
    }

    public function getAllProducts()
    {
        require_once "mvc/model/m_admin.php";
        $this->m_admin = new m_admin();

        $data = $this->m_admin->getAllProducts();
        $dataToHTML = "";
        if (!empty($data)) {
            foreach ($data as $product) {
                $dataToHTML .= "<div class='dataRow'><img src=" . $product->getHinhAnh() . " alt='noImg'><div> Mã: " . $product->getMasp() . "</div><div> Tên sản phẩm: " . $product->getTensp() . "</div><div> Đơn giá: " . $product->getDonGia() . "</div><div> Số lượng: " . $product->getSoLuong() . "</div></div>";
            }
        }
        return $dataToHTML;
    }

    public function getAllUsers()
    {
        require_once "mvc/model/m_admin.php";
        $this->m_admin = new m_admin();

        $data = $this->m_admin->getAllUsers();

        $dataToHTML = "";
        if (!empty($data)) {
            foreach ($data as $product) {
                $dataToHTML .= "<div class='dataRow'><div> Mã: " . $product->getMaKH() . "</div><div> Tên Khách Hàng: " . $product->getTenKH() . "</div><div> Địa chỉ: " . $product->getDiaChi() . "</div><div> Ngày Sinh: " . $product->getNgaySinh() . "</div><div> Điện thoại: " . $product->getNgaySinh() . "</div><div> Email: " . $product->getEmail() . "</div></div>";
            }
        }
        return $dataToHTML;

    }
}
?>