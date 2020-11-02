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
    <h1><a href="index.php">DVD PlayRoom </a>| 영화 이름 검색</h1>
    <br>
    <div style="width=30%; height=350px; float:left">
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fshop1.phinf.naver.net%2F20200917_296%2F1600327722682COj9H_JPEG%2F190790_mainiamge0.jpg&type=sc960_832" width="380" border='10' align='left' hspace='20'>
    </div>
    <p style="font-size:25px; color:black; font-weight:bold">input actor's name to search</p>
    <form action="search_process.php" method="POST">
        <label>first_name: </label>
        <input type="text" name="first_name" placeholder="first_name"><br>
        <label>last_name: </label>
        <input type="text" name="last_name" placeholder="last_name"><br>
        <input type="submit" value="Search">
    </form>

</body>

</html>