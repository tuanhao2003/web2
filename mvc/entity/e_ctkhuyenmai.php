<?php
class e_cthoadon{
    protected $maKM;
    protected $maSP;
    protected $thoiGianApDung;
    protected $ngayBatDau;
    protected $ngayKetThuc;
    protected $mucGiamGia;

    public function __construct(){
        $this->maKM = null;
        $this->maSP = null;
        $this->thoiGianApDung = 0;
        $this->ngayBatDau = null;
        $this->ngayKetThuc = null;
        $this->mucGiamGia = 0;
    }

    public function setMaKM($maKM){
        $this->maKM = $maKM;
    }
    public function setMaSP($maSP){
        $this->maSP = $maSP;
    }
    public function setThoiGianApDung($thoiGianApDung){
        $this->thoiGianApDung = $thoiGianApDung;
    }
    public function setNgayBatDau($ngayBatDau){
        $this->ngayBatDau = $ngayBatDau;
    }
    public function setNgayKetThuc($ngayKetThuc){
        $this->ngayKetThuc = $ngayKetThuc;
    }
    public function setMucGiamGia($mucGiamGia){
        $this->mucGiamGia = $mucGiamGia;
    }


    public function getmaKM(){
        return $this->maKM;
    }
    public function getMaSP(){
        return $this->maSP;
    }
    public function getthoiGianApDung(){
        return $this->thoiGianApDung;
    }
    public function getngayBatDau(){
        return $this->ngayBatDau;
    }

    public function getNgayKetThuc(){
        return $this->ngayKetThuc;
    }
    public function getMucGiamGia(){
        return $this->mucGiamGia;
    }
}
?>