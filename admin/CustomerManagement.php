
<?php
define("APPURL", "http://localhost:8080/ShopCoffee");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Khách Hàng</title>
    <link rel="stylesheet" href="styles/customerManagement.css">
</head>
<body>

<h1>Quản lý Khách Hàng</h1>

<button onclick="exportToExcel()">Xuất Excel</button>

<table id="customerTable">
    <thead>
        <tr>
            <th>Số Thứ Tự</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<div id="addRecord">
    <h2>Thêm Bản Ghi</h2>
    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" required>
    <label for="dob">Ngày Sinh:</label>
    <input type="date" id="dob" name="dob" required>
    <label for="phone">Số Điện Thoại:</label>
    <input type="tel" id="phone" name="phone" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button onclick="addRecord()">Thêm Bản Ghi</button>
</div>

<script src="<?php echo APPURL; ?>/js/customerManagement.js"></script>

</body>
</html>
