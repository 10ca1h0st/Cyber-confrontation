<html>
<head>
<meta charset="UTF-8" />
<title>根据输入参数值 更新数据库</title>
</head>

<body>

<form action="" method="GET">
<p>输入学号:<input type=text name="id" /></p>
<p>输入成绩:<input type=text name="score" /></p>
<p><input type=submit name="submit" value="submit" /></p>
</form>

<?php

if(!(isset($_GET["id"]) && isset($_GET["score"]))){
    exit;
}

require_once("functions.php");

$con = connectDB("localhost","root","123456","test");
$id = $_GET["id"];
$score = $_GET["score"];
$update_sql = "update student set score=$score where id=$id";
$res = $con->query($update_sql);

$con->close();


?>


</body>
</html>