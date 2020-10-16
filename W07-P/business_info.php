<?php
    $link=mysqli_connect('localhost','admin','admin','employees');

    if(mysqli_connect_error()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    

    $filtered_name= array(
        'first_name' => mysqli_real_escape_string($link,$_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link,$_POST['last_name'])
    );

    $query = " select e.first_name, e.last_name, t.title, t.from_date, t.to_date from
               employees e inner join titles t
               on e.emp_no = t.emp_no
               where 
               e.first_name = '{$filtered_name['first_name']}' and
               e.last_name = '{$filtered_name['last_name']}' and
               t.to_date = '9999-01-01'
               " ;

    $result = mysqli_query($link,$query);

    $article='';

    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['title'];
        $article .= '</td><td>';
        $article .= $row['from_date'];
        $article .= '</td><td>';
        $article .= $row['to_date'];
        $article .= '</td></tr>';
    }

    if($article=='') {
        echo "이름을 다시 찾거나 last_name까지 알아와주세요.";
        echo '<a href="index.php">돌아가기</a>';
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>연봉 정보</title>
    <style>
    body {
        font-family: Consolas, monospace;
        font-family: 12px;

    }

    table {
        width: 100%;

    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #dadada;

    }
    </style>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 직원 정보</h2>
    <table>
        <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>title</th>
            <th>from_date</th>
            <th>to_date</th>
        </tr>
        <?= $article ?>
    </table>
</body>

</html>