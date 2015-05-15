<?php
	$error="&nbsp;";
	if(isset($_POST['op']))
	{
		$mail=strtolower($_POST['mail']);
		$contra=$_POST['con'];
		
		if($mail=="admin@gorgona.com" && $contra=="123")
		{
			
			header('Location:index.php');
		}else{
			$error="* Usuario no autorizado!";
		}	
	}
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/style.css">
        <link type="text/css" rel="stylesheet" href="../css/styless.css">
        <link rel="stylesheet" href="../css/style3.css" type="text/css" media="all">
        
        <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
        <title>Universidad Gorgona</title>
    </head>
    <body>
        <?php include ("Header_1.php"); ?>
        
            <div id="section2" >
                <section id="gallery">
                    <div class="container" >
                          <div id="login-form">
                            <h3><i class="fa fa-user fa-2x"></i> AUTENTICACION</h3>
                                     <fieldset>

                                         <form action="" method="POST">
                                         <input name="mail" type="email" required placeholder="Email">
                                         <input name="con" type="password" required  placeholder="Password">
                                         <input type="submit" name="op" value="Entrar">
                                         <footer>
                                             <p style="color:red;"><?php echo $error;?></p>
                                         </footer>    
                                         </form>
                                     </fieldset>
                                </div>
                    </div>
                </section>
            </div>
   </body>
    <?php include("fooder.php"); ?>
</html>
