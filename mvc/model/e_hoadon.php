<?php
class e_hoadon{
    protected $maHD;
    protected $maKH;
    protected $ngayLap;
    protected $ngayXuat;
    protected $tongGiaGoc;
    protected $tongGiaSauGiam;

    public function __construct(){
        $this ->maHD = null;
        $this ->maKH = null;
        $this ->ngayLap = null;
        $this ->ngayXuat = null;
        $this ->tongGiaGoc = 0;
        $this ->tongGiaSauGiam = 0;
    }

    public function setMaHD($maHD){
        $this ->maHD = $maHD;
    }
    public function setMaKH($maKH){
        $this ->maKH = $maKH;
    }
    public function setNgayLap($ngayLap){
        $this ->ngayLap = $ngayLap;
    }
    public function setNgayXuat($ngayXuat){
        $this ->tongGiaGoc = $ngayXuat;
    }
    public function setTongGiaSauGiam($tongGiaSauGiam){
        $this ->tongGiaSauGiam = $tongGiaSauGiam;
    }
    public function settongGiaGoc($tongGiaGoc){
        $this ->tongGiaGoc = $tongGiaGoc;
    }

}
?>