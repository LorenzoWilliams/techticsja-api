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

create table Status(
	id int primary key auto_increment,
	Status nvarchar(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

create table Users(
	id int primary key auto_increment,
	Role_id int NOT NULL, 
	foreign key (Role_id) REFERENCES Roles(id) on delete cascade,
	FirstName nvarchar(30) NOT NULL,
	LastName nvarchar(50) NOT NULL,
	Gender_id int NOT NULL, 
	foreign key (Gender_id) REFERENCES Genders(id) on delete cascade,
	DOB date NOT NULL,
    Email nvarchar(50) NOT NULL,
    Phone nvarchar(15) NOT NULL,
	Address nvarchar(300) NOT NULL,
    Password nvarchar(200) NOT NULL,
    Avatar_path nvarchar(200),
    Member_since date NOT NULL
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
    foreign key (Pay_Status_id) REFERENCES Pay_Status(id) on delete cascade,
	Product_id int,
    foreign key (Product_id) REFERENCES Products(id) on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE Projects (
  id int primary key auto_increment,
  Product_id int,
  foreign key (Product_id) REFERENCES Products(id) on delete cascade,
  Name nvarchar(200) NOT NULL,
  Description text NOT NULL,
  Status int(2) NOT NULL,
  Start_date date NOT NULL,
  End_date date NOT NULL,
  User_id int,
  foreign key (User_id) REFERENCES Users(id) on delete cascade,
  Date_created datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Tasks (
  id int primary key auto_increment,
  Product_id int,
  foreign key (Product_id) REFERENCES Products(id) on delete cascade,
  Project_id int,
  foreign key (Project_id) REFERENCES Projects(id) on delete cascade,
  Task nvarchar(200) NOT NULL,
  Description nvarchar(1000) NOT NULL,
  Status int(4) NOT NULL,
  Date_created datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE System_settings (
  id int primary key auto_increment,
  Name nvarchar(20) NOT NULL,
  Email nvarchar(50) NOT NULL,
  Phone nvarchar(15) NOT NULL,
  Address nvarchar(300) NOT NULL,
  Logo nvarchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE User_productivity (
  id int primary key auto_increment,
  Project_id int,
  foreign key (Project_id) REFERENCES Projects(id) on delete cascade,
  Task_id int,
  foreign key (Task_id) REFERENCES Tasks(id) on delete cascade,
  Comments nvarchar(300) NOT NULL,
  Subject nvarchar(200) NOT NULL,
  Date date NOT NULL,
  Start_time time NOT NULL,
  End_time time NOT NULL,
  User_id int,
  foreign key (User_id) REFERENCES Users(id) on delete cascade,
  Time_rendered float NOT NULL,
  Date_created datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO System_settings (id, Name, Email, Phone, Address, Logo) VALUES
(1, 'TechticsJA', 'techtics.ja@gmail.com', '8763716518', 'Lot 76 Caliway Southboro St. Catherine', 'uploads/techtics.pgn');

INSERT INTO Roles(Role)
VALUES ('Client'),('Aministrator'),('Software Developer'),('Web Administrator'),
		('Database Administrator'),('Graphics Designer'),('Draughtsman');

INSERT INTO Genders(Gender)
VALUES ('Male'),('Female');
 
INSERT INTO Pay_Status(Pay_Status)
VALUES ('Paid'),('Not Paid');

INSERT INTO Status(Status)
VALUES ('Pending'),('Started'),('In-Progress'),('On-Hold'),('Over Due'),('Done');
         
INSERT INTO Users(Role_id,FirstName,LastName,Gender_id,DOB,Email,Phone,Address,Password,Avatar_path,Member_since)
VALUES ('1','Lorencio','Williams','1','2000-05-29','cio_williams@gmail.com','8764219284','Red Hills Road St. Andrew','12345','','2021-12-03');

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
VALUES ('2019-11-10','1','JMD','10000','1');

INSERT INTO Payments(User_id,Invoice_id,Pay_Status_id)
VALUES ('1','1','1');

INSERT INTO Projects (id, Product_id, Name, Description, Status, Start_date, End_date, User_id, Date_created) VALUES
(1, 1,'Sample Project', 'logo', 0, '2020-11-03', '2021-01-20', '1', '2020-12-03 09:56:56');

INSERT INTO Tasks (id, Product_id, Project_id, Task, Description, Status, Date_created) VALUES
(1, 1, 1, 'Sample Task 1', 'logo', 3, '2020-12-03 11:08:58');

INSERT INTO User_productivity (id, Project_id, Task_id, Comments, Subject, Date, Start_time, End_time, User_id, Time_rendered, Date_created) VALUES
(1, 1, 1, 'logo	', 'Sample Progress', '2020-12-03', '08:00:00', '10:00:00', 1, 2, '2020-12-03 12:13:28');

