CREATE TABLE NhaCungCap
(
	MaNCC       CHAR(7)      NOT NULL,
	TenNCC      VARCHAR(40)  NOT NULL,
	DiaChiNCC   VARCHAR(40),
	SDTNCC      VARCHAR(10)
);

CREATE TABLE Quyen
(
	MaTK            CHAR(7)       NOT NULL,
	PhanQuyen       VARCHAR(20)   NOT NULL
);

CREATE TABLE SanPham
(
	MaSP            CHAR(5)         NOT NULL,
	TenSP           VARCHAR(20)     NOT NULL,
	Hang            VARCHAR(20)     NOT NULL,
	DungLuong       VARCHAR(20)     NOT NULL,
	DonGia          INT             NOT NULL,
	GiaBan          INT,
	SoLuong         INT             NOT NULL,
    HinhAnh         VARCHAR(100)    NOT NULL,
	TrangThaiTonTai INT             NOT NULL
);

CREATE TABLE TaiKhoan
(
	MaTK        CHAR(7)         NOT NULL,
	TenDangNhap VARCHAR(50),
	MatKhau     VARCHAR(50),
	Email       VARCHAR(50),
	TrangThai   INT             NOT NULL
);

CREATE TABLE NhanVien
(
	MaNV        CHAR(5)         NOT NULL,
	TenNV       VARCHAR(50)     NOT NULL,
    GioiTinh    VARCHAR(10)     NOT NULL,
    DiaChiNV    VARCHAR(100),
	SDTNV       VARCHAR(20),
	MaTK        CHAR(7)         NOT NULL
);

CREATE TABLE KhachHang
(
	MaKH        CHAR(5)         NOT NULL,
	TenKH       VARCHAR(40)     NOT NULL,
	DiaChi      VARCHAR(100),
	SDT         VARCHAR(10),
	MaTK        CHAR(7)         NOT NULL
);

CREATE TABLE ChuongTrinhKhuyenMai
(
	MaCTKM                  CHAR(5)         NOT NULL,
    TenCTKM                 VARCHAR(100)    NOT NULL,
	MucGiamGia             INT,
	LoaiSanPhamDuocApDung  VARCHAR(100)    NOT NULL,
    ThoiGianBatDau         VARCHAR(100)    NOT NULL,
	ThoiGianKetThuc        VARCHAR(100)    NOT NULL,
    ThoiGianTaoKM          VARCHAR(100)    NOT NULL,
    MaSP                    CHAR(5)
);

CREATE TABLE HoaDon
(
	MaHoaDon        CHAR(5)         NOT NULL,
	MaKH            CHAR(5)         NOT NULL,
	MaNV            CHAR(5)         NOT NULL,
	NgayLap         DATETIME,
    NgayXuat        DATETIME,
	TongGiaGoc      INT             NOT NULL,
    TongGiaSauGiam INT,
);

CREATE TABLE CTHoaDon
(
	MaHoaDon    CHAR(5)         NOT NULL,
	MaSP        CHAR(5)         NOT NULL,
	TenSP       VARCHAR(40)     NOT NULL,
	SoLuong     INT,
	GiaTien     INT
);

CREATE TABLE Kho
(
	MaKho       CHAR(5)         NOT NULL,
	TenKho      VARCHAR(40)     NOT NULL,
	DiaChiKho   VARCHAR(10),
	SDTKho      VARCHAR(10)
);

CREATE TABLE PhieuNhapKho
(
	MaPhieuNhap CHAR(5)         NOT NULL,
	MaKho       CHAR(5)         NOT NULL,
	MaNV        CHAR(5)         NOT NULL,
	NgayNhap    DATETIME        NOT NULL,
	TongTien    INT             NOT NULL
);

CREATE TABLE CTPhieuNhapKho
(
	MaPhieuNhap CHAR(5)         NOT NULL,
	MaNCC       CHAR(7)         NOT NULL,
	SLNhap      INT,
	Tamtinh     INT,
	DonGia      INT             NOT NULL,
	TenSP       VARCHAR(50)
);

CREATE TABLE SanPhamNCC
(
    MaNCC       CHAR(7)         NOT NULL,
	MaSP        CHAR(5)         NOT NULL,
	TenSP       VARCHAR(50)     NOT NULL,
	DonGia      INT             NOT NULL
);

-- Thiết lập ràng buộc --
-- Khóa chính --
ALTER TABLE HoaDon
	ADD CONSTRAINT PK_HoaDon PRIMARY KEY (MaHoaDon);

ALTER TABLE NhaCungCap
	ADD CONSTRAINT PK_NhaCungCap PRIMARY KEY (MaNCC);

ALTER TABLE SanPham
	ADD CONSTRAINT PK_SanPham PRIMARY KEY (MaSP);

ALTER TABLE NhanVien
	ADD CONSTRAINT PK_NhanVien PRIMARY KEY (MaNV);

ALTER TABLE KhachHang
	ADD CONSTRAINT PK_KhachHang PRIMARY KEY (MaKH);

ALTER TABLE Kho
	ADD CONSTRAINT PK_Kho PRIMARY KEY (MaKho);

ALTER TABLE PhieuNhapKho
	ADD CONSTRAINT PK_PhieuNhapKho PRIMARY KEY(MaPhieuNhap);

ALTER TABLE ChuongTrinhKhuyenMai
	ADD CONSTRAINT PK_ChuongTrinhKhuyenMai PRIMARY KEY(MaCTKM);

ALTER TABLE TaiKhoan
	ADD CONSTRAINT PK_TaiKhoan PRIMARY KEY(MaTK);

-- Khóa ngoại --
ALTER TABLE HoaDon
	ADD CONSTRAINT FK_MaKhachHang_HoaDon FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH);

ALTER TABLE HoaDon
    ADD CONSTRAINT FK_MaNhanVien_HoaDon FOREIGN KEY (MaNV) REFERENCES NhanVien(MaNV);

ALTER TABLE SanPhamNCC
    ADD CONSTRAINT FK_MaNCC_SanPhamNCC  FOREIGN KEY (MaNCC) REFERENCES NhaCungCap(MaNCC);

ALTER TABLE SanPhamNCC
    ADD CONSTRAINT FK_MaSP_SanPhamNCC   FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP);

ALTER TABLE CTHoaDon 
	ADD CONSTRAINT FK_MaHoaDon_CTHoaDon FOREIGN KEY (MaHoaDon) REFERENCES HoaDon(MaHoaDon);

ALTER TABLE CTHoaDon 
	ADD CONSTRAINT FK_MaSP_CTHoaDon FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP);

ALTER TABLE KhachHang
	ADD CONSTRAINT FK_MaTK_KhachHang FOREIGN KEY (MaTK) REFERENCES TaiKhoan(MaTK);

ALTER TABLE NhanVien
	ADD CONSTRAINT FK_MaTK_NhanVien FOREIGN KEY (MaTK) REFERENCES TaiKhoan(MaTK);

ALTER TABLE Quyen   
    ADD CONSTRAINT FK_MaTK_Quyen FOREIGN KEY (MaTK) REFERENCES TaiKhoan(MaTK);

ALTER TABLE PhieuNhapKho
	ADD CONSTRAINT FK_MaKho_PhieuNhapKho FOREIGN KEY (MaKho) REFERENCES Kho(MaKho);

ALTER TABLE PhieuNhapKho
	ADD CONSTRAINT FK_MaNV_PhieuNhapKho FOREIGN KEY (MaNV) REFERENCES NhanVien(MaNV);

ALTER TABLE CTPhieuNhapKho
	ADD CONSTRAINT FK_MaPhieuNhap_CTPhieuNhapKho FOREIGN KEY (MaPhieuNhap) REFERENCES PhieuNhapKho(MaPhieuNhap);

ALTER TABLE CTPhieuNhapKho
	ADD CONSTRAINT FK_MaNCC_CTPhieuNhapKho FOREIGN KEY (MaNCC) REFERENCES NhaCungCap(MaNCC);
