<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $query = "SELECT * FROM movie";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => 'This is the movie introduction page.'

  );

  if (isset($_GET['id'])) {
      $filtered_id=mysqli_real_escape_string($link, $_GET['id']);
      $query = "SELECT * FROM movie WHERE id={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
      'title' => $row['title'],
      'description' => $row['description']

    );
  }

 ?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MOVIE</title>
  </head>
  <body>
    <a href="index.php"><h1>MOVIE</h1><img src="다운로드.jpg" width ="600" height="250"></a></h1>
    <ol><?= $list ?></ol>
    <form action="process_update.php" method="POST">
     <input type="hidden" name="id" value="<?= $filtered_id?>">
     <p><input type="text" name="title" placeholder="title" value="<?= $article['title'] ?>"></p>
     <p><textarea name="description" placeholder="description"><?= $article['description'] ?></textarea></p>
     <p><input type="date" name=date></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
