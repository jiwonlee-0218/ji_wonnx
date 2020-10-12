<!DOCTYPE hmtl>
<html>
<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>
<body>
    <h2><a href = "index.php">직원 관리 시스템</a>|직원's empno 조회</h2>
    <form action ="empno_search_process.php" method="POST">
    <label>first_name: </label>
    <input type="text" name="first_name" placeholder="first_name"><br>
    <label>last_name: </label>
    <input type="text" name="last_name" placeholder="last_name"><br>
    <input type ="submit" value="Confirm">

    </form>
</body>
</html>