<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require("./include/head.php");
    ?>

    <title>ยืนยันการซื้อ - Book Store.</title>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <?php
    include("./include/nav.php");

    if ($_SESSION["emp_admin"] == 1) {
        header("location: ./bookOrder.php");
    }

    if (!isset($_SESSION["EmployeeID"])) {
        header("location: ./login.php");
    }

    if (isset($_SESSION["EmployeeID"])) {
        if (isset($_GET["bougth"])) {
            if (!empty($_GET["bougth"])) {
                insertBook($_GET["bougth"]);
                header("location: ./bookOrder.php");
            }
        }
    } else {
        header("location: ./login.php");
    }

    ?>

    <!-- Content -->

    <!-- <div style="padding:20px"></div> -->
    <div class="min-h-screen bg-gray-600 mt-9 mb-9 pt-10 p-14">
        <form action="./bougth.php" id='bougth' method="get">
            <div style="width:30%; margin:auto;" class="text-white rounded-full">
                <div style="padding:20px; width:100%;" class="text-gray-1000 text-center text-4xl font-bold">
                    <u> ยืนยันการซื้อ </u>
                </div>

            </div>
            <br>


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" align="center" class="px-6 py-3 text-xl">
                                รหัสหนังสือ
                            </th>
                            <th scope="col" align="center" class="px-6 py-3 text-xl">
                                ชื่อหนังสือ
                            </th>
                            <th align=center scope="col" class="px-6 py-3 text-xl">
                                จำนวน
                            </th>
                            <th align=center scope="col" class="px-6 py-3 text-xl">
                                ราคาต่อหน่วย
                            </th>
                            <!-- <th align=center scope="col" class="px-6 py-3 text-xl">
                                ราคารวม
                            </th> -->
                            <th align=center scope="col" class="text-green-600 px-6 py-3 text-xl">
                                สามารถซื้อได้
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $allPrice = 0;
                        $allAmount = 0;
                        $allList = 0;
                        $result = $_GET["buy"];
                        $red = "";
                        foreach ($result as $key => $row) {
                            $canbuy = 0;

                            if ($row["amount"] != 0) {
                                if ($row["qty"] < $row["amount"]) {
                                    $allPrice += $row["price"] * $row["qty"];
                                    $red = "text-red-600 font-bold";
                                    $canbuy = $row["qty"];
                                } else {
                                    $allPrice += $row["price"] * $row["amount"];
                                    $canbuy = $row["amount"];
                                }

                                $allAmount += $row["amount"];
                                $allList++;
                                echo "
                                    <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                                        <th align=center scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xl'>
                                            " . $key . "
                                        </th>

                                        <td align=center class='px-6 py-4 text-xl'>
                                            " . $row["name"] . "
                                        </td>
                                        <td align=center class='$red px-6 py-4 text-xl'>
                                            " . $row["amount"] . "
                                        </td>
                                        <td align=center class='px-6 py-4 text-xl'>
                                            "
                                            . $row["price"] .
                                            "
                                        </td>
                                        <td align=center class='text-green-600 font-bold px-6 py-4 text-xl'>
                                            " . $canbuy . "
                                        </td>
                                    </tr>
                                    ";
                                    echo "
                                    <input type='hidden' name='bougth[" . $key . "][amount]' value='" . $canbuy . "'>
                                    <input type='hidden' name='bougth[" . $key . "][name]' value='" . $row["name"] . "'>
                                    <input type='hidden' name='bougth[" . $key . "][price]' value='" . $row["price"] . "'>
                                    <input type='hidden' name='bougth[" . $key . "][qty]' value='" . $row["qty"] . "'>
                                    
                                    ";
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                            <th align=center colspan="2" scope='row' class='px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white text-2xl '>
                                รวม <?php echo $allList; ?> รายการ
                            </th>
                            <th align=center class='px-6 py-4 text-2xl font-bold'>
                                <?php echo $allAmount ?> เล่ม
                            </th>
                            <th align=center class='px-6 py-4 text-2xl font-bold'>
                                <?php echo $allPrice; ?> บาท
                            </th>
                            <th align=center class='px-6 py-4 text-2xl font-bold'>
                                <button type='submit' id='bougth' style='cursor:pointer;' class='bg-green-500 hover:bg-green-600 text-white text-xl font-bold py-2 px-6 rounded-full'>
                                    <i class='fa-solid fa-bag-shopping'></i>  ยืนยัน
                                </button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </form>
        <div style="margin-top: 20px; text-align: center;">
            <button onclick="history.back()" class="bg-cyan-500 hover:bg-cyan-600 text-white text-xl font-bold py-3 px-6 rounded-full">
                <i class="fa-sharp fa-solid fa-circle-chevron-left"></i> กลับหน้าการซื้อ
            </button>
        </div>
    </div>

    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>