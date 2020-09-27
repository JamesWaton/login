<?php

        session_start();
        if (!isset($_SESSION['userID'])  || !isset($_SESSION['email'])){
            header('Location: login.php');
            exit();
}







?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Members Profile </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<div class="container" style="margin-top:100px">
    <div claas="row justify-content-center">
        <div class="col-md-3 col-offset-3">
            <h1>You Are verified</h1>
            <img src="<?php echo $_SESSION['picture'] ?>">
            </div>
        <div class="col-md-9">

            Name: <?php echo $_SESSION['name']?><br>
            Email: <?php echo $_SESSION['email']?><br>

        </div>
    </div>
</div>
</body>
</html>