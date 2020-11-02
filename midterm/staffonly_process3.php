<?php

$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

$filtered = array(
    'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
    'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
    'email' => mysqli_real_escape_string($link, $_POST['email']),
    'create_date' => mysqli_real_escape_string($link, $_POST['create_date'])
  );

$query = "insert into customer
    (first_name, last_name, email, create_date, last_update, address_id, store_id)
    values (
      '{$filtered['first_name']}',
      '{$filtered['last_name']}',
      '{$filtered['email']}',
      '{$filtered['create_date']}',
      now(),
      1,
      1
  )
  ";



$result = mysqli_multi_query($link, $query);

if ($result == false) {
    echo '저장하는 과정에서 문제가 발생했습니다. <a href="index.php">돌아가기</a>';
    error_log(mysqli_error($link));
} else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}


?>


<!DOCTYPE hmtl>
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

</body>

</html>