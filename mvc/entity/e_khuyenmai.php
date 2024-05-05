<?php
class e_khuyenmai{
    protected $maKM;
    protected $tenKM;
    protected $mucGiamGia;
    protected $noidung;

    public function __construct(){
        $this->maKM = null;
        $this->tenKM = null;    
        $this->mucGiamGia = 0;
        $this->noidung = null;
    }

    public function setMaKM($maKM){
        $this->maKM = $maKM;
    }
    
    public function setTenKM($tenKM){
        $this->tenKM = $tenKM;
    }

    public function setMucGiamGia($mucGiamGia){
        $this->mucGia = $mucGiamGia;
    }
    public function setNoidung($noidung){
        $this->noidung = $noidung;
    }

    public function getmaKM(){
        return $this->maKM;
    }
    public function getTenKM(){
        return $this->tenKM;
    }

    public function getMucGiamGia(){
        return $this->mucGiamGia;
    }
    public function getNoidung(){
        return $this->noidung;
    }
    
}
?>