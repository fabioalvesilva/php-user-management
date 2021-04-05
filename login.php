<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="content-fluid m-5 ">
        <form method="post" action="login.php">
            <div class="mb-3"><label class="form-label">Nome de Utilizador</label><input class="form-control" type="text" name="nome_util"></div>
            <div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password"></div>
            <br>
            <input class="btn btn-primary" type="submit" name="Login" value="Login">
        </form>
    </div>
    <?php
    if (isset($_POST['Login'])) {
        //Verificar se o nome e password correspondem a um elemento na BD
        include_once "config.php";

        $st = $pdo->prepare("SELECT nome FROM utilizadors WHERE nome_util=? AND password=?");
        $st->execute([$_POST['nome_util'], $_POST['password']]);

        $utilizadores = $st->fetchAll(PDO::FETCH_ASSOC);
        $size = count($utilizadores);

        echo $_POST['nome_util'];
        echo $_POST['password'];

        //Verificar se existe utilizador
        if ($size <= 0) {

            echo "<p>Utilizador não existe. Tente novamente</p>";
        } else {


            //A sessão vai iniciar
            session_start();

            foreach ($utilizadores as $util) {
                $_SESSION['nome_util'] = $util["nome"];
            }
            //Enviar para a página de listagem
            header("Location:read.php");
        }
    }
    ?>

</body>

</html>