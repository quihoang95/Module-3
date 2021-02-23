<?php
?>
    <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Calculator</h1>
<form action="/calculator" method="POST">
    @csrf
    <p>
        <input type="text" name="productDescription" placeholder="Description">
    </p>
    <p>
        <input type="number" name="price" placeholder="List Price">
    </p>
    <p>
        <input type="number" name="discountPercent" placeholder="Discount Percent">
    </p>
    <p>
        <button type="submit">Calculator</button>
    </p>
</form>
</body>
</html>
