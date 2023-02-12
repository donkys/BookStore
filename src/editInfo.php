<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>แก้ไขข้อมูล - Book Store.</title>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <?php

    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./login.php");
    }

    if (isset($_POST["submit"])) {
        if (isset($_SESSION["EmployeeID"])) {
            $response = editInfo(
                $_POST["emp_name"],
                $_POST["emp_lname"],
                $_POST["emp_sex"],
                $_POST["emp_BOD"],
                $_POST["emp_addr"],
                $_POST["emp_tel"],
                $_POST["emp_email"]
            );
        } else {
            header("location: ./login.php");
        }
    }
    if (isset($_SESSION["EmployeeID"])) {
        $info = getInfo();
    }


    include("./include/nav.php");




    ?>
    <br>

    <!-- Content -->
    <div style="margin-top: 20px; margin-bottom:35px; padding:50px 50px 0; height:auto; ">
        <div style="width:60%; margin:auto;" class="bg-superpink shadow-md py-10 rounded-lg h-auto content-center">
            <div class="h-auto mx-10 flex grid-cols-2 auto-cols-max">
                <div class="content-center">
                    <img style="margin-top:2%;" class="items-center rounded-lg" src="https://i.pinimg.com/564x/f8/7a/4b/f87a4b58de7da89c6ba9bb95fb93c3a6.jpg" alt="">
                </div>
                <div class="pl-9 content-center">
                    <!-- Form -->
                    <form action="./editInfo.php" method="POST">
                        <h1 class="text-4xl pb-5 font-extrabold text-center"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูล</h1>

                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    ชื่อ
                                </label>
                                <input name="emp_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" value="<?php echo $info["emp_name"]; ?>">

                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    นามสกุล
                                </label>
                                <input name="emp_lname" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" value="<?php echo $info["emp_lname"]; ?>">
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-1">
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-sex">
                                    วันเกิด
                                </label>
                                <input name="emp_BOD" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-sex" type="date" value="<?php echo $info["emp_BOD"]; ?>">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                    เพศ
                                </label>
                                <div class="relative">
                                    <select name="emp_sex" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 mb-3 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option value="M" <?= $info["emp_sex"] == 'M' ? ' selected="selected"' : ''; ?>>ชาย</option>
                                        <option value="F" <?= $info["emp_sex"] == 'F' ? ' selected="selected"' : ''; ?>>หญิง</option>
                                        <option value="N" <?= $info["emp_sex"] == 'N' ? ' selected="selected"' : ''; ?>>ไม่ระบุ</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-1">
                            <div class="w-full md:w-1/2">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-tel">
                                        เบอร์โทร
                                    </label>
                                    <input name="emp_tel" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-tel" type="tel" value="<?php echo $info["emp_tel"]; ?>">
                                </div>
                            </div>

                            <div class="w-full md:w-1/2">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                        อีเมล์
                                    </label>
                                    <input name="emp_email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="email" value="<?php echo $info["emp_email"]; ?>">
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-addr">
                                    ที่อยู่
                                </label>
                                <textarea name="emp_addr" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-addr" rows="4"><?php echo $info["emp_addr"]; ?></textarea>
                            </div>
                        </div>

                        <?php
                        if (isset($response)) {
                            if ($response == "success") {
                                echo "<p class='text-green-600 text-xl italic text-end'> แก้ไขสำเร็จ </p>";
                            } else {
                                echo "<p class='text-redred italic text-end'> $response </p>";
                            }
                        }

                        ?>

                        <div style=" padding:10px 0px" class="flex justify-end">
                            <div>
                                <button name="submit" class="bg-superred hover:bg-redred text-white shadow ml-3 text-xl font-bold py-2 px-6 rounded-full">
                                    แก้ไข
                                </button>
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