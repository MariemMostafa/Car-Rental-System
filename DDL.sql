create database car_system
use car_system;
CREATE TABLE country(
 country_id INT AUTO_INCREMENT PRIMARY KEY ,
 country_name VARCHAR(40) NOT NULL
);


CREATE TABLE admin(
    aid INT AUTO_INCREMENT PRIMARY KEY ,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    email VARCHAR(225) UNIQUE  NOT NULL,
    gender ENUM('male', 'female'),
    country_id INT,
    mobileno VARCHAR(15),
    `password` VARCHAR(225)  NOT NULL,
    Bank_no VARCHAR(15)  NOT NULL
); 
CREATE TABLE customers(
    cid INT AUTO_INCREMENT PRIMARY KEY ,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    email VARCHAR(225) UNIQUE,
    gender ENUM('male', 'female'),
    country_id INT  NOT NULL,
    mobile_no VARCHAR(15),
    `password` VARCHAR(225) NOT NULL,
    Bank_no VARCHAR(15)  NOT NULL
    
); 
 CREATE TABLE warehouse(
    warehouse_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Avail_capacity INT NOT NULL,
    location VARCHAR(225) NOT NULL,
    country_id INT NOT NULL
    
); 
CREATE TABLE car(
    car_id INT AUTO_INCREMENT,
    name VARCHAR(225) NOT NULL,
    model VARCHAR(50) NOT NULL,
    plate_no VARCHAR(10),
    Status enum ('reserved','active') NOT NULL,
    `condition` enum ('good','out of service') NOT NULL,
    is_paid ENUM('Y','N') NOT NULL,
    warehouse_id INT NOT NULL,
    color VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    key car_id (car_id),
    PRIMARY KEY (plate_no)
    
);
CREATE TABLE reservation(
    reserve_id INT AUTO_INCREMENT,
    start_date DATE  NOT NULL,
    End_date DATE  NOT NULL,
    plate_no VARCHAR(10) NOT NULL,
    cid INT NOT NULL,
    is_paid ENUM('Y','N') NOT NULL,
    paid_at DATE  NOT NULL,
    total_amount float NOT NULL,
    PRIMARY KEY(reserve_id,plate_no,cid,start_date,End_date)
);
CREATE TABLE status(
    status_date DATETIME,
    Status enum ('reserved','active') NOT NULL,
    `condition` enum ('good','out of service')  NOT NULL,
    plate_no VARCHAR(225),
    `pay_status` enum ('not rented','rented') NOT NULL,
    primary key(status_date,plate_no)
);




ALTER TABLE car ADD CONSTRAINT fk_warehouse FOREIGN KEY (warehouse_id) REFERENCES warehouse(warehouse_id);
ALTER TABLE reservation ADD CONSTRAINT fk_car1 FOREIGN KEY (plate_no) REFERENCES car(plate_no);
ALTER TABLE reservation ADD CONSTRAINT fk_customer FOREIGN KEY (cid) REFERENCES customers(cid);
ALTER TABLE `status` ADD CONSTRAINT fk_car2 FOREIGN KEY (plate_no) REFERENCES car(plate_no);
ALTER TABLE customers ADD CONSTRAINT fk_country3 FOREIGN KEY (country_id) REFERENCES country(country_id);
ALTER TABLE warehouse ADD CONSTRAINT fk_country4 FOREIGN KEY (country_id) REFERENCES country(country_id);
