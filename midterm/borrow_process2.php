<?php 

$link = mysqli_connect('localhost','admin','admin','sakila');
$filtered = array (
    'film_id' => mysqli_real_escape_string($link, $_GET['film_id'])
);

$query = "select rental.inventory_id,film_id, max(return_date) return_date, store_id from inventory
         left join rental on (inventory.inventory_id = rental.inventory_id)
         group by rental.inventory_id having film_id = '{$filtered['film_id']}' and not inventory_id is null and inventory.store_id = 1";

//print_r($query);
$result = mysqli_query($link,$query);


$rental_info='';
while($row = mysqli_fetch_array($result)){

    $rental_info .= '<tr>';
    $rental_info .= '<td>'.$row['inventory_id']. '</td>';
    $rental_info .= '<td>'.$row['film_id']. '</td>';
    $rental_info .= '<td>'.$row['return_date']. '</td>';
    $rental_info .= '</tr>';

 } 
    if ($rental_info == ''){
        echo '시스템상 오류가 발생했습니다. 돌아가주세요. <a href="index.php">돌아가기</a>';
    } else {
        echo '확인 가능한 대여 목록을 확인하여주세요. <a href="index.php">돌아가기</a>';
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
        text-align: center;
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
    <h1><a href="index.php">DVD PlayRoom</a>| 대여 가능한 영화</h1>
    <table border="1">
        <tr>
            <th>inventory_id</th>
            <th>film_id</th>
            <th>return_date</th>
        </tr>
        <?= $rental_info ?>
    </table>
</body>

</html>