<?php session_start(); ?>
<!DOCTYPE html>

  <html lang="en">
      
  <head>
      
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SiGAD</title>

    <!-- Bootstrap -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/pao.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

      </head>
 <body class ="bg-white">
     
     <div class="container">
         <img src="http://www.mfrural.com.br/image/logo.png" style="margin-left: 480px; margin-top: 10px;"/>
         
           <?php
           include('conf/conexao.php');
           $ips = mysqli_query($link, "SELECT COUNT(*) AS liberado FROM ips_liberados WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
           $result = mysqli_fetch_assoc($ips);
    
    if(!$result['liberado']){
        echo "Acesso negado"; exit();
    }
