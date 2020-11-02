<?php 

$link = mysqli_connect('localhost','admin','admin','sakila');
$query = "select film_id,title,release_year,rental_duration,rental_rate from film order by rental_rate desc limit 20;";
$result = mysqli_query($link,$query);
$movie_info='';

while($row=mysqli_fetch_array($result)){
    $movie_info .= '<tr>';
    $movie_info .= '<td>'.$row['film_id'].'</td>';
    $movie_info .= '<td><a href="movieinfo.php?film_id='.$row['film_id'].'">'.$row['title'].'</a></td>';
    $movie_info .= '<td>'.$row['release_year']. '</td>';
    $movie_info .= '<td>'.$row['rental_duration']. '</td>';
    $movie_info .= '<td>'.$row['rental_rate']. '</td>';
    $movie_info .= '</tr>';

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

    table {
        width: 100%;
        border-top: 1px solid #444444;
        border-collapse: collapse;
    }

    th {
        background-color:#FAED7D;
    }

    td {
        background-color: #FAF4C0;
    }
    </style>
</head>

<body bgcolor='#FFDD73'>
    <h1><a href="index.php">DVD PlayRoom</a>| 인기 순위 top 20 </h1>
    <table border="1">
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>release_year</th>
            <th>rental_duration</th>
            <th>rental_rate</th>
        </tr>
        <?= $movie_info ?>
    </table>
</body>

</html>