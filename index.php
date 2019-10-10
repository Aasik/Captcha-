<?php
    session_start();
    include('config.php');
    if(isset($_POST['submit'])){
        if($_POST['vercode'] != $_SESSION['vercode'] or $_SESSION['vercode'] == ''){
            echo "<script>alert('Incorrect Verification');</script>";
        }else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $ad = "INSERT INTO user(name, email) values(?,?)";
            $stmt = $mysqli ->prepare($ad);
            $stmt -> bind_param(ss, $name, $email);
            $stmt -> execute();
            $stmt -> close();
            echo  "<script>alert('Data Added Successfully');</script>";
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Captcha Image Verification</title>
</head>
<body>
    <h2>Captcha Image Verification</h2>
    <form name="stmt" method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
            <td>verification Code:</td>
            <td><input type="text" name="vercode" size="10" required />&nbsp;<img src="captcha.php" style="margin-top:1%;" ></td></tr>
            <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="submit"></td></tr>
        </table>
    </form>
</body>
</html>