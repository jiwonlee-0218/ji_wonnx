<?php

  $link = mysqli_connect('localhost','admin','admin','sakila');
 
  $escaped = array (
    'film_id' => '',
    'title' => '',
    'description' => '',
    'release_year' => '',
    'language_id' => '',
    'rental_duration' => '',
    'rental_rate' => '',
    'replacement_cost' => '',
    'rating' => ''
 );


   $filtered_id = mysqli_real_escape_string($link,$_POST['film_id']);

   settype($filtered_id,'integer');

   $query = "select film_id, title, description, release_year, language_id, rental_duration, rental_rate, replacement_cost, rating  
   from film where film_id = '{$filtered_id}'";

   $result = mysqli_query($link, $query);
   $row = mysqli_fetch_array($result);


   $escaped['film_id'] = htmlspecialchars($row['film_id']);
   $escaped['title'] = htmlspecialchars($row['title']);
   $escaped['description'] = htmlspecialchars($row['description']);
   $escaped['release_year'] = htmlspecialchars($row['release_year']);
   $escaped['language_id'] = htmlspecialchars($row['language_id']);
   $escaped['rental_duration'] = htmlspecialchars($row['rental_duration']);
   $escaped['rental_rate'] = htmlspecialchars($row['rental_rate']);
   $escaped['replacement_cost'] = htmlspecialchars($row['replacement_cost']);
   $escaped['rating'] = htmlspecialchars($row['rating']);

  
   $form_id = '<input type = "hidden" name = "id" value = "'.$_POST['film_id'].'">';
   
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
    <form action="staffonly_process_update22.php" method="POST">
        <?= $form_id ?>
        <label>title: </label><br>
        <input type="text" name="title" placeholder="title" value="<?= $escaped['title'] ?>"><br>
        description:<br>
        <textarea name="description" placeholder="description" ><?= $escaped['description'] ?></textarea><br>
        <label>release_year: </label>
        <input type="number" name="release_year" placeholder="release_year" value="<?= $escaped['release_year'] ?>"><br>
        <label>language_id: </label>
        <input type="number" name="language_id" placeholder="language_id" value="<?= $escaped['language_id'] ?>"><br>
        <label>rental_duration: </label>
        <input type="number" name="rental_duration" placeholder="rental_duration" value="<?= $escaped['rental_duration'] ?>"><br>
        <label>rental_rate: </label>
        <input type="number" step="0.01" name="rental_rate" placeholder="rental_rate" value="<?= $escaped['rental_rate'] ?>"><br>
        <label>replacement_cost: </label>
        <input type="number" step="0.01" name="replacement_cost" placeholder="replacement_cost" value="<?= $escaped['replacement_cost'] ?>"><br>
        <label>rating: </label>
        <input type="text" name="rating" placeholder="rating" value="<?= $escaped['rating'] ?>"><br>
        <input type="submit" value="update">
    </form><br>
    <p style="font-size:15px; color:#47C83E; font-weight:bold; font-family:Jeju Gothic">G : 전체 관람가</p>
    <p style="font-size:15px; color:#41AF39; font-weight:bold; font-family:Jeju Gothic">PG : 보호자 동반</p>
    <p style="font-size:15px; color:#FFBB00; font-weight:bold; font-family:Jeju Gothic">PG-13 : 13세 미만 보호자 동반</p>
    <p style="font-size:15px; color:#FF5E00; font-weight:bold; font-family:Jeju Gothic">R : 17세 미만 보호자 동반</p>
    <p style="font-size:15px; color:red; font-weight:bold; font-family:Jeju Gothic">NC-17 : 미성년자 관람불가</p>


</body>

</html>