<?php
  $link = mysqli_connect('localhost','root','rootroot','dbp');
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
   $update_link = '';
   $delete_link = '';

  if( isset($_GET['id'])) {
   $query = "SELECT * FROM movie WHERE id={$_GET['id']}";
   $result = mysqli_query($link, $query);
   $row = mysqli_fetch_array($result);
   $article = array(
     'title' => $row['title'],
     'description' => $row['description']
   );



   $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
   $delete_link = '
     <form action="process_delete.php" method="POST">
       <input type="hidden" name="id" value="'.$_GET['id'].'">
       <input type="submit" value="delete">
     </form>
     ';


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
     <a href="create.php">create</a>
     <?= $update_link ?>
    <?= $delete_link ?>
     <h2><?= $article['title'] ?></h2>
     <?= $article['description'] ?>


   </body>
 </html>
