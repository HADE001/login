<?php 
    session_start();

    if(isset($_GET['logout'])){
        session_unset();
        header('location: ./login.php');die;
    }

    if(isset($_POST['submit'])){
        require('./db.php');
        $res = $db -> query("SELECT * FROM usr WHERE usr_username = '{$_POST['username']}' AND
        usr_password = '{$_POST['password']}'");
        $user = mysqli_fetch_assoc($res);
        if($user){
            $_SESSION['usr'] = $user['usr_id'];
            header('location: ./ ');
            die;
        }else{
            $msg = "Not found this username";
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
        <?php   require('./navber.php') ?>
        
        <?php echo $msg ?? ""; ?>
        <form  method="post">
            <div>
            <label for="username">username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password">
        </div>
        <button name="submit">submit</button>
    </form>
</body>
</html>