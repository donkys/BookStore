<nav class="fixed top-0 left-0 bg-white w-full shadow z-40">
    <div class="container m-auto flex justify-between items-center text-gray-500">
        <h1 class="pl-8 py-4 text-2xl font-bold text-gray-700">
            <a href="./">
                <i class="fa-solid fa-bookmark fa-sm"></i> BOOKSTORE.
            </a>
        </h1>
        <ul class="hidden md:flex items-center pr-8 text-base font-semibold cursor-pointer">
            <a href="./">
                <li class="hover:text-black text-xl py-4 px-6"> หน้าหลัก </li>
            </a>

            <a href="./book.php">
                <li class="hover:text-black text-xl py-4 px-6"> หนังสือทั้งหมด </li>
            </a>

            <a href="./bookOrder.php">
                <li class="hover:text-black text-xl py-4 px-6"> รายละเอียดการซื้อ </li>
            </a>

            <?php
            if (isset($_SESSION["EmployeeID"]) && isset($_SESSION["emp_name"])) {
                $name = $_SESSION["emp_name"];
                echo "<a href='./editInfo.php'>";
                echo "  <li class='text-superred text-2xl py-2 px-6 font-bold'> คุณ $name </li>";
                echo "</a>";
                echo '                
                        <a href="./logout.php">
                            <button id="h" class="bg-superred hover:bg-redred text-white text-xl font-bold py-2 px-6 rounded-full">
                                <i class="fa-solid fa-right-from-bracket"> </i> ออกจากระบบ 
                            </button>
                        </a>';
                if (isset($_GET["all"])) {
                    if ($_GET["all"] == 1) {
                        echo "
                    
                            <form action='./book.php' method='get' id='BUYBOOK'>
                            <a>
                                <button type='submit' id='BUYBOOK' style='margin-left: 10px; cursor:pointer;' class='bg-green-500 hover:bg-green-600 text-white text-xl font-bold py-2 px-6 rounded-full'>
                                    <i class='fa-solid fa-bag-shopping'></i>  ซื้อหนังสือ
                                </button>
                            </a>    
                                ";
                    } 
                    // else if ($_GET["all"] == 2) {
                    //     echo "
                    
                    //     <form action='./addStock.php' method='get' id='addBOOK'>
                    //     <a>
                    //         <button type='submit' id='addBOOK' style='margin-left: 10px; cursor:pointer;' class='bg-green-500 hover:bg-green-600 text-white text-xl font-bold py-2 px-6 rounded-full'>
                    //             <i class='fa-solid fa-boxes-stacked'></i> แก้จำนวน
                    //         </button>
                    //     </a>    
                    //         ";
                    // }
                }
            } else echo '                
                <a href="./login.php">
                    <button class="bg-superred hover:bg-redred text-white text-xl font-bold py-2 px-6 rounded-full">
                        เข้าสู่ระบบ <i class="fa-solid fa-right-to-bracket"> </i>
                    </button>
                </a>';
            ?>


        </ul>
        <button class="block md:hidden py-3 px-4 mx-2 rounded focus:outline-none hover:bg-gray-200 group">
            <div class="w-5 h-1 bg-gray-600 rounded mb-1"></div>
            <div class="w-5 h-1 bg-gray-600 rounded mb-1"></div>
            <div class="w-5 h-1 bg-gray-600 rounded"></div>
            <div class="absolute top-0 -right-full h-screen w-8/12 bg-white border opacity-0 
                group-focus:right-0 group-focus:opacity-100 transition-all duration-300">
                <ul class="flex flex-col items-center w-full text-base cursor-pointer pt-10">
                    <li class="hover:bg-gray-200 py-4 px-6 w-full"> หน้าหลัก </li>
                    <li class="hover:bg-gray-200 py-4 px-6 w-full"> หนังสือทั้งหมด </li>
                    <a href="http://porapipat.me">
                        <li class="hover:bg-gray-200 py-4 px-6 w-full"> รายละเอียดการซื้อ </li>
                    </a>
                    <?php
                    if (!isset($_SESSION["EmployeeID"]) && !isset($_SESSION["emp_name"])) {
                        echo '
                            <li class="hover:bg-gray-200 py-4 px-6 w-full">
                                เข้าสู่ระบบ
                            </li>
                            ';
                    }

                    ?>
                </ul>
            </div>
        </button>
    </div>
</nav>