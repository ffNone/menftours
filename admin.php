 
<?php 
 
 
 
 

 if (isset($_POST['log'])) {
    if ($_POST['user'] == 'kareem' and $_POST['pass'] == 'kemo' or $_POST['user'] == 'yousef' and $_POST['pass'] == 'jo') {
        
        session_start();
        $_SESSION['user'] = [$_POST['user']]; 
        header("Location:db.php");
        exit();
    }
 
    else {
        echo "";
    }
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="f1">ADMIN PANEL</h1>
    <form action="" method="post">
    Username: <input type="text" name="user" id="" required> 
        <br>
    Password:    <input type="password" name="pass" id="" required> 
        <input type="submit" value="Enter" name="log">
    </form>
 
</body>
</html>