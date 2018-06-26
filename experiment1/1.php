<html>
<head>
<meta charset="UTF-8" />
<title>根据输入参数值 展示查询结果</title>
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
    echo "<p>查无此人</p>";
}
else{
    $student = $res->fetch_all(MYSQLI_ASSOC);
    foreach($student as $key=>$value){
        $id = $value["id"];
        $name = $value["name"];
        $score = $value["score"];
        echo "<div><p>学号:$id</p><p>姓名:$name</p><p>成绩:$score</p></div>";
    }
}

$con->close();


?>


</body>
</html>