<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>หนังสือทั้งหมด - Book Store.</title>
</head>

<body class="bg-gray-600">
    <!-- Navbar -->
    <?php

    if ($_SESSION["emp_admin"] == 1) {
        header("location: ./bookOrder.php");
    }

    $_GET["all"] = 1;
    include("./include/nav.php");

    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./login.php");
    }
    ?>

    <!-- Content -->

    <!-- <div style="padding:20px"></div> -->
    <div class="min-h-screen bg-gray-600 mt-9 mb-9 pt-10 p-14">


        <div style="width:30%; margin:auto;" class="text-white rounded-full">
            <div style="padding:20px; width:100%;" class="text-gray-1000 text-center text-4xl font-bold">
                <i class="fa-solid fa-bag-shopping"></i> <u> ซื้อหนังสือ</u>
            </div>

        </div>
        <br>
        <div class="relative overflow-x-auto">
            <table class="w-auto text-sm m-auto text-left text-gray-500 dark:text-gray-400 rounded">
                <thead class="text-xl text-gray-700 font-bold uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr align=center>
                        <th style="width:280px" scope="col" class="px-6 py-3"><i class="fa-solid fa-book"></i> หนังสือ</th>
                        <th style="width:700px" scope="col" class="px-6 py-3"><i class="fa-solid fa-circle-info"></i> รายละเอียด</th>
                        <th style="width:280px" scope="col" class="px-6 py-3"><i class="fa-solid fa-bag-shopping"></i> สั่งซื้อ</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $result = getStock();
                    while ($row = $result->fetch_assoc()) {
                        $detail = $row["Product_des"];
                        echo "
                        
                            <tr class='bg-gray-700 border-b dark:bg-gray-800 dark:border-gray-700'>
                                <div>
                                    <td class='px-4 py-4'>
                                        <a name='" . $row["Product_id"] . "' style='scroll-margin-top: 100px;'> </a>
                                        <img style='width:240px; height:319px;' class='m-auto shadow' src='" . $row["Product_img"] . " '>
                                    </td>


                                    <td class='px-4 py-1'>
                                        <div class='text-white p-4 text-xl font-black'>
                                            <!-- Book Name -->
                                                " . $row["Product_name"] . "
                                        </div>
                                        <div style='height:95px; padding: 0px 10px 0px;' class='text-white text-xl'>
                                            <!-- Book Detail -->
                                            
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $detail . "

                                        </div>
                                    
                                        <!-- Book Auther -->
                                        <div style='padding: 8px 10px 0px;' class='text-white text-xl text-end'>
                                            <b>ผู้เขียน:</b> " . $row["Product_author"] . " <br>
                                            <b>สำนักพิมพ์:</b> " . $row["Product_publisher"] . "<br>

                                            <!-- Book Price -->
                                            <div class='text-superred text-xl font-bold'>
                                                <b>ราคา</b> " . $row["PricePerUnit"] . " บาท<br>
                                            </div>
                                        </div>

                                    </td>
                                    <td class='px-6 py-4'>

                                        <div style='padding:0px 20px; text-align: center;'>
                                            <label class='block uppercase tracking-wide text-superred text-xl font-bold mb-2' for='grid-buy'>
                                                เหลือ  " . $row["Product_qty"] . " เล่ม
                                            </label>
                                            <input name='buy[" . $row["Product_id"] . "][amount]' class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-buy' value='0' min='0'  max='" . $row["Product_qty"] . "' type='number' placeholder='จำนวนที่ซื้อ'>
                                            <input type='hidden' name='buy[" . $row["Product_id"] . "][name]' value='" . $row["Product_name"] . "'>
                                            <input type='hidden' name='buy[" . $row["Product_id"] . "][price]' value='" . $row["PricePerUnit"] . "'>
                                            <input type='hidden' name='buy[" . $row["Product_id"] . "][qty]' value='" . $row["Product_qty"] . "'>
                                        </div>
                                    </td>
                                <div>

                            </tr> 
                                ";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php
    echo "</form>";
    ?>

    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>