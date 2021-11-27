<?php
include_once '../lib/session.php';
Session::checkSession();
include '../classes/order.php';

$order = new order();
$processingOrderList = $order->getProcessingOrder();
$processedOrderList = $order->getProcessedOrder();
$deliveringOrderList = $order->getDeliveringOrder();
$completeOrderList = $order->getCompleteOrder();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Quản lý đơn đặt hàng</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="productlist.php">Quản lý Sản phẩm</a></li>
            <li><a href="orderlist.php" id="order" class="active">Quản lý Đơn hàng</a></li>
        </ul>
    </nav>
    <div class="title">
        <h1>Danh sách đơn đặt hàng</h1>
    </div>
    <div class="container">
        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Processing')">Đang xử lý</button>
            <button class="tablinks" onclick="openTab(event, 'Processed')">Đã xử lý</button>
            <button class="tablinks" onclick="openTab(event, 'Delivering')">Đang giao hàng</button>
            <button class="tablinks" onclick="openTab(event, 'Complete')">Đã hoàn thành</button>
        </div>

        <!-- Tab content -->
        <div id="Processing" class="tabcontent">
            <?php
            if ($processingOrderList) { ?>
                <table class="list">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php $count = 1;
                    foreach ($processingOrderList as $key => $value) { ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td>
                                <a href="orderlistdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            <?php } else { ?>
                <h3>Chưa có đơn hàng nào đang xử lý</h3>
            <?php }
            ?>
        </div>

        <div id="Processed" class="tabcontent">
            <?php
            if ($processedOrderList) { ?>
                <table class="list">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php $count = 1;
                    foreach ($processedOrderList as $key => $value) { ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td>
                                <a href="delivering_order.php?orderId=<?= $value['id'] ?>">Giao hàng</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            <?php } else { ?>
                <h3>Chưa có đơn hàng nào đã xử lý</h3>
            <?php }
            ?>
        </div>

        <div id="Delivering" class="tabcontent">
            <?php
            if ($deliveringOrderList) { ?>
                <table class="list">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php $count = 1;
                    foreach ($deliveringOrderList as $key => $value) { ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td>
                                <a href="orderlistdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            <?php } else { ?>
                <h3>Chưa có đơn hàng nào đang giao</h3>
            <?php }
            ?>
        </div>

        <div id="Complete" class="tabcontent">
            <?php
            if ($completeOrderList) { ?>
                <table class="list">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php $count = 1;
                    foreach ($completeOrderList as $key => $value) { ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['createdDate'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td>
                                <a href="orderlistdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </table>
            <?php } else { ?>
                <h3>Chưa có đơn hàng nào đã hoàn thành</h3>
            <?php }
            ?>
        </div>
    </div>
    </div>
    <footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Product</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
        </ul>
        <p class="copyright">Khuong Nguyen @ 2021</p>
    </footer>
</body>
<script type="text/javascript">
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 1; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

</html>