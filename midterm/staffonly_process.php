<?php 


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
    <h3>ADD NEW MOVIE</h3>
    <form action="staffonly_process2.php" method="POST">
        <label>title: </label>
        <input type="text" name="title" placeholder="title"><br>
        description:<br>
        <textarea name="description" placeholder="description"></textarea><br>
        <label>release_year: </label>
        <input type="number" name="release_year" placeholder="release_year"><br>
        <label>rental_duration: </label>
        <input type="number" name="rental_duration" placeholder="rental_duration"><br>
        <label>rental_rate: </label>
        <input type="number" step="0.01" name="rental_rate" placeholder="rental_rate"><br>
        <input type="submit" value="Confirm">
    </form>
    <h3>ADD NEW CUSTOMER</h3>
    <form action="staffonly_process3.php" method="POST">
        <label>first_name: </label>
        <input type="text" name="first_name" placeholder="first_name"><br>
        <label>last_name: </label>
        <input type="text" name="last_name" placeholder="last_name"><br>
        <label>e-mail: </label>
        <input type="email" name="email" placeholder="email"><br>
        <label>create_date: </label>
        <input type="date" name="create_date"><br>
        <input type="submit" value="Confirm">
    </form>
    <h3>UPDATE MOVIE</h3>
    <form action="staffonly_process_update2.php" method="POST">
        <input type="number" name="film_id" placeholder="film_id"><br>
        <input type="submit" value="Confirm">
    </form>
    <h3>UPDATE CUSTOMER</h3>
    <form action="staffonly_process_update3.php" method="POST">
        <input type="number" name="customer_id" placeholder="customer_id"><br>
        <input type="submit" value="Confirm">
    </form>
</body>

</html>