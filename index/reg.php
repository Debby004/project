<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/10
 * Time: 16:03
 */
Header("Content-type:text/html;charset:utf-8");
$username = $_POST['username'];
$password = $_POST['password'];
$passwords = $_POST['passwords'];
if(empty($username)){
    echo '<script>alert("用户名不能为空！");history.go(-1);</script>';
    exit(0);
}elseif(empty($username)){
    echo '<script>alert("密码不能为空！");history.go(-1);</script>';
    exit(0);
}elseif($password!==$passwords){
    echo '<script>alert("两次密码输入不一致！");history.go(-1);</script>';
    exit(0);
}else{
    $sql_connect = new mysqli("localhost","root","root","project");
    if($sql_connect->connect_errno){
        echo "数据库连接失败！";
        exit(0);
    }else{
        $sql = "select * from user where name = '$username'";
        $query = $sql_connect->query($sql);
        $num = mysqli_num_rows($query);
        if($num){
            echo '<script>alert("该用户名已存在！");history.go(-1);</script>';
        }else{
            $sql = "insert into user VALUE ('','$username','$password')";
            $query = $sql_connect->query($sql);
            if($query){
                echo '<script>alert("注册成功！");window.location="index.html"</script>';
            }
        }


    }
}

?>