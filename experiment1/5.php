<html>
<head>
<meta charset="UTF-8" />
<title>根据输入参数值 展示不同的固定输入</title>
</head>

<body>

<form action="" method="GET">
<p>输入学号:<input type=text name="id" /></p>
<p><input type=submit name="submit" value="submit" /></p>
</form>

<?php

if(!isset($_GET['id'])){
    exit;
}

require_once("functions.php");

$con = connectDB("localhost","root","123456","test");
$id = $_GET["id"];
$select_sql = "select id,name,score from student where id=$id limit 1";
$res = $con->query($select_sql);
if($res->num_rows <= 0){
    echo "<p>(:(:(:(:</p>";
}
else{
    echo "<p>:):):):)</p>";
}

$con->close();


?>


</body>
</html>