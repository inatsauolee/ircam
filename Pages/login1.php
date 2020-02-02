<?php 
	header('Content-type: text/html; charset=utf-8');
    session_start();
    if(isset($_SESSION['erreurLogin']))
        $erreurLogin=$_SESSION['erreurLogin'];
    else{
        $erreurLogin="";
    }
    session_destroy();
?>
<! DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>GestaGiaire-Se connecter</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body style="background-image: url('../images/page-pl-ar-2.jpg');  ">
        
        <div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            <div class="panel panel-success margetop">
                <div class="panel-heading">Se connecter...</div>
                <div class="panel-body">
                    <form method="post" action="seConnecter.php">
                        <div class="form-group" >
                            
        <!-- ------------------------ Des inputs -------------------------------- -->                                                 
                            
     <!-- --------------------- affichage des erreurs -------------------------------------------- -->                          <?php if(!empty($erreurLogin)) {?>
                        <div class="alert alert-danger">
                            <?php echo $erreurLogin ?>
                        </div>
                        <?php } ?>    
                        
    <!-- -------------------- login -------------------------------------------------------- -->
                        <div class="form-group">
                            <label for="login" >Login :</label>
                            <input type="text" name="login" placeholder="Login..." class="form-control" />
                        </div>
                        
                        
    <!-- -------------------- Mot de passe  ----------------------------------------------------- -->
                        <div class="form-group">
                            <label for="pwd" >Mot de passe :</label>
                            <input type="password" name="pwd" placeholder="Mot de passe..." class="form-control" />
                        </div>
                    
                    
                    
     <!-- -------------------- button ------------------------------------------------------------- -->  
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-log-in"> </span>
                            Se connecter
                        </button>
                        </div>
                    
                    </form>
                            
                
                </div>
            </div>
        </div>
    </body>

</html>