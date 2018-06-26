<html>
<head>
<meta charset="UTF-8" />
<title>根据输入参数值 展示查询结果的条件表达式结果 并嵌入在两段随机内容之间</title>
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
    $length=rand(10,100);
    $s="";
    for ($i=1;$i<=$length;$i++)
      $s.=chr(ord('a')+rand(1,26)-1);
    $rs1 = $s.hash("md5",$s);

    $length=rand(10,100);
    $s="";
    for ($i=1;$i<=$length;$i++)
      $s.=chr(ord('a')+rand(1,26)-1);
    $rs2 = $s.hash("md5",$s);

    echo "<p>${rs1}查无此人${rs2}</p>";
}
else{
    $student = $res->fetch_all(MYSQLI_ASSOC);
    $score = $student[0]["score"];

    $length=rand(10,20);
    $s="";
    for ($i=1;$i<=$length;$i++)
      $s.=chr(ord('a')+rand(1,26)-1);
    $rs1 = $s.hash("md5",$s);

    $length=rand(10,20);
    $s="";
    for ($i=1;$i<=$length;$i++)
      $s.=chr(ord('a')+rand(1,26)-1);
    $rs2 = $s.hash("md5",$s);

    if($score>=60){
        echo "<p>${rs1}成绩合格${rs2}</p>";
    }
    else{
        echo "<p>${rs1}成绩不合格${rs2}</p>";
    }
}

$con->close();


?>


</body>
</html>