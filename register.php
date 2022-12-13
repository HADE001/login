<?php
    session_start();    
    if(isset($_POST['submit'])) {
        require("./db.php");
        $res = $db->query("SELECT * FROM `usr` WHERE usr_username = '{$_POST['username']}' ");
        if($res->num_rows == 0) {
            $db->query("INSERT INTO `usr`(`usr_id`, `usr_name`, `usr_username`, `usr_password`) VALUES 
            (null,'{$_POST['name']}','{$_POST['username']}','{$_POST['password']}')");
            $msg = '</div>register success<div>';
        }else{
            $msg = '</div>this username has already used<div>';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require('./navber.php'); ?>
    <?php echo $msg ?? ""; ?>
    <form method="post">
        <div>
            <label for="">name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="username">username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password">
        </div>
        <div>
            <button name="submit" >clik</button>
        </div>
    </form>
</body>
</html>