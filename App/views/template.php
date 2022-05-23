<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso MVC</title>

    <!--materialize-->
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>
    <!--
    <img src="<?php echo URL_BASE;?>images/mvc.jpg" style="width:150px;"><br>
    -->
    <nav class="blue">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo">Bloco de Anotações</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

            <li><a href="/home">Home</a></li>
            <?php if(isset($_SESSION['logado'])): ?>
                <li><a href="/notes/criar">Criar bloco</a></li>
                <li><a href="/users/listar">Usuários</a></li>
            <?php endif; ?>     

            <?php if(!isset($_SESSION['logado'])): ?>
                <li><a href="/home/login"> Login</a>
            <?php else: ?>
                Olá <?php echo $_SESSION['userNome']; ?>
                <li><a href="/home/logout"> Logout</a></li>
            <?php endif; ?>
        </ul>
        </div>
    </nav>
        
       
    

    <?php
        require_once '../App/views/'.$view.'.php';
    ?>
</body>
</html>