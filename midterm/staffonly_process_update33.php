<?php
$link = mysqli_connect("localhost", "admin", "admin", "sakila");
$filtered = array(
    'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
    'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
    'email' => mysqli_real_escape_string($link, $_POST['email']),
    'create_date' => mysqli_real_escape_string($link, $_POST['create_date']),
    'last_update' => mysqli_real_escape_string($link, $_POST['last_update']),
    'address_id' => mysqli_real_escape_string($link, $_POST['address_id'])
);

$query = "
    UPDATE customer
    SET
        first_name = '{$filtered['first_name']}', 
        last_name = '{$filtered['last_name']}', 
        email = '{$filtered['email']}', 
        create_date = '{$filtered['create_date']}', 
        last_update = '{$filtered['last_update']}',
        address_id = '{$filtered['address_id']}'
        WHERE
        customer_id = '{$_POST['id']}'
        ";

//print_r($query);
$result = mysqli_query($link, $query);
if($result == false) {
    echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
} else {
    echo '성공하였습니다. <a href="index.php"> 돌아가기</a>';
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SungShin's DVD</title>
    <style type="text/css">
    body {
        font-family: "Comic Sans MS";
        font-size: 17px;
        color: #5D5D5D;
    }
    </style>
</head>

<body bgcolor='#FFDD73'>
    <h1><a href="index.php">DVD PlayRoom </a>| STAFF ONLY</h1>
    <br>
    <div style="width=30%; height=350px; float:left">
        <img src="https://movie-phinf.pstatic.net/20190220_274/1550628725369fRjHr_JPEG/movie_image.jpg" width="480"
            border='10' align='left' hspace='20'>
    </div>

</body>

</html>