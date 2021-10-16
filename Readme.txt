Danh sách các bảng database có trong hệ thống

- Danh sách bệnh khám
create table danhsachbenhkham
(
	id int AUTO_INCREMENT PRIMARY KEY,
  	tenBenh varchar(100)
)
- Đơn khám bệnh
create table donkhambenh
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(100),
    email varchar(150),
    date date,
    phoneNumber varchar(50),
    gender bit,
    benhkham int REFERENCES danhsachbenhkham(id),
    id_user int REFERENCES users(id),
    address varchar(200)
)
- admin
create table admin
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(50),
    account varchar(100),
    password varchar(50),
) 
- Nhân viên
create table nhanvien
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(100),
    email varchar(200),
    date date,
    gender bit,
    address varchar(200),
    password varchar(100)
) 
- Lịch khám
create table lichkham
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(100),
    email varchar(200),
    date date,
    gender bit,
    phoneNumber(50),
    address varchar(200),
    benhkham int REFERENCES danhsachbenhkham(id),
    id_bacsi int REFERENCES bacsi(id),
    id_user int REFERENCES users(id),
    dateKham date
) 
- User
create table users
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(100),
    email varchar(200),
    date date,
    gender bit,
    address varchar(200),
    password varchar(100)
) 
- login_tokens

create table login_tokens
(
    id_user int REFERENCES users(id),
    token varchar(200),
    primary key(id_user,token)
) 
- Đơn chờ phê duyệt
create table donchopheduyet
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(100),
    email varchar(150),
    date date,
    phoneNumber varchar(50),
    gender bit,
    benhkham int REFERENCES danhsachbenhkham(id),
    id_user int REFERENCES users(id),
    address varchar(200)
)
- Bác sĩ 
create table bacsi
(
    id int AUTO_INCREMENT PRIMARY KEY,
    fullName varchar(100),
    email varchar(200),
    date date,
    gender bit,
    address varchar(200),
    password varchar(100)
) 