<?php 
    require_once('identifier.php');
    require_once('connexiondb.php');
        if (isset($_GET['ID'])){
            $ID=$_GET['ID'];
         }
        else{
            header("location:utilisateurs.php");
        }

    $requeteUser="select * from user where ID=$ID";
    $resultatUser=$pdo->query($requeteUser);
    $user=$resultatUser->fetch();


    $username=$user['username'];
    $first_name=$user['first_name'];
    $last_name=$user['last_name'];
    $email=$user['email'];
    $password=$user['password'];
    $role=strtoupper($user['role']);
    $ID=$_GET['ID'];


?>
<! DOCTYPE HTML >
<html>
    <head>
        <meta charset="utf-8">
        <title>InuSselmad</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="container">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
                        <div style='visibility: hidden'>
                            <label for="ID"></label>
                            <input type="text" name="ID"  class="form-control" value="<?php echo $ID ?>"/>                           
                        </div>
                        <div>
                            <label for="username">username :</label>
                            <input type="text" name="username" placeholder="username..." class="form-control" value="<?php echo $username ?>"/>                           
                        </div><br>
                        <div>
                            <label for="first_name">First name :</label>
                            <input type="text" name="first_name" placeholder="First name..." class="form-control" value="<?php echo $first_name ?>"/>                           
                        </div><br>
                        
                        <div>
                            <label for="last_name">Last name :</label>
                            <input type="text" name="last_name" placeholder="Last name..." class="form-control" value="<?php echo $last_name ?>"/>                           
                        </div><br>
                        <div>
                            <label for="email">E-Mail :</label>
                            <input type="text" name="email" placeholder="E-Mail..." class="form-control" value="<?php echo $email ?>"/>                           
                        </div><br>
                        <div>
                            <label for="password">PASSWORD :</label>
                            <input type="text" name="password" placeholder="Password..." class="form-control" value="<?php echo $password ?>"/>                           
                        </div><br>
                        <div class="form-group">
                            <label for="email">Role :</label>
                            <select name="role" class="form-control">
                                <option value="ADMIN" <?php if($role=="ADMIN") echo "selected"?>>Admin</option>
                                <option value="VISITEUR" <?php if($role=="VISITEUR") echo "selected"?>>Visiteur</option>
                            </select>
                        </div><br>
                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-save"></span>
                            Enregistrer
                        </button>
                         &nbsp;&nbsp;
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

