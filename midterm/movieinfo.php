<?php 

$link = mysqli_connect('localhost','admin','admin','sakila');

if(isset($_GET['film_id'])){

$query = "select title,description,release_year,rental_duration, rental_rate, replacement_cost, rating from film where film_id = {$_GET['film_id']} ";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
$movieinfo = array (
    'title' => $row['title'],
    'description' => $row['description'],
    'release_year' => $row['release_year'],
    'rental_duration' => $row['rental_duration'],
    'rental_rate' => $row['rental_rate'],
    'replacement_cost' => $row['replacement_cost'],
    'rating' => $row['rating']

);

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
    <h1><a href="index.php">DVD PlayRoom </a>| MOVIE'S SUMMARY</h1>
    <br>
    <div style="width=300px; margin:0 auto">
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2F20160414_264%2Fnana8846_1460594843338Rkjra_JPEG%2F%25BD%25BA%25C5%25A9%25B8%25B0%25BC%25A6%252881%2529.jpg&type=sc960_832" width="24%"
             align='left'>
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2F20160414_197%2Fnana8846_1460594837701fts9E_JPEG%2F%25BD%25BA%25C5%25A9%25B8%25B0%25BC%25A6%252875%2529.jpg&type=sc960_832" width="24%"
             align='left' >
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2F20160607_273%2Fnana8846_1465240876355S7DSd_JPEG%2F%25BD%25BA%25C5%25A9%25B8%25B0%25BC%25A6%2528109%2529.jpg&type=sc960_832" width="24%"
             align='left' >
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAxNzA5MTVfOTgg%2FMDAxNTA1NDM5Mzc5ODcx.ZmL5VUbWRVxcTRNkeeQrmY7teZx6xOY3s7hJqaIB9DMg.9Za1cUVdvQg60eJbwVKbMbUUWGfHyNf-Q4I9nOCs_00g.JPEG.americanexpress%2F5.jpg&type=sc960_832" width="27%"
             align='left' >
    </div>
    <br><br>

    <p style="font-size:40px; color:black; font-weight:bold; font-family:Fantasy; text-align:center"><?= $movieinfo['title'] ?></p>
    <p style="font-size:30px; color:black; font-weight:bold; font-family:Comic Sans MS; text-align:center"><?= $movieinfo['description'] ?></p>
    <p style="font-size:20px; color:black; font-weight:bold; font-family:Comic Sans MS; text-align:center">release_year: <?= $movieinfo['release_year'] ?></p>
    <p style="font-size:20px; color:black; font-weight:bold; font-family:Comic Sans MS; text-align:center">rental_duration: <?= $movieinfo['rental_duration'] ?></p>
    <p style="font-size:20px; color:black; font-weight:bold; font-family:Comic Sans MS; text-align:center">rental_rate: <?= $movieinfo['rental_rate'] ?></p>
    <p style="font-size:20px; color:black; font-weight:bold; font-family:Comic Sans MS; text-align:center">replacement_cost: <?= $movieinfo['replacement_cost'] ?></p>
    <p style="font-size:20px; color:black; font-weight:bold; font-family:Comic Sans MS; text-align:center">rating: <?= $movieinfo['rating'] ?></p>
</body>

</html>