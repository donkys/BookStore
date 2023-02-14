<?php
require("./include/Connection.php");
require("./include/Config.php");

function registerUser(
    $emp_name,
    $emp_lname,
    $emp_sex,
    $emp_BOD,
    $emp_addr,
    $emp_tel,
    $emp_email,
    $emp_username,
    $emp_password,
    $emp_conpassword
) {

    $mysqli = connect();
    $args = func_get_args();

    $args = array_map(
        function ($value) {
            return trim($value);
        },
        $args
    );

    foreach ($args as $value) {
        if (empty($value)) {
            return "All field are required";
        }
    }

    foreach ($args as $value) {
        if (preg_match("/([<|>])/", $value)) {
            return "<> Characters are not allowed";
        }
    }

    if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL))
        return "Email is not valid";

    $stmt = $mysqli->prepare("SELECT emp_email from employees WHERE emp_email = ?");
    $stmt->bind_param("s", $emp_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data != NULL) {
        return "Email already exists, please use a different Email";
    }

    if (strlen($emp_username) > 50) return "Username is too long";

    $stmt = $mysqli->prepare("SELECT emp_username from employees WHERE emp_username = ?");
    $stmt->bind_param("s", $emp_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data != NULL) {
        return "Username already exists, please use a different username";
    }

    if (strlen($emp_password) > 50) return "Password is too long";
    if ($emp_password != $emp_conpassword) return "Password don't mathc";

    $hash_password = password_hash($emp_password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO employees(emp_name, emp_lname, emp_sex, emp_BOD, emp_addr, emp_tel, emp_email, emp_update, emp_username, emp_password) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssssss",
        $emp_name,
        $emp_lname,
        $emp_sex,
        $emp_BOD,
        $emp_addr,
        $emp_tel,
        $emp_email,
        date("Y-m-d"),
        $emp_username,
        $hash_password,
    );
    $stmt->execute();
    if ($stmt->affected_rows != 1) {
        return "An error occured. Please try again";
    } else {
        return "success";
    }
}

function loginUser($username, $password)
{
    $mysqli = connect();
    $username = trim($username);
    $password = trim($password);

    if ($username == "" || $password == "") {
        return "Both fields are required";
    }

    $sql = "SELECT emp_username, emp_password, emp_name, emp_lname, EmployeeID, emp_admin FROM employees WHERE emp_username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data == NULL) {
        return "Wrong username or password";
    }

    if (password_verify($password, $data["emp_password"]) == FALSE) {
        return "Wrong Username or Password";
    } else {
        $_SESSION["emp_username"] = $username;
        $_SESSION["emp_name"] = $data["emp_name"];
        $_SESSION["emp_lname"] = $data["emp_lname"];
        $_SESSION["EmployeeID"] = $data["EmployeeID"];
        $_SESSION["emp_admin"] = $data["emp_admin"];

        header("location: ./");
        exit();
    }
}

function getInfo()
{
    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./login.php");
    }
    $mysqli = connect();
    $sql = "SELECT * FROM employees WHERE EmployeeID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_SESSION["EmployeeID"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    return $data;
}

function editInfo(
    $emp_name,
    $emp_lname,
    $emp_sex,
    $emp_BOD,
    $emp_addr,
    $emp_tel,
    $emp_email
) {
    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./login.php");
    }
    $d = date("Y-m-d");
    $mysqli = connect();
    $sql = "UPDATE employees SET emp_name= ?, emp_lname= ?, emp_sex= ?, emp_BOD= ?, emp_addr= ?, emp_tel= ?, emp_email= ?, emp_update= ? WHERE EmployeeID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param(
        "sssssssss",
        $emp_name,
        $emp_lname,
        $emp_sex,
        $emp_BOD,
        $emp_addr,
        $emp_tel,
        $emp_email,
        $d,
        $_SESSION["EmployeeID"]
    );
    $stmt->execute();
    $nrows = $stmt->affected_rows;
    if (!$nrows) {
        return "Edit Information Unsuccess";
    }
    $_SESSION["emp_name"] = $emp_name;
    $_SESSION["emp_lname"] = $emp_lname;

    return "success";
}

function addProduct($Product_img, $Product_name, $Product_qty, $PricePerUnit, $Product_author, $Product_publisher, $Product_des)
{
    if (!isset($_SESSION["emp_admin"]) && !$_SESSION["emp_admin"] == 1) {
        header("location: ./index.php");
    }
    $mysqli = connect();
    $stmt = $mysqli->prepare("INSERT INTO Stocks(Product_img, Product_name, Product_qty, PricePerUnit, Product_author, Product_publisher, Product_des) VALUE(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssssss",
        $Product_img,
        $Product_name,
        $Product_qty,
        $PricePerUnit,
        $Product_author,
        $Product_publisher,
        $Product_des
    );
    $stmt->execute();
    if ($stmt->affected_rows != 1) {
        return "An error occured. Please try again";
    } else {
        return "success";
    }
}

function limit($value, $limit = 110, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }
    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
}

function getStock()
{
    $mysqli = connect();
    $sql = "SELECT * FROM Stocks";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function getOrder()
{
    $mysqli = connect();
    $stmt = $mysqli->prepare("SELECT * FROM Orders WHERE EmployeeID = ? ORDER BY Order_id DESC");
    $stmt->bind_param(
        "s",
        $_SESSION["EmployeeID"]
    );
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


function insertBook($bought)
{

    $mysqli = connect();

    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./index.php");
    }

    $sum = 0;

    foreach ($bought as $value) {
        if ($value["amount"] != 0) {
            // print_r($value);
            // print $value["amount"] . ", " . $value["name"] . ", " . $value["price"] . ", " . $value["qty"] . "<br>";
            $sum += $value["amount"] * $value["price"];
        }
    }
    // echo $sum;
    $time = date('Y-m-d H:i:s');

    if ($sum != 0) {
        $stmt = $mysqli->prepare("INSERT INTO orders(EmployeeID, Order_date, Order_Price) VALUE(?, ?, ?) ");
        $stmt->bind_param(
            "sss",
            $_SESSION["EmployeeID"],
            $time,
            $sum
        );
        $stmt->execute();
    }
    if (empty($stmt->affected_rows)) {
        return "Null. Please try again";
    }

    if ($stmt->affected_rows != 1) {
        return "An error occured 1. Please try again";
    }


    $row = getOrder()->fetch_assoc();
    foreach ($bought as $key => $value) {
        if ($value["amount"] != 0) {
            $sqlUpdateStocks = "UPDATE Stocks SET Product_qty = Product_qty - " . $value["amount"] . " WHERE Product_id = " . $key . ";";
            $mysqli->query($sqlUpdateStocks);

            $Ord_Price = ($value["price"] * $value["amount"]);

            $stmt = $mysqli->prepare("INSERT INTO orders_detail(Order_id, Product_id, Product_name, Ord_Price, Ord_pperunit, Ord_qty) VALUES (?, ?, ?, ?, ?, ?);");
            $stmt->bind_param(
                "ssssss",
                $row["Order_id"],
                $key,
                $value["name"],
                $Ord_Price,
                $value["price"],
                $value["amount"],
            );
            $stmt->execute();
            if ($stmt->affected_rows != 1) {
                return "An error occured 2. Please try again";
            }
        }
    }
}

function updateBook($bookprice)
{
    $mysqli = connect();
    $key = array_keys($bookprice)[0];
    $amount = $bookprice[$key]["amount"];
    $price = $bookprice[$key]["price"];

    $stmt = $mysqli->prepare("UPDATE stocks SET Product_qty=?, PricePerUnit=? WHERE Product_id = ?;");
    $stmt->bind_param(
        "sss",
        $amount,
        $price,
        $key
    );
    $stmt->execute();
    if ($stmt->affected_rows != 1) {
        return "An error occured. Please try again";
    } else alert("แก้ไขสำเร็จ");
    return $bookprice;
}

function getOrderDetail($Order_id, $EmployeeID)
{
    if ($EmployeeID == $_SESSION["EmployeeID"] || $_SESSION["emp_admin"] == 1) {
        $mysqli = connect();
        $stmt = $mysqli->prepare("SELECT * FROM Orders_detail WHERE Order_id = ?;");
        $stmt->bind_param(
            "s",
            $Order_id
        );
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    } else {
        header("location: index.php");
    }
}

function getOrderByEmp($EmployeeID)
{
    $mysqli = connect();

    if ($_SESSION["emp_admin"] == 1) {
        $stmt = $mysqli->prepare("SELECT Order_id, orders.EmployeeID, emp_name, Order_date, Order_Price 
        FROM orders, employees 
        WHERE orders.EmployeeID = employees.EmployeeID ORDER BY Order_id DESC;");
    } else {
        $stmt = $mysqli->prepare("SELECT Order_id, orders.EmployeeID, emp_name, Order_date, Order_Price FROM orders, employees 
        WHERE orders.EmployeeID = employees.EmployeeID AND orders.EmployeeID = ? ORDER BY Order_id DESC;");
        $stmt->bind_param(
            "s",
            $EmployeeID
        );
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($stmt->affected_rows < 1) {
        alert("ไม่พบข้อมูล");
    }

    return $result;
}

function getCountDetail($Order_id)
{
    $mysqli = connect();
    $stmt = $mysqli->prepare("SELECT COUNT(orders_detail.Orid) AS C FROM `orders_detail` WHERE order_id = ?;");
    $stmt->bind_param(
        "s",
        $Order_id
    );

    $stmt->execute();
    $result = $stmt->get_result();

    if ($stmt->affected_rows < 1) {
        alert("ไม่พบข้อมูล");
    }

    return $result->fetch_assoc();
}

