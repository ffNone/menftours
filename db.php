
<?php
$dns = "mysql:host=localhost; dbname=new";
$u = "root";
$pass = '';






try {
    $db = new PDO ( $dns , $u , $pass);

 
}

catch (PDOException $e) {

    echo "DATABASE ERROR!";
}
 session_start();
    
 if  (empty ($_SESSION)){
    session_destroy();
    session_unset();
    header('Location:index.php');
    exit();
 }
 else  {  ?>

 


<form action="" method="post">

    <input type="submit" value="الموظفين" name="c">
    <input type="submit" value="العملاء" name="u">
    <input type="submit" value="">
    <input type="submit" value="exit" name="exit">
    <br>

</form>


<?php  }         if (isset($_POST["exit"])) {
                session_unset();
                session_destroy();
                header("Location:index.php");
                exit();
                die();
} ?>