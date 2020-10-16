<?php 

$link = mysqli_connect('localhost','admin','admin','employees');
$filtered = array (
    'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
    'last_name' => mysqli_real_escape_string($link, $_POST['last_name'])
);

$query = "select * from employees where (first_name = '{$filtered['first_name']}')
or (last_name = '{$filtered['last_name']}')";

//print_r($query);

$result = mysqli_query($link,$query);

//print_r($row);
$emp_info='';
while($row = mysqli_fetch_array($result)){

    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['emp_no']. '</td>';
    $emp_info .= '<td>'.$row['birth_date']. '</td>';
    $emp_info .= '<td>'.$row['first_name']. '</td>';
    $emp_info .= '<td>'.$row['last_name']. '</td>';
    $emp_info .= '<td>'.$row['gender']. '</td>';
    $emp_info .= '<td>'.$row['hire_date']. '</td>';
    $emp_info .= '<td><a href = "emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
    $emp_info .= '<td><a href = "emp_delete.php?emp_no='.$row['emp_no'].'">delete</a></td>';
    $emp_info .= '</tr>';

 } 
    if ($emp_info == ''){
        echo '해당이름의 직원이 존재하지 않습니다. 돌아가주세요. <a href="index.php">돌아가기</a>';
    } else {
        echo '직원번호를 확인한 후 돌아가주세요. <a href="index.php">돌아가기</a>';
    }
    
    



?>


<!DOCTYPE hmtl>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템</a>|직원 정보 확인</h2>
    <table border="1">
        <tr>
            <th>emp_no</th>
            <th>birth_date</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hire_date</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?= $emp_info ?>
    </table>
</body>

</html>