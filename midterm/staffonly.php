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
<h1><a href="index.php">DVD PlayRoom </a>| STAFF ONLY</h1>
<br>
<div style="width=30%; height=350px; float:left">
<img src="https://movie-phinf.pstatic.net/20190220_274/1550628725369fRjHr_JPEG/movie_image.jpg"  width="480" border='10' align='left' hspace='20'>
</div>
<h3>INPUT OUR PASSWORD</h3>
<form action="staffonly_process.php" method="POST">
        <label>password: </label>
        <input type="password" name="password"><br>
        <input type="submit" value="Confirm">
    </form>
</body>

</html>