<?php 

$link = mysqli_connect('localhost','admin','admin','sakila');
$filtered = array (
    'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
    'last_name' => mysqli_real_escape_string($link, $_POST['last_name'])
);

$query = "select first_name,last_name,title,film.film_id 
         from film left join film_actor on film.film_id = film_actor.film_id left join actor on film_actor.actor_id = actor.actor_id 
         where (first_name = '{$filtered['first_name']}') or (last_name = '{$filtered['last_name']}')";

//print_r($query);

$result = mysqli_query($link,$query);

//print_r($row);

$emp_info='';
while($row = mysqli_fetch_array($result)){

    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['first_name']. '</td>';
    $emp_info .= '<td>'.$row['last_name']. '</td>';
    $emp_info .= '<td><a href="movieinfo.php?film_id='.$row['film_id'].'">'.$row['title'].'</a></td>';
    $emp_info .= '<td>'.$row['film_id']. '</td>';
    $emp_info .= '</tr>';

 } 
    if ($emp_info == ''){
        echo '해당이름을 가진 배우가 출연한 영화가 존재하지 않습니다. 돌아가주세요. <a href="index.php">돌아가기</a>';
    } else {
        echo '영화이름을 확인한 후 돌아가주세요. <a href="index.php">돌아가기</a>';
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
    <h1><a href="index.php">DVD PlayRoom</a>| 영화 이름 검색</h1>
    <table border="1">
        <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>title</th>
            <th>film_id</th>
        </tr>
        <?= $emp_info ?>
    </table>
</body>

</html>