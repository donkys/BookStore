CREATE TABLE Employees (
   EmployeeID int NOT NULL AUTO_INCREMENT,
   emp_name VARCHAR(100),
   emp_lname VARCHAR(100),
   emp_sex VARCHAR(3),
   emp_BOD DATE,
   emp_addr VARCHAR(255),
   emp_tel VARCHAR(25),
   emp_email VARCHAR(50),
   emp_update DATE,
   emp_username VARCHAR(50),
   emp_password VARCHAR(255),
   PRIMARY KEY (EmployeeID)
);

CREATE TABLE Stocks (
   Product_id int NOT NULL AUTO_INCREMENT,
   Product_img VARCHAR(255),
   Product_name VARCHAR(100),
   Product_qty int,
   PricePerUnit float,
   PRIMARY KEY (Product_id)
);

CREATE TABLE Orders (
   Order_id int NOT NULL AUTO_INCREMENT,
   EmployeeID int NOT NULL,
   Order_date Date,
   Order_Price float,
   PRIMARY KEY(Order_id),
   FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

 CREATE TABLE Orders_detail (
   Orid int NOT NULL AUTO_INCREMENT,
   Order_id int NOT NULL,
   Product_id int NOT NULL,
   Product_name VARCHAR(100),
   Ord_Price float,
   Ord_pperunit float,
   Ord_qty int,
   Ord_update Date,
   FOREIGN KEY (Order_id) REFERENCES Orders(Order_id),
   FOREIGN KEY (Product_id) REFERENCES Stocks(Product_id),
   PRIMARY KEY(Orid, Order_id)
);