drop database techticsja_db;
create database techticsja_db;

use techticsja_db;

create table Roles(
	id int primary key auto_increment,
	Role nvarchar(30) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Genders(
	id int primary key auto_increment,
	Gender nvarchar(6) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Pay_Status(
	id int primary key auto_increment,
	Pay_Status nvarchar(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Users(
	id int primary key auto_increment,
	Role_id int, 
	foreign key (Role_id) REFERENCES Roles(id) on delete cascade,
	FirstName nvarchar(30) NOT NULL,
	LastName nvarchar(50) NOT NULL,
	Gender_id int, 
	foreign key (Gender_id) REFERENCES Genders(id) on delete cascade,
	DOB date NOT NULL,
    Email nvarchar(50) NOT NULL,
    Phone nvarchar(15) NOT NULL,
	Address nvarchar(300) NOT NULL,
    Password nvarchar(15) NOT NULL,
    Avatar_path nvarchar(200)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Appointments(
	id int primary key auto_increment,
	AppointmentDate date NOT NULL,
	AppointmentTime Time NOT NULL,
    User_id int,
    foreign key (User_id) REFERENCES Users(id) on delete cascade,
	Comments nvarchar(300) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Visits(
	id int primary key auto_increment,
	VisitDate date NOT NULL,
	VisitTime time NOT NULL,
    User_id int,
    foreign key (User_id) REFERENCES Users(id) on delete cascade,
	Comments nvarchar(300) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Products(
	id int primary key auto_increment,
	Product nvarchar(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Invoices(
	id int primary key auto_increment,
	InvoiceDate date NOT NULL,
	Product_id int,
    foreign key (Product_id) REFERENCES Products(id) on delete cascade,
	Currency nvarchar(3) NOT NULL,
	Total float(9) NOT NUll,
    User_id int,
    foreign key (User_id) REFERENCES Users(id) on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Payments(
	id int primary key auto_increment,
    User_id int,
    foreign key (User_id) REFERENCES Users(id) on delete cascade,
    Invoice_id int,
    foreign key (Invoice_id) REFERENCES Invoices(id) on delete cascade,
    Pay_Status_id int,
    foreign key (Pay_Status_id) REFERENCES Pay_Status(id) on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;


INSERT INTO Genders(Gender)
VALUES ('Male'),('Female');
 
INSERT INTO Pay_Status(Pay_Status)
VALUES ('Paid'),('Not Paid');
         
INSERT INTO Users(FirstName,LastName,Gender_id,DOB,Email,Phone,Address,Password,Avatar_path)
VALUES ('Lorencio','Williams','1','2000-05-29','cio_williams@gmail.com','8763716518','Red Hills Road St. Andrew','12345',''),
('Lorenzo','Williams','1','1991-02-12','williamslorenzo473@gmail.com','8764731083','Portmore, St. Catherine','12345','');

INSERT INTO Appointments(AppointmentDate,AppointmentTime,User_id,Comments ) 
VALUES ('2019-11-10','07:30','1',''); 

INSERT INTO Visits(VisitDate,VisitTime,User_id,Comments)
VALUES ('2019-11-10','07:30','1','');

INSERT INTO Products(Product)
VALUES ('Brochure_Basic'),
		('Brochure_Standard'),
		('Brochure_Premium'),
        ('BusinessCard_Basic'),
		('BusinessCard_Standard'),
		('BusinessCard_Premium'),
        ('Flyers_Basic'),
		('Flyers_Standard'),
		('Flyers_Premium'),
        ('Logo_Basic'),
		('Logo_Standard'),
		('Logo_Premium'),
        ('Poster_Basic'),
		('Poster_Standard'),
		('Poster_Premium'),
        ('Webdesign_Basic'),
		('Webdesign_Standard'),
		('Webdesign_Premium'),
        ('Webhosting_Basic'),
		('Webhosting_Standard'),
		('Webhosting_Premium');

INSERT INTO Invoices(InvoiceDate,Product_id,Currency,Total,User_id)
VALUES ('2019-11-10','3','JMD','10000','1');

INSERT INTO Payments(User_id,Invoice_id,Pay_Status_id)
VALUES ('1','1','1');