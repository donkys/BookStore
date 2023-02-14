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

                    $result = getOrderByEmp($_SESSION["EmployeeID"]);
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