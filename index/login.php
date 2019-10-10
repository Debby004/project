<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/10
 * Time: 16:04
 */
header("Content-type:text/html;chatset:utf-8;");
$username = $_POST['username'];
$password = $_POST['password'];
if(empty($username)){
    echo "<script>alert('用户名不能为空');history.go(-1);</script>";
    exit(0);
}elseif(empty($password)){
    echo "<script>alert('密码不能为空！');history.go(-1);</script>";
    exit(0);
}else{
    $sql_connect = new mysqli("localhost","root","root","project");
    if($sql_connect->connect_error){
        echo "数据库连接失败！";
        exit(0);
    }else{
        $sql = "select name,password from user where name = '$username' and password = '$password'" ;
        $query = $sql_connect->query($sql);
        $num = mysqli_num_rows($query);
        if($num){
            $array = $query->fetch_row();
            echo "<script>alert('登录成功!$array[0]');window.location='index.html';</script>";
            $name = $array[0];
            return $name;
        }else{
            echo "<script>alert('用户名或密码错误！');history.go(-1);</script>";
            exit(0);
        }


    }
}