<?php

$link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');

$filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'profile' => mysqli_real_escape_string($link, $_POST['profile'])
  );

$query = "insert into author
    (name,profile)
    values (
      '{$filtered['name']}',
      '{$filtered['profile']}'
  )
  ";



$result = mysqli_multi_query($link, $query);
if ($result == false) {
    echo '저장하는 과정에서 문제가 발생했습니다';
    error_log(mysqli_error($link));
} else {
    header('Location: author.php');
}
