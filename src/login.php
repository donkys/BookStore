<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>เข้าสู่ระบบ - Book Store.</title>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">

    <!-- Navbar -->
    <?php
    include("./include/nav.php");
    
    if (isset($_SESSION["EmployeeID"])) {
        header("location: ./");
    }
    ?>
    <?php

    if (isset($_POST["submit"])) {
        $response = loginUser(
            $_POST["emp_username"],
            $_POST["emp_password"]
        );
    }

    ?>
    <br>

    <!-- Content -->
    <div style="margin-top: 50px; margin-bottom:200px; padding:220px 50px 0; height:auto; ">
        <div style="width:380px; margin:auto;" class="bg-superpink shadow-md py-10 rounded-lg h-auto content-center">
            <div class="h-auto mx-10 flex grid-cols-2 auto-cols-max">
                <div class="pl-9 content-center">
                    <!-- Form -->
                    <form action="./login.php" method="POST">
                        <h1 class="text-4xl pb-5 font-extrabold text-center"><i class="fa-solid fa-user"></i> เข้าสู่ระบบ</h1>

                        <div class="w-full">
                            <div class="w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-username">
                                    ชื่อผู้ใช้
                                </label>
                                <input name="emp_username" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-username" type="text" placeholder="Username">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                    รหัสผ่าน
                                </label>
                                <input name="emp_password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="•••••••••••••••••••">
                            </div>
                        </div>

                        <?php
                        if (isset($response)) {
                            if ($response == "success") {
                                echo "<p class='text-green-600 text-xl italic text-end'> สมัครสมาชิกสำเร็จ </p>";
                            } else {
                                echo "<p class='text-redred italic text-end'> $response </p>";
                            }
                        }

                        ?>

                        <div style=" padding:10px 0px" class="flex justify-end">
                            <div>
                                <button name="submit" class="bg-superred hover:bg-redred text-white shadow ml-3 text-xl font-bold py-2 px-6 rounded-full">
                                     เข้าสู่ระบบ <i class="fa-solid fa-right-to-bracket"> </i>
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