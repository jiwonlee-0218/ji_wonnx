<?php
$link = mysqli_connect("localhost", "admin", "admin", "sakila");
$filtered = array(
    'film_id' => mysqli_real_escape_string($link, $_POST['id']),
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'release_year' => mysqli_real_escape_string($link, $_POST['release_year']),
    'language_id' => mysqli_real_escape_string($link, $_POST['language_id']),
    'rental_duration' => mysqli_real_escape_string($link, $_POST['rental_duration']),
    'rental_rate' => mysqli_real_escape_string($link, $_POST['rental_rate']),
    'replacement_cost' => mysqli_real_escape_string($link, $_POST['replacement_cost']),
    'rating' => mysqli_real_escape_string($link, $_POST['rating'])
);

$query = "
    UPDATE film 
    SET
        title = '{$filtered['title']}', 
        description = '{$filtered['description']}', 
        release_year = '{$filtered['release_year']}', 
        language_id = '{$filtered['language_id']}', 
        rental_duration = '{$filtered['rental_duration']}',
        rental_rate = '{$filtered['rental_rate']}',
        replacement_cost = '{$filtered['replacement_cost']}',
        rating = '{$filtered['rating']}'
        WHERE
        film_id = '{$filtered['film_id']}'
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