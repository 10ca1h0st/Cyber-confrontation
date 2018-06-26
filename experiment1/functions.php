<?php

//连接数据库
function connectDB($host,$username,$password,$database){
    $con = new mysqli($host,$username,$password,$database);
    if($con->connect_errno){
        return false;
    }
    return $con;
}

?>