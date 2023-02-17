CREATE TABLE employees (
   EmployeeID int NOT NULL AUTO_INCREMENT,
   emp_name VARCHAR(100) NOT NULL,
   emp_lname VARCHAR(100) NOT NULL,
   emp_sex VARCHAR(3),
   emp_BOD DATE,
   emp_addr VARCHAR(255),
   emp_tel VARCHAR(25) NOT NULL,
   emp_email VARCHAR(50) NOT NULL,
   emp_update DATE NOT NULL,
   emp_username VARCHAR(50) NOT NULL,
   emp_password VARCHAR(255) NOT NULL,
   emp_admin int(2) NOT NULL,
   PRIMARY KEY (EmployeeID)
);

CREATE TABLE stocks (
   Product_id int NOT NULL AUTO_INCREMENT,
   Product_img VARCHAR(255),
   Product_name VARCHAR(100) NOT NULL,
   Product_qty int NOT NULL,
   PricePerUnit float NOT NULL,
   Product_author VARCHAR(255),
   Product_publisher VARCHAR(255),
   Product_des TEXT,
   PRIMARY KEY (Product_id)
);

CREATE TABLE orders (
   Order_id int NOT NULL AUTO_INCREMENT,
   EmployeeID int NOT NULL,
   Order_date DATETIME NOT NULL,
   Order_Price float NOT NULL,
   PRIMARY KEY(Order_id),
   FOREIGN KEY (EmployeeID) REFERENCES employees(EmployeeID)
);

--  CREATE TABLE Orders_detail (
--    Orid int NOT NULL AUTO_INCREMENT,
--    Order_id int NOT NULL,
--    Product_id int NOT NULL,
--    Product_name VARCHAR(100),
--    Ord_Price float,
--    Ord_pperunit float,
--    Ord_qty int,
--    Ord_update Date,
--    FOREIGN KEY (Order_id) REFERENCES Orders(Order_id),
--    FOREIGN KEY (Product_id) REFERENCES Stocks(Product_id),
--    PRIMARY KEY(Orid, Order_id)
-- );
-- FIX
-- CREATE TABLE Orders_detail (
--    Orid int NOT NULL,
--    Order_id int NOT NULL,
--    Product_id int NOT NULL,
--    Product_name VARCHAR(100),
--    Ord_pperunit float,
--    Ord_qty int,
--    Ord_price float,
--    PRIMARY KEY (Order_id, Orid),
--    FOREIGN KEY (Order_id) REFERENCES Orders(Order_id),
--    FOREIGN KEY (Product_id) REFERENCES Stocks(Product_id)
-- );
-- DELIMITER $$
-- CREATE TRIGGER tr_ai_Orders_detail
-- BEFORE INSERT ON Orders_detail
-- FOR EACH ROW
-- BEGIN
--   SET @last_id = (SELECT COALESCE(MAX(Orid),0) FROM Orders_detail);
--   SET NEW.Orid = @last_id + 1;
-- END$$
-- DELIMITER ;
-- fix2
CREATE TABLE orders_detail (
   Orid int NOT NULL,
   Order_id int NOT NULL,
   Product_id int NOT NULL,
   Product_name VARCHAR(100),
   Ord_pperunit float,
   Ord_qty int,
   Ord_price float,
   PRIMARY KEY(Order_id, Orid),
   FOREIGN KEY (Order_id) REFERENCES orders(Order_id),
   FOREIGN KEY (Product_id) REFERENCES stocks(Product_id)
);

DELIMITER $$ CREATE TRIGGER tr_ai_orders_detail BEFORE
INSERT ON orders_detail FOR EACH ROW BEGIN
SET @last_id = (
      SELECT COALESCE(MAX(orid), 0)
      FROM orders_detail
      WHERE order_id = NEW.order_id
   );
SET NEW.orid = @last_id + 1;
END $$ DELIMITER;
-- 2023-02-13 19:29:15
-- SELECT * FROM orders WHERE Order_date >= CURDATE();
-- SELECT * FROM orders WHERE Order_date >= '2023-02-13 19:29:15' AND Order_date <= '2023-02-13 22:55:5';
-- SELECT * FROM orders WHERE Order_date >= '2023-02-13' AND Order_date <= '2023-02-13';
-- 2023-02-13 22:55:5
-- SELECT *
-- FROM orders
-- WHERE Order_date BETWEEN '2023-02-13' AND '2023-02-14';
-- SELECT *
-- FROM orders
-- WHERE Order_date > DATE_ADD(NOW(), INTERVAL -30 DAY);
-- SELECT DATE_ADD(NOW(), INTERVAL -30 DAY);
-- SELECT DATE_ADD('2023-02-13', INTERVAL -3 DAY);

DELIMITER $$
CREATE TRIGGER tr_ai_orders_detail
BEFORE INSERT ON orders_detail
FOR EACH ROW
BEGIN
  SET @last_id = (SELECT COALESCE(MAX(Orid),0) FROM orders_detail WHERE Order_id = NEW.Order_id);
  SET NEW.Orid = @last_id + 1;
END$$
DELIMITER ;