<?php
class e_sanpham
{
    protected $masp;
    protected $tensp;
    protected $donGia;
    protected $giaBan;
    protected $soLuong;
    protected $hinhAnh;
    protected $trangThaiTonTai;
    protected $maHang;

    public function __construct()
    {
        $this->masp=null;
        $this->tensp=null;
        $this->donGia=0;
        $this->giaBan=0;
        $this->soLuong=0;
        $this->hinhAnh=null;
        $this->trangThaiTonTai=null;
        $this->maHang=null;
    }

    public function getMasp(){
        return $this->masp;
    }
    public function setMasp($masp){
        $this->masp = $masp;
    }

    public function getTensp(){
        return $this->tensp;
    }
    public function setTensp($tensp){
        $this->tensp = $tensp;
    }

    public function getDonGia(){
        return $this->donGia;
    }
    public function setDonGia($donGia){
        $this->donGia = $donGia;
    }

    public function getGiaBan(){
        return $this->giaBan;
    }
    public function setGiaBan($giaBan){
        $this->giaBan = $giaBan;
    }

    public function getSoLuong(){
        return $this->soLuong;
    }
    public function setSoLuong($soLuong){
        $this->soLuong = $soLuong;
    }

    public function getHinhAnh(){
        return $this->hinhAnh;
    }
    public function setHinhAnh($hinhAnh){
        $this->hinhAnh = $hinhAnh;
    }

    public function getTrangThaiTonTai(){
        return $this->trangThaiTonTai;
    }
    public function setTrangThaiTonTai($trangThaiTonTai){
        $this->trangThaiTonTai = $trangThaiTonTai;
    }

    public function getMaHang(){
        return $this->maHang;
    }
    public function setMaHang($maHang){
        $this->maHang = $maHang;
    }
}
?>