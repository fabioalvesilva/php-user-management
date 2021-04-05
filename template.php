<?php
//Iniciar as variaveis de sessão num servidor
session_start();

if(!(isset($_SESSION['nome_util']))){
    header("Location:login.php");
    exit();
}

//funcao para o cabeçalho da página
function template_header($titulo, $cabecalho){
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>".$titulo."</title>
    <link href='css/estilo.css' rel='stylesheet'>
    <link href='http://use.fontawesome.com/releases/v5.7.1/css/all.css' type='text/css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
</head>
<body>
<nav class='navtop'>
<div>
<h1>".$cabecalho."</h1>
<a href='index.php'><i class='fas fa-home'></i>Homepage</a>
<a href='read.php'><i class='fas fa-address-book'></i>Contacto</a>";

if((isset($_SESSION['nome_util']))){
    echo "<a href='logout.php'>Logout</a>";
}

echo "</div>
</div>
</nav>";
}


//funcao para o rodapé da página
function template_footer()
{
    echo " </body>
    </html>";
}
