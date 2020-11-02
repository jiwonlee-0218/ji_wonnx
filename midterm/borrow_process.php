<?php 

$link = mysqli_connect('localhost','admin','admin','sakila');
$filtered = array (
    'film_id' => mysqli_real_escape_string($link, $_POST['film_id'])
);

$query = "select count(*),film_id from inventory
         where film_id = '{$filtered['film_id']}' and store_id =1 ";

//print_r($query);

$result = mysqli_query($link,$query);

//print_r($row);

$emp_info='';
while($row = mysqli_fetch_array($result)){

    $emp_info .= '<tr>';
    $emp_info .= '<td><a href="borrow_process2.php?film_id='.$row['film_id'].'">'.$row['count(*)'].'</a></td>';
    $emp_info .= '<td>'.$row['film_id']. '</td>';
    $emp_info .= '</tr>';

 } 
    if ($emp_info == ''){
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
            <th>count</th>
            <th>film_id</th>
        </tr>
        <?= $emp_info ?>
    </table>
</body>

</html>