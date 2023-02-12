<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>เพิ่มหนังสือ - Book Store.</title>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <?php

    if (!isset($_SESSION["emp_admin"])) {
        header("location: ./login.php");
    }
    if ($_SESSION["emp_admin"] != 1) {
        header("location: ./index.php");
    }

    if (isset($_POST["submit"])) {
        if (isset($_SESSION["EmployeeID"])) {
            $response = addProduct(
                $_POST["Product_img"],
                $_POST["Product_name"],
                $_POST["Product_qty"],
                $_POST["PricePerUnit"],
                $_POST["Product_author"],
                $_POST["Product_publisher"],
                $_POST["Product_des"]
            );
        } else {
            header("location: ./index.php");
        }
    }

    include("./include/nav.php");

    ?>
    <br>

    <!-- Content -->
    <div style="margin-top: 20px; margin-bottom:35px; padding:50px 50px 0; height:auto; ">
        <div style="width:60%; margin:auto;" class="bg-superpink shadow-md py-10 rounded-lg h-auto content-center">
            <div class="h-auto mx-10 flex grid-cols-2 auto-cols-max">
                <div class="content-center">
                    <img style="margin-top:2%;" class="items-center rounded-lg" src="https://i.pinimg.com/564x/2b/c9/20/2bc920297383db05218b46eee50320b8.jpg" alt="">
                </div>
                <div class="pl-9 content-center">

                    <!-- Form -->

                    <form action="./addProduct.php" method="POST">
                        <h1 class="text-4xl pb-5 font-extrabold text-center"><i class="fa-solid fa-circle-plus"></i> เพิ่มหนังสือ</h1>

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-addr">
                                    รูปภาพ
                                </label>
                                <textarea name="Product_img" placeholder="URL รูปภาพ" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-addr"></textarea>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    ชื่อหนังสือ
                                </label>
                                <input name="Product_name" placeholder="ชื่อของหนังสือ" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" ">
                            </div>
                        </div>
                        <div class=" flex flex-wrap -mx-3 mb-1">
                                <div class="w-full md:w-1/2">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-tel">
                                            ผู้เขียน
                                        </label>
                                        <input name="Product_author" placeholder="ผู้เขียนหนังสือ" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-tel" type="text"">
                                </div>
                            </div>

                            <div class=" w-full md:w-1/2">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                                สำนักพิมพ์
                                            </label>
                                            <input name="Product_publisher" placeholder="สำนักพิมพ์หนังสือ" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-1">
                                    <div class="w-full md:w-1/2">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-tel">
                                                จำนวน
                                            </label>
                                            <input name="Product_qty" placeholder="จำนวนในสต็อก" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-tel" type="number">
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/2">
                                        <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                                ราคา
                                            </label>
                                            <input name="PricePerUnit" placeholder="ราคาต่อเล่ม" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" step='0.01' type="number">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-addr">
                                            รายละเอียด
                                        </label>
                                        <textarea name="Product_des" placeholder="รายละเอียดของหนังสือ" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-addr"></textarea>
                                    </div>
                                </div>

                                <?php
                                if (isset($response)) {
                                    if ($response == "success") {
                                        echo "<p class='text-green-600 text-xl italic text-end'> เพิ่มสำเร็จ </p>";
                                    } else {
                                        echo "<p class='text-redred italic text-end'> $response </p>";
                                    }
                                }

                                ?>

                                <div style=" padding:10px 0px" class="flex justify-end">
                                    <div>
                                        <button name="submit" class="bg-superred hover:bg-redred text-white shadow ml-3 text-xl font-bold py-2 px-6 rounded-full">
                                            เพิ่ม
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>