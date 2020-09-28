<?php

$link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');

$filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'author_id' => mysqli_real_escape_string($link, $_POST['author_id'])
  );

$query = "insert into movie

    (title, description, created,author_id)
    values (
      '{$filtered['title']}',
      '{$filtered['description']}',
      '{$_POST['date']}',
      '{$filtered['author_id']}'
  )
  ";



$result = mysqli_multi_query($link, $query);
if ($result == false) {
    echo '저장하는 과정에서 문제가 발생했습니다';
    error_log(mysqli_error($link));
} else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
