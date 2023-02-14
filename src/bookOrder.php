<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>รายละเอียดการซื้อ - Book Store.</title>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <?php
    include("./include/nav.php");

    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./login.php");
    }

    if (isset($_GET["day"])) {
        $result = getOrderByEmpWithDate($_SESSION["EmployeeID"], $_GET["day"]);
    } else if (isset($_GET["date1"]) && isset($_GET["date2"])) {
        $result = getOrderByEmpWithDateToDate($_SESSION["EmployeeID"], strtr($_GET["date1"], 'T', ' '), strtr($_GET["date2"], 'T', ' '));
    } else if (isset($_GET["today"])) {
        $result = getOrderByEmpToday($_SESSION["EmployeeID"]);
    } else {
        $result = getOrderByEmp($_SESSION["EmployeeID"]);
    }




    ?>

    <!-- Content -->

    <!-- <div style="padding:20px"></div> -->
    <div class="min-h-screen bg-gray-600 mt-9 mb-9 pt-10 p-14">
        <div style="width:30%; margin:auto;" class="text-white rounded-full">
            <div style="padding:20px; width:100%;" class="text-gray-1000 text-center text-4xl font-bold">
                <u> รายละเอียดการซื้อ</u>
            </div>

        </div>
        <br>

        <div class="relative overflow-x-auto">
            <table align="center" class="text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                    <tr align="center">
                        <th colspan="6" width="200px" scope="col" class="px-6 py-3 text-xl">

                            <table>

                                <tr>
                                    <form action="./bookOrder.php" method="get">
                                        <td class="text-white px-6 py-3 text-xl">
                                            จาก
                                        </td>
                                        <td>
                                            <div class="relative max-w-sm">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>

                                                <input datepicker type="datetime-local" name="date1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" max="<?php echo date('Y-m-d H:i:s'); ?>" value="<?php echo date('Y-m-d H:i:s', strtotime(' -1 day')); ?>">
                                            </div>

                                        </td>
                                        <td class="text-white px-6 py-3 text-xl">
                                            ถึง
                                        </td>
                                        <td>
                                            <div class="relative max-w-sm">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker type="datetime-local" name="date2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" max="<?php echo date('Y-m-d H:i:s'); ?>" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </td>
                                        <td style="padding-left:20px">
                                            <button class='bg-superred hover:bg-redred text-white text-xl font-bold py-2 px-6 rounded-full'>
                                                <i class="fa-solid fa-calendar-days"> </i> แสดง
                                            </button>
                                        </td>
                                    </form>
                                    <td style="padding-left:20px">
                                        <a href="./bookOrder.php?today=1">
                                            <button class='bg-green-500 hover:bg-green-600 text-white text-xl font-bold py-2 px-6 rounded-full'>
                                                <i class="fa-solid fa-calendar-day"></i> วันนี้
                                            </button>
                                        </a>
                                    </td>
                                </tr>



                            </table>



                        </th>
                        <th width="300px" scope="col" class="py-2 text-xl">

                            <div style="margin:auto; width: 100%;" class="dropdown">
                                <button style="width: 100%;" class="dropbtn text-xl">ดูย้อนหลัง</button>
                                <div style="width: 100%;" class="dropdown-content text-xl">
                                    <a href="./bookOrder.php?day=30">30 วันก่อน</a>
                                    <a href="./bookOrder.php?day=7">7 วันก่อน</a>
                                    <a href="./bookOrder.php?day=1">24 ชั่วโมงก่อน</a>
                                </div>
                            </div>

                        </th>
                    </tr>
                </thead>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr align="center">
                        <th width="150px" scope="col" class="px-6 py-3 text-xl">
                            Order id
                        </th>
                        <th width="150px" scope="col" class="px-6 py-3 text-xl">
                            รหัสผู้ซื้อ
                        </th>
                        <th width="200px" scope="col" class="px-6 py-3 text-xl">
                            ชื่อผู้ซื้อ
                        </th>
                        <th width="200px" scope="col" class="px-6 py-3 text-xl">
                            วันที่ซื้อ
                        </th>
                        <th width="300px" scope="col" class="px-6 py-3 text-xl">
                            ราคารวม
                        </th>
                        <th width="200px" scope="col" class="px-6 py-3 text-xl">
                            จำนวนรายการ
                        </th>
                        <th width="300px" scope="col" class="px-6 py-3 text-xl">
                            Overview
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $orderQty = 0;
                    $allPrice = 0;
                    $allItem = 0;


                    while ($row = $result->fetch_assoc()) {
                        $itemCount = getCountDetail($row["Order_id"])["C"];
                        $orderQty++;
                        $allPrice += $row["Order_Price"];
                        $allItem += $itemCount;
                        echo "
                            <tr align='center' class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                                <th scope='row' class='px-6 py-4 text-xl font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                    " . $row["Order_id"] . "
                                </th>
                                <td class='px-6 py-4 text-xl'>
                                    " . $row["EmployeeID"] . "
                                </td>
                                <td class='px-6 py-4 text-xl'>
                                    " . $row["emp_name"] . "
                                </td>
                                <td class='px-6 py-4 text-xl'>
                                    " . $row["Order_date"] . "
                                </td>
                                <td class='px-6 py-4 text-xl'>
                                    " . $row["Order_Price"] . "
                                </td>
                                <td class='px-6 py-4 text-xl'>
                                    " .
                            $itemCount
                            . " 
                                </td>
                                <td class='px-6 py-4'>
                                    <form action='./bookOrderDetail.php' method='get'>
                                        <input type='hidden' name='Order_id' value='" . $row["Order_id"] . "'>
                                        <input type='hidden' name='EmployeeID' value='" . $row["EmployeeID"] . "'>
                                        <button class='bg-superred hover:bg-redred text-white text-xl font-bold py-2 px-6 rounded-full'>
                                           <i class='fa-solid fa-eye'> </i> แสดงเพิ่มเติม 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                
                            ";
                    }
                    ?>


                </tbody>
                <tfoot>
                    <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                        <th align=center class='px-6 py-4 text-xl'>

                        </th>
                        <th align=center class='px-6 py-4 text-xl'>

                        </th>
                        <th align=center colspan="2" scope='row' class='px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white text-2xl '>
                            รวม <?php echo $orderQty; ?> การสั่งซื้อ
                        </th>
                        <th align=center class='px-6 py-4 text-2xl font-bold'>
                            <?php echo  $allPrice ?> บาท
                        </th>
                        <th align=center class='px-6 py-4 text-2xl font-bold'>
                            <?php echo  $allItem; ?> รายการ
                        </th>
                        <th align=center class='px-6 py-4 text-xl'>

                        </th>
                    </tr>
                </tfoot>
            </table>

        </div>


    </div>

    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>