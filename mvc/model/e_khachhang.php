<?php
class e_khachhang{
    protected $maKH;
    protected $tenKH;
    protected $diaChi;
    protected $ngaySinh;
    protected $email;
    protected $sdt;
    protected $maTK;

    public function __construct(){
        $this->maKH = null;
        $this->tenKH = null;
        $this->diaChi = null;
        $this->ngaySinh = null;
        $this->email = null;
        $this->sdt = 0;
        $this->maTK = null;
    }

    public function setMaKH($maKH){ 
        $this->maKH = $maKH;
    }
    public function setTenKH($tenKH){
        $this->tenKH = $tenKH;
    }
    public function setdiaChi($diaChi){
        $this->diaChi = $diaChi;
    }
    public function setngaySinh($ngaySinh){
        $this->ngaySinh = $ngaySinh;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSdt($sdt){
        $this->sdt = $sdt;
    }
    public function setSmaKH($maKH){
        $this->maKH = $maKH;
    }

    public function getmaKH(){
        return $this->maKH;
    }
    public function gettenKH(){
        return $this->tenKH;
    }
    public function getdiaChi(){
        return $this->diaChi;
    }
    public function getngaySinh(){
        return $this->ngaySinh;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSdt(){
        return $this->sdt;
    }
    public function getSmaKH(){
        return $this->maKH;
    }

}
?>