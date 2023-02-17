<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>หน้าหลัก - Book Store.</title>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <?php
    include("./include/nav.php");
    $result = getStock();
    ?>

    <!-- Content -->
    <div style="margin-top: 50px; padding:50px 50px 0; height:auto;">
        <div style="min-width:1100px" class="bg-superpink w-full relative shadow-md px-0 py-10 rounded-lg h-auto">
            <div class="h-auto mx-10 flex items-center grid-cols-2 auto-cols-max gap-4 content-start">
                <div>
                    <img style="min-width:400px;" class="rounded-lg" src="https://img.freepik.com/free-vector/visitors-bookstore-with-people-choose-books_107791-7069.jpg?w=1380&t=st=1675924452~exp=1675925052~hmac=24b058189daa36f124c3afbeb2e90deb08b7e5bceee39d939631c0e6aa9fad10" alt="">
                </div>
                <div class="pl-9 content-center">
                    <span class="text-gray-1000 text-4xl py-0 font-bold w-full">
                        ยินดีต้องรับเข้าสู่ร้านหนังสือ
                    </span>
                    <p class="text-gray-600 text-2xl w-full">
                        &nbsp;&nbsp;&nbsp; ณ มุมหนึ่งของย่านการค้าใกล้ย่านสำนักงาน ร้านนั้นอยู่ที่ชั้นใต้ดินของอาคารสำนักงานที่มีป้ายรูปหมาเป็นจุดสังเกต "ร้านอาหารตะวันตกเนโกะยะ" ร้านอาหารที่ประตูมีภาพแมวถูกวาดอยู่ เปิดกิจการมาแล้วห้าสิบปี
                    </p>
                    <div style="margin:30px; padding:0px 5px" class="flex justify-start content-center">
                        <?php
                        $role = "";
                        if (isset($_SESSION["EmployeeID"]) && isset($_SESSION["emp_name"])) {
                            $name = $_SESSION["emp_name"];
                            if ($_SESSION["emp_admin"] == 0)
                                $role = "User";
                            else $role = "Admin";

                            echo "<div style='display: block; width: 100%;' class='text-gray-600 text-4xl font-bold mx-auto my-auto'> 
                                            สวัสดี $name " . $_SESSION["emp_lname"] . ", ID: " . $_SESSION["EmployeeID"] . " $role <br>
                                   ";
                            if ($role == "Admin") {
                                echo '                             
                                    <a href="./addProduct.php" class="mt-4">
                                        <button class="bg-green-400 hover:bg-green-500 text-white shadow-lg text-2xl font-bold py-3 px-6 mt-5 rounded-full">
                                            <i class="fa-solid fa-circle-plus"></i> เพิ่มหนังสือ
                                        </button>
                                    </a>
                                    <a href="./addStock.php" class="mt-4">
                                        <button class="bg-green-400 hover:bg-green-500 text-white shadow-lg text-2xl font-bold py-3 px-6 mt-5 rounded-full">
                                            <i class="fa-solid fa-boxes-stacked"></i> แก้ไขสต็อก
                                        </button>
                                    </a>
                                    <a href="./bookOrder.php" class="mt-4">
                                        <button class="bg-green-400 hover:bg-green-500 text-white shadow-lg text-2xl font-bold py-3 px-6 mt-5 rounded-full">
                                        <i class="fa-solid fa-inbox"></i> รายละเอียดการซื้อ
                                        </button>
                                    </a>
                                    
                                    </div>';
                            }
                        } else echo '                
                                <div>
                                    <a href="./login.php">
                                        <button class="bg-superred hover:bg-redred text-white shadow mr-3 text-2xl font-bold py-3 px-6 rounded-full">
                                            เข้าสู่ระบบ <i class="fa-solid fa-right-to-bracket"> </i>
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <a href="./register.php">
                                        <button class="bg-superred hover:bg-redred text-white shadow ml-3 text-2xl font-bold py-3 px-6 rounded-full">
                                            สมัครสมาชิก <i class="fa-solid fa-user-plus fa-sm"> </i>
                                        </button>
                                    </a>
                                </div>
                                ';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="min-h-screen bg-gray-600 mt-9 mb-9 pt-10 p-14">
        <div style="width:30%; margin:auto;" class="text-white rounded-full">
            <div style="padding:20px; width:100%;" class="text-gray-1000 text-center text-4xl font-bold">
                <i class="fa-solid fa-bag-shopping"></i> <u> หนังสือที่น่าสนใจ</u>
            </div>
        </div>
        <br>
        <div class="grid grid-cols-6 gap-7">
            <?php
            while ($row = $result->fetch_assoc()) {
                $detail = limit($row["Product_des"]);
                echo "
                <div style='max-width: 275px'>
                    <div class='bg-gray-700 flex flex-col rounded-md shadow-lg p-4 items-center space-y-14'>
                        <div>
                            <img style='width:240px; height:319px;' class='shadow' src='" . $row["Product_img"] . " '>
                            
                            <div class='text-white p-4 text-center font-black'>
                                <!-- Book Name -->
                                " . $row["Product_name"] . "
                            </div>
                            
                            <div style='height:95px; padding: 0px 10px 0px;' class='text-white'>
                                <!-- Book Detail -->
                                " . $detail . "
                            </div>

                            <!-- Book Auther -->
                            <div style='padding: 8px 10px 0px;' class='text-white text-xm text-end'>
                                <b>ผู้เขียน:</b> " . $row["Product_author"] . " <br>
                                <b>สำนักพิมพ์:</b> " . $row["Product_publisher"] . "<br>

                                <!-- Book Price -->
                                <div class='text-superred text-xl font-bold'>
                                    <b>ราคา</b> " . $row["PricePerUnit"] . " บาท <br>
                                </div>
                            </div>

                            <div style='padding: 20px; text-align: center;'>
                                <a href='./book.php#" . $row["Product_id"] . "'>
                                    <button class='bg-superred hover:bg-redred text-white mr-1 text-xl font-bold py-2 px-6 rounded-full shadow-md'>
                                        <i class='fa-solid fa-bag-shopping'></i> ซื้อหนังสือ
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            ";
            }
            ?>
        </div>
    <!-- </div> -->
    </div>
    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>