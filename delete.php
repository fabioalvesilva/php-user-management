<?php
include "template.php";
include "config.php"; ?>

<?= template_header("Remover", "Remover Contacto") ?>
<?php

if (isset($_GET["id"])) {

    $id = $_GET['id'];

    //mostrar os registos da BD
    $st = $pdo->prepare("SELECT * FROM utilizadors WHERE cod_utilizador=?");
    //executar a query para retirar os valores que estão dentro da base de dados
    $st->execute([$id]);
    $user = $st->fetch(PDO::FETCH_OBJ);

    $user_id = $user->cod_utilizador;
    $user_name = $user->nome;
    $user_email = $user->email;
    $user_tel = $user->telefone;
    $user_address = $user->morada;
?>

    <div class="content create">
        <h2>Remover contacto #<?= $user_id ?></h2>
        <form method="POST" action="update.php">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="nome">Nome:</label>
                            <label for="nome"><?= $user_name ?></label>
                        </td>
                        <td>
                            <label for="email">Email:</label>
                            <label for="nome"><?= $user_email ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefone">Telefone:</label>
                            <label for="nome"><?= $user_tel ?></label>
                        </td>
                        <td>
                            <label for="morada">Morada:</label>
                            <label for="nome"><?= $user_address ?></label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="content read">
        <form method="POST" action="update.php">
                <a href='delete.php?id=<?= $user_id ?>&confirma=s' class="btn btn-primary"><i class="fas fa-window-close"></i></a>
                <a href='delete.php?id=<?= $user_id ?>&confirma=n' class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </form>
    </div>

<?php

    //verificar se existe o botao confirma
    if (isset($_GET["confirma"])) {

        //verificar se foi clicado a opçao s
        if (isset($_GET["confirma"]) == 's') {
            //remover registo
            $st = $pdo->prepare('DELETE FROM utilizadors WHERE cod_utilizador=?');
            $st->execute([$id]);
        } else {
            header('Location:read.php');
            exit();
        }
    }
} ?>



<?php
template_footer("Rodapé")
?>