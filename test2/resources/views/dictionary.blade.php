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
<form action="/dictionary" method="POST">
    @csrf
    <p>
        <input type="text" name="dictionary" placeholder="In put your word">
    </p>
    <p>
        <button type="submit">Translate</button>
    </p>
</form>
</body>
</html>
