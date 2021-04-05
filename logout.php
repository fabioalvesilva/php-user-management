<?php

session_start();
//Destrói a session
session_destroy();
//Redirecionar a página
header("Location:login.php");
?>