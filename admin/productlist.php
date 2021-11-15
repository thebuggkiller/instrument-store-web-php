<?php
include '../lib/session.php';
include '../classes/product.php';
Session::checkSessionAdmin();
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code...
} else {
    header("Location:../index.php");
}
$product = new product();
$list = $product->getAll();
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
    <title>Admin</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="productlist.php" class="active">Quản lý Sản phẩm</a></li>
            <li><a href="orderlist.php" id="order">Quản lý Đơn hàng</a></li>
        </ul>
    </nav>
    <div class="title">
        <h1>Danh sách sản phẩm</h1>
    </div>
    <div class="action">
        <a href="add_product.php">Thêm mới</a>
    </div>
    <div class="container">
        <?php $count = 1;
        if ($list) { ?>
            <table class="list">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá gốc</th>
                    <th>Giá khuyến mãi</th>
                    <th>Ngày tạo</th>
                    <th>Tạo bởi</th>
                    <th>Số lượng</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <tr>
                    <?php foreach ($list as $key => $value) { ?>
                        <td><?= $count++ ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['cateName'] ?></td>
                        <td><img class="image-cart" src="uploads/<?= $value['image'] ?>" alt=""></td>
                        <td><?= $value['originalPrice'] ?></td>
                        <td><?= $value['promotionPrice'] ?></td>
                        <td><?= $value['createdDate'] ?></td>
                        <td><?= $value['fullName'] ?></td>
                        <td><?= $value['qty'] ?></td>
                        <td><?= $value['des'] ?></td>
                        <td><?= ($value['status']) ? "Active" : "Block" ?></td>
                        <td>
                            <a href="edit_product.php?id=<?= $value['id'] ?>">Sửa</a>
                            <a href="#">Xóa</a>
                        </td>

                    <?php } ?>
                </tr>
            </table>
        <?php } else { ?>
            <h3>Chưa có sản phẩm nào...</h3>
        <?php } ?>
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

</html>