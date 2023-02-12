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
                        <th width="100px" scope="col" class="px-6 py-3">
                            Order_id
                        </th>
                        <th width="100px" scope="col" class="px-6 py-3">
                            EmployeeID
                        </th>
                        <th width="200px" scope="col" class="px-6 py-3">
                            Order_date
                        </th>
                        <th width="100px" scope="col" class="px-6 py-3">
                            Order_Price
                        </th>
                        <th width="400px" scope="col" class="px-6 py-3">
                            Overview
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = getOrderByEmp($_SESSION["EmployeeID"]);
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr align='center' class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                                <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                    " . $row["Order_id"] . "
                                </th>
                                <td class='px-6 py-4'>
                                    " . $row["EmployeeID"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Order_date"] . "
                                </td>
                                <td class='px-6 py-4'>
                                    " . $row["Order_Price"] . "
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
            </table>

        </div>


    </div>

    <!-- footer -->
    <?php
    include("./include/foot.php")
    ?>
</body>

</html>