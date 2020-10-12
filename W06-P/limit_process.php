<?php 

 $link = mysqli_connect('localhost','admin','admin','employees');
 $number = mysqli_real_escape_string($link,$_POST['num']);

 if($number == '1'){
    $query = "select * from employees order by emp_no  limit 100 ";}
 else if($number == '101'){
    $query = "select * from employees where emp_no >= 10101  limit 100 ";}
 else if($number == '201'){
    $query = "select * from employees where emp_no >= 10201  limit 100 ";}
 else if($number == '301'){
    $query = "select * from employees where emp_no >= 10301  limit 100 ";}
 else {
    $query = "select * from employees where emp_no >= 10401  limit 100 ";}

 $result = mysqli_query($link,$query);
 //print_r($result);

 
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
 ?>







<!DOCTYPE hmtl>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>

<body>
    <h2><a href = "index.php">직원 관리 시스템</a>|직원 정보 조회</h2>
    <a href="limit.php">이전으로 돌아가기</a>
    <table border ="1">
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