<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With Google</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:100px;">
        <?php
            if(isset($_COOKIE["id"]) && isset($_COOKIE["sss"])){
                $Controller = new Controller;
                if($Controller->checkUserStatus($_COOKIE["id"],$_COOKIE["sss"])){
                    echo $Controller->printData(intval($_COOKIE["id"]));
                    echo '<div class="d-grid gap-1">';
                    echo '<a class="btn btn-outline-danger" role="button" href="logout.php">Logout</a>';
                    echo '</div>';
                }
                else{
                    echo "Error!";
                }
            }
            else{
        ?>
        <img src="img/logo.png" alt="Logo" style="display: table;margin:0 atuo;max-width: 150px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button onclick="window.location = '<?php echo $login_url?>'" type="button" class="btn btn-danger">Login with Google</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>