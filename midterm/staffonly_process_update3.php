<?php

  $link = mysqli_connect('localhost','admin','admin','sakila');
 
  $escaped = array (
    'customer_id' => '',
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'create_date' => '',
    'last_update' => ''
 );


   $filtered_id = mysqli_real_escape_string($link,$_POST['customer_id']);

   settype($filtered_id,'integer');

   $query = "select customer_id, first_name, last_name, email, create_date, last_update, address_id
   from customer where customer_id = '{$filtered_id}'";

   $result = mysqli_query($link, $query);
   $row = mysqli_fetch_array($result);


   $escaped['customer_id'] = htmlspecialchars($row['customer_id']);
   $escaped['first_name'] = htmlspecialchars($row['first_name']);
   $escaped['last_name'] = htmlspecialchars($row['last_name']);
   $escaped['email'] = htmlspecialchars($row['email']);
   $escaped['create_date'] = htmlspecialchars($row['create_date']);
   $escaped['last_update'] = htmlspecialchars($row['last_update']);
   $escaped['address_id'] = htmlspecialchars($row['address_id']);

  
   $form_id = '<input type = "hidden" name = "id" value = "'.$_POST['customer_id'].'">';
   
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
    <form action="staffonly_process_update33.php" method="POST">
        <?= $form_id ?>
        <label>first_name: </label><br>
        <input type="text" name="first_name" placeholder="first_name" value="<?= $escaped['first_name'] ?>"><br>
        <label>last_name: </label>
        <input type="text" name="last_name" placeholder="last_name" value="<?= $escaped['last_name'] ?>"><br>
        <label>email: </label>
        <input type="email" name="email" placeholder="email" value="<?= $escaped['email'] ?>"><br>
        <label>create_date: </label>
        <input type="year" name="create_date" placeholder="create_date" value="<?= $escaped['create_date'] ?>"><br>
        <label>last_update: </label>
        <input type="year" name="last_update" placeholder="last_update" value="<?= $escaped['last_update'] ?>"><br>
        <label>address_id: </label>
        <input type="number" name="address_id" placeholder="address_id" value="<?= $escaped['address_id'] ?>"><br>
        <input type="submit" value="update">
    </form><br>


</body>

</html>