<?php 



?>






<!DOCTYPE html>
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
    </style>
</head>

<body bgcolor='#FFDD73'>
    <h1><a href="index.php">DVD PlayRoom</a>| 대여 가능한 영화</h1>
    <br>
    <div style="width=30%; height=350px; float:left">
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fpost.phinf.naver.net%2FMjAxODA1MTZfMjQx%2FMDAxNTI2NDYwODc3NDA3.K9YME4jwzml2GxE__5KQKJpdj_FkM-DMR1o-4YkKzKcg.BpT-h_314VEMWpLUvxS5DWIKSQSNU_zRPW-87zJHw0Mg.JPEG%2FIlYPezC_d2gJMPAmlZXaDCHozRtE.jpg&type=sc960_832" width="380" border='10' align='left' hspace='20'>
    </div>
    <form action="borrow_process.php" method="POST">
        <label>movie's film_id: </label>
        <input type="text" name="film_id" placeholder="film_id"><br>
        <input type="submit" value="Search">
    </form>

</body>

</html>