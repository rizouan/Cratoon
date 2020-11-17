<?php require_once("../library/function.php"); 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <style type="text/css">
    body {
        margin: 0;
        padding: 0
    }

    a {
        text-decoration: none;
    }

    .left {
        float: left;
    }

    .right {
        float: right;
    }

    img.img-responsive {
        height: auto;
        display: block;
        max-width: 100%;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        border: 1px solid #e7e7e7;
        background-color: #f3f3f3;
    }

    li {
        float: right;
        height: 40px;
    }

    li a {
        display: block;
        color: #666;
        text-align: center;
        padding: 10px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #ddd;
    }

    li a.active {
        color: white;
        background-color: #4CAF50;
    }

    h1.page-header {
        font-size: 26px;
        color: #000;
        text-align: center;
        padding-bottom: 9px;
        margin: 40px 0 20px;
        border-bottom: 1px solid #dbdbdb;
    }

    .login-form {
        text-align: center;
    }

    form {
        border: 3px solid #f1f1f1;
        max-width: 300px;
        margin: 20px auto;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.profile-icon {
        width: 40px;
    }

    .container {
        padding: 30px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .menu2 {
        margin: 20px 0;
    }

    .table-box {
        padding: 10px 50px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    .wallet {
        width: 23%;
        height: 60px;
        background: #4caf50;
        font-size: 25px;
        text-align: center;
        float: left;
        margin: 1% 1%;
        color: white
    }

    .warning {
        color: red;
        font-size: 18px;
        text-align: center;
        border: 1px black dotted;
        margin: 10px 0;
    }

    .success {
        color: green;
        font-size: 18px;
        text-align: center;
        border: 1px black dotted;
        margin: 10px 0;
    }
    </style>
</head>

<body>
    <h1 class="page-header upper">Admin Page</h1>
    <?php
if (isset($_SESSION['message'])){
$msg = $_SESSION['message'];
            if($msg != NULL){
                echo "<center>";
                echo $msg;
                echo "</center>";
                unset($_SESSION['message']);
            }
        }
?>
    <div class="login-form">
        <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit">Login</button>
            </div>
        </form>
        <?php 
if(
    isset($_POST['uname'])
    && isset($_POST['psw'])
    ) {
    $uname=MS($_POST['uname']);
    $psw=$_POST['psw'];
    $chk = "SELECT username,pass FROM admin";
    $chk= $db->query($chk);
    $chk= $chk->fetch_assoc();
if (($chk['username']==$uname) && ($chk['pass']==$psw) ) {
    $_SESSION["message"] = "Admin Login Succesfully";
    header("Location: ".BASE_URL.'admin-panel.php');
}
else{
    $_SESSION["message"] = "Wrong Information";
   header("Location: ".BASE_URL.'admin-login.php');
}
}
     ?>
    </div>
</body>

</html>