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
        <form action="./book.php" method="get">
            <div style="width:30%; margin:auto;" class="text-white rounded-full">
                <div style="padding:20px; width:100%;" class="text-gray-1000 text-center text-4xl font-bold">
                    <u> รายละเอียดการซื้อ</u>
                </div>

            </div>
            <br>


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Orid
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order_id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product_id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product_name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ord_Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ord_pperunit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ord_qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ord_update
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $Order_id = $_GET["Order_id"];
                        $EmployeeID = $_GET["EmployeeID"];


                        $result = getOrderDetail($Order_id, $EmployeeID);
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                                <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                    " . $row["Orid"] . "
                                </th>
                                <td class='px-6 py-4'>
                                    " . $row["Order_id"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Product_id"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Product_name"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Ord_Price"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Ord_pperunit"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Ord_qty"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Ord_update"] . "
                                </td>
                            </tr>
                
                            ";
                        }
                        ?>
                    </tbody>
                </table>


            </div>


        </form>
        <div style="margin-top: 20px; text-align: center;" >
            <button onclick="history.back()" class="bg-cyan-500 hover:bg-cyan-600 text-white text-xl font-bold py-3 px-6 rounded-full">
                <i class="fa-sharp fa-solid fa-circle-chevron-left"></i> กลับหน้ารายละเอียดการซื้อ
            </button>
        </div>
    </div>

    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>