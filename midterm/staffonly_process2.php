<?php

$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

$filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'release_year' => mysqli_real_escape_string($link, $_POST['release_year']),
    'rental_duration' => mysqli_real_escape_string($link, $_POST['rental_duration']),
    'rental_rate' => mysqli_real_escape_string($link, $_POST['rental_rate'])
  );

$query = "insert into film
    (title, description, release_year,rental_duration,rental_rate,last_update,language_id)
    values (
      '{$filtered['title']}',
      '{$filtered['description']}',
      '{$filtered['release_year']}',
      '{$filtered['rental_duration']}',
      '{$filtered['rental_rate']}',
      now(),
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