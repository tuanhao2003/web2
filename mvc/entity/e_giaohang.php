<?php
// MaVanDon	NgayGiao	NgayDen	TinhTrang	DiaDiem	MaHD	
class e_giaohang{
    protected $maVanDon;
    protected $ngayGiao;
    protected $ngayDen;
    protected $tinhTrang;
    protected $diaDiem;
    protected $maHD;

    public function __construct(){
        $this->maVanDon = null;
        $this->ngayGiao = null;
        $this->ngayDen = null;
        $this->tinhTrang = null;
        $this->diaDiem = null;
        $this->maHD = null;
    }

    public function getMaVanDon($maVanDon){
        $this->maVanDon = $maVanDon;
    }
    public function getNgayGiao($ngayGiao){
        $this->ngayGiao = $ngayGiao;
    }
    public function getNgayDen($ngayDen){
        $this->ngayDen = $ngayDen;
    }
    public function getTinhTrang($tinhTrang){
        $this->tinhTrang = $tinhTrang;
    }
    public function getDiaDiem($diaDiem){
        $this->diaDiem = $diaDiem;
    }
    public function getMaHD($maHD){
        $this->maHD = $maHD;
    }

    public function setMaVanDon(){
        return $this->maVanDon;
    }
    public function setNgayGiao(){
        return $this->ngayGiao;
    }
    public function setNgayDen(){
        return $this->ngayDen;
    }
    public function setTinhTrang(){
        return $this->tinhTrang;
    }
    public function setDiaDiem(){
        return $this->diaDiem;
    }
    public function setMaHoaDon(){
        return $this->maHD;
    }
}
?>