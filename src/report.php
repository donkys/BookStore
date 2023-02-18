<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include("./include/head.php");
    ?>
    <title>Report Order: <?php echo $_GET["Order_id"]; ?></title>
</head>

<body style="font-family: 'Sarabun'; font-weight: 500;">
    <?php

    if (!isset($_SESSION["EmployeeID"]) || !isset($_SESSION["emp_admin"])) {
        header("location: ./login.php");
    }

    if (($_SESSION["EmployeeID"] != $_GET["EmployeeID"]) && $_SESSION["emp_admin"] != 1) {
        header("location: ./index.php");
        alert("ไม่มีสิทธิเข้าดู");
    }

    $Order_id = $_GET["Order_id"];
    $EmployeeID = $_GET["EmployeeID"];

    ?>

    <div style="border: 1px solid black; padding: 30px 30px; margin: 5px auto 10px; width: 210mm; height: 304mm;">
        <div class="font-sans font-bold" style="font-size:35px; display:inline-block; position: relative; bottom: 15px;"><i class="fa-solid fa-bookmark fa-sm"></i> BOOKSTORE.</div>
        <?php
        $result = getOrderEmpBYID($Order_id);
        $row = $result->fetch_assoc();

        $datebuy = $row["Order_date"];
        $d = explode(" ", $datebuy);
        $db = date("Y-m-d", strtotime(str_replace('-', '/', $d[0])));


        $time = $d[1];
        $date = explode("-", $db);

        ?>
        <div style="padding-left: 70%;">
            <b style="font-size: 18px;">วันที่ซื้อหนังสือ</b><br>
            <b>วันที่ </b><?php echo $date[2] . " " . $month[(int)$date[1]] . " พ.ศ." . $date[0] + 543; ?> <br>
            <b>เวลา </b><?php echo $time; ?> น.<br>
        </div>
        <div>
            <table>
                <label><b style="font-size: 19px;">ผู้ซื้อหนังสือ</b><br></label>
                <tr>
                    <td><b>ชื่อ:</b> <?php echo $row["emp_name"] . " " . $row["emp_lname"]; ?></td>
                    <td style="padding-left:10px"><b>รหัส:</b> <?php echo $row["EmployeeID"]; ?> </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><b>อีเมล:</b> <?php echo $row["emp_email"]; ?></td>
                    <td style="padding-left:10px"><b>เบอร์โทร:</b> <?php echo $row["emp_tel"]; ?></td>
                </tr>
            </table>
            <b>ที่อยู่:</b> <?php echo $row["emp_addr"]; ?><br>
            <b>รหัสการสั่งซื้อ:</b> <?php echo $row["Order_id"]; ?><br>
        </div>
        <br>
        <div>
            <table cellpadding="10" style="border: 2px;" class="w-full border text-sm text-left text-gray-500 dark:text-gray-400">
                <b><label style="font-size: 17px;">รายการซื้อหนังสือ</label></b>
                <thead class="border-b text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr align="center">
                        <th scope="col" class="border">รายการที่</th>
                        <th scope="col" class="border">รหัสหนังสือ</th>
                        <th scope="col" class="border">ชื่อหนังสือ</th>
                        <th scope="col" class="border">ราคาต่อหน่วย (บาท)</th>
                        <th scope="col" class="border">จำนวน (เล่ม)</th>
                        <th scope="col" class="border">ราคารวม (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $allPrice = 0;
                    $allAmount = 0;
                    $allList = 0;
                    $result = getOrderDetail($Order_id, $EmployeeID);
                    while ($r = $result->fetch_assoc()) {
                        $allPrice += $r["Ord_price"];
                        $allAmount += $r["Ord_qty"];
                        $allList++;
                        echo "
                        <tr align='center' class='border-b border-gray-200 dark:border-gray-700'>
                            <td class='border'>
                                " . $r["Orid"] . "
                            </td>
                            <td class='border'>
                                " . $r["Product_id"] . "
                            </td>
                            <td class='border'>
                                " . $r["Product_name"] . "
                            </td>
                            <td class='border'>
                                " . $r["Ord_pperunit"] . "
                            </td>
                            <td class='border'>
                                " . $r["Ord_qty"] . "
                            </td>
                            <td class='border'>
                                " . $r["Ord_price"] . "
                            </td>
                        </tr>
                        ";
                    }


                    ?>

                </tbody>
                <tfoot class="border-b text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr align="center">
                        <th scope="col" class="border-l border-b"></th>
                        <th scope="col" class="border-b"></th>
                        <th scope="col" colspan="2" class="border-b">รวม <?php echo $allList; ?> รายการ</th>
                        <th scope="col" class="border"><?php echo $allAmount; ?> เล่ม</th>
                        <th scope="col" class="border"><?php echo floatTwo($allPrice); ?> บาท</th>
                    </tr>
                </tfoot>
            </table>
            <br>
            <span style="margin-top: 50px"><b style="font-size: 18px;">รวมรายการ</b></span>
            <div style="width: '210mm'; border: 1px solid;">
                <div style="padding: 10px">
                    <table>
                        <tr>
                            <td width="200px"><b>รายการหนังสือ </b></td>
                            <td><?php echo $allList; ?> รายการ<br></td>
                        </tr>
                        <tr>
                            <td><b>จำนวนเล่ม </b></td>
                            <td><?php echo $allAmount; ?> เล่ม<br></td>
                        </tr>
                        <tr>
                            <td><b>รวมเงิน </b></td>
                            <td><?php echo floatTwo($allPrice); ?> บาท<br></td>
                        </tr>
                        <tr>
                            <td><b>ภาษีมูลค่าเพิ่ม 7%</b></td>
                            <td><?php echo floatTwo($allPrice * 0.07); ?> บาท<br></td>
                        </tr>
                        <tr>
                            <td><b>จำนวนเงินทั้งสิ้น </b></td>
                            <td><?php echo floatTwo($allPrice * 1.07); ?> บาท<br></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <table width="100%">
            <tr>
                <td valign="top" style="width:50%" align="center">
                    <div style="font-size: 22px;"> <?php echo $row["emp_name"] . " " . $row["emp_lname"]; ?></div>
                    <hr style="padding-bottom:10px;" width=80%>
                    <b>ผู้ซื้อหนังสือ</b>
                </td>
                <td valign="top" style="width:50%; padding-left: 10%;">
                    <?php
                    $info = getInfo();

                    $datebuy = date("Y-m-d H:i:s");
                    $d = explode(" ", $datebuy);
                    $db = date("Y-m-d", strtotime(str_replace('-', '/', $d[0])));


                    $time = $d[1];
                    $date = explode("-", $db);


                    ?>
                    <div>
                        <div style="font-size: 18px;"> ผู้พิมพ์นะฮัฟ: <?php echo $info["emp_name"] . " " . $info["emp_lname"]; ?></div>
                        <b>เบอร์โทร: </b><?php echo $info["emp_tel"]; ?><br>
                        <b>อีเมล: </b><?php echo $info["emp_email"]; ?><br>
                        <b>วันที่ </b><?php print(($date[2]) . ' ' . ($month[(int)$date[1]]) . ' พ.ศ.' . ($date[0] + 543)); ?> <br>
                        <b>เวลา </b><?php echo $time; ?> น.<br>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin: 5px 0px 20px; text-align: center;">
        <button onclick="history.back()" class="bg-cyan-500 hover:bg-cyan-600 text-white text-xl font-bold py-3 px-6 rounded-full">
            <i class="fa-sharp fa-solid fa-circle-chevron-left"></i> กลับหน้าก่อนหน้า
        </button>
        <button style="margin-left: 10px;" onclick="location.href = './index.php'" class="bg-rose-500 hover:bg-rose-600 text-white text-xl font-bold py-3 px-6 rounded-full">
            <i class="fa-solid fa-house"> </i> กลับหน้าหลัก
        </button>
    </div>

</body>

</html>