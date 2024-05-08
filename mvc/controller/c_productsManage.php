<?php
class c_productsManage
{
    protected $repository;
    public function __construct()
    {
        require_once "mvc/model/m_productsManage.php";
        require_once "mvc/entity/e_sanpham.php";
        $this->repository = new m_productsManage();
    }

    public function getProduct($id){
        $dataToHTML = "";
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $data = $this->repository->getProduct($id);
            if (!empty($data)) {
                $status = $data->getTrangThaiTonTai() == 0 ? 'unchecked' : 'checked';
                $dataToHTML .= '<tr>
                    <td><div><img class="img-flu" alt="noImg" src="/public/data/SanPham/' . $data->getHinhAnh() . '"></div></td>
                    <td style="display:none;"><p>' . $data->getMasp() . '</p></td>
                    <td><p>' . $data->getTensp() . '</p></td>
                    <td><p>' . $data->getDonGia() . '</p></td>
                    <td><p>' . $data->getGiaBan() . '</p></td>
                    <td><p>' . $data->getMoTa() . '</p></td>
                    <td><p>' . $data->getMaHang() . '</p></td>
                    <td>
                        <label class="toggle">
                            <input class="statusSetToggle" type="checkbox" ' . $status . '>
                            <span class="toggleCircle"></span>
                        </label>
                    </td>
                </tr>';
            }
        }
        return $dataToHTML;
    }
    public function getAllProducts()
    {
        $dataToHTML = "";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data = $this->repository->getAllProducts();
            if (!empty($data)) {
                foreach ($data as $product) {
                    $status = $product->getTrangThaiTonTai() == 0 ? 'unchecked' : 'checked';
                    $dataToHTML .= '<tr>
                        <td><div><img class="img-flu" alt="noImg" src="' . $product->getHinhAnh() . '"></div></td>
                        <td style="display:none;"><p>' . $product->getMasp() . '</p></td>
                        <td><p>' . $product->getTensp() . '</p></td>
                        <td><p>' . $product->getDonGia() . '</p></td>
                        <td><p>' . $product->getGiaBan() . '</p></td>
                        <td><p>' . $product->getMoTa() . '</p></td>
                        <td><p>' . $product->getMaHang() . '</p></td>
                        <td>
                            <label class="toggle">
                                <input onchange="setFormToUpdate();" class="statusSetToggle" type="checkbox" ' . $status . '>
                                <span class="toggleCircle"></span>
                            </label>
                        </td>
                    </tr>';
                }
            }
        }
        return $dataToHTML;
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sanpham = new e_sanpham();
            $sanpham->setMasp(-1);
            $sanpham->setTensp($_POST['tensp']);
            $sanpham->setDonGia($_POST['donGia']);
            $sanpham->setGiaBan($_POST['giaBan']);
            $sanpham->setMoTa($_POST['MoTa']);
            $sanpham->setHinhAnh($_POST['hinhAnh']);
            $sanpham->setTrangThaiTonTai(1);
            $sanpham->setMaHang($_POST['maHang']);

            $success = $this->repository->addProduct($sanpham);
            if ($success) {
                echo "<script>alert('Add product successfully')</script>";
            } else {
                echo "<script>alert('That product was 
                existing')</script>";
            }
            header("Location: web2/admin/products");
        }
    }

    public function deleteProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $success = $this->repository->deleteProduct($_POST['masp']);
            if ($success) {
                echo "<script>alert('Delete successfully')</script>";
            } else {
                echo "<script>alert('Some error while deleting')</script>";
            }
            header("Location: web2/admin/products");
        }
    }
    public function updateProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sanpham = new e_sanpham();
            $sanpham->setMasp($_POST['masp']);
            $sanpham->setTensp($_POST['tensp']);
            $sanpham->setDonGia($_POST['donGia']);
            $sanpham->setGiaBan($_POST['giaBan']);
            $sanpham->setMoTa($_POST['MoTa']);
            $sanpham->setHinhAnh($_POST['hinhAnh']);
            $sanpham->setTrangThaiTonTai($_POST['trangThai']);
            $sanpham->setMaHang($_POST['maHang']);
            $testString = $sanpham->getMasp().",". $sanpham->getTensp() .",".$sanpham->getDonGia().",". $sanpham->getGiaBan().",".$sanpham->getMoTa().",".$sanpham->getHinhAnh().",".$sanpham->getTrangThaiTonTai().",".$sanpham->getMaHang();
            echo "<script>alert('$testString')</script>";
            $success = $this->repository->updateProduct($sanpham);
            if ($success) {
                echo "<script>alert('update successfully')</script>";
            } else {
                echo "<script>alert('Some error while updating')</script>";
            }
        }
    }
}
?>