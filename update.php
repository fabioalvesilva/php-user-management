<?php
include "template.php";
include "config.php";


//registar os valores na bd
$st = $pdo->prepare('UPDATE utilizadors SET nome=?, email=?, telefone=?, morada=? WHERE cod_utilizador=?');

if (isset($_POST["btn_update"])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $morada = $_POST['morada'];

    echo $id;
    echo $nome;
    echo $telefone;
    echo $email;
    echo $morada;

    $st->execute([$nome, $email, $telefone, $morada, $id]);
} else {
    $id = $_GET['id'];
}
?>

<?= template_header("Atualizar", "Atualizar Contacto") ?>
<div class="content create">
    <h2>Atualizar contacto</h2>
</div>
<div class="content create">
    <form method="POST" action="update.php">
        <input type="hidden" id="id" name="id" value="<?= $id ?>">
        <table>
            <tr>
                <td><label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="">
                </td>
                <td><label for="email">Email</label>
                    <input type="text" id="email" name="email" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="telefone">Telefone</label>
                    <input type="number" id="telefone" name="telefone" value="">
                </td>
                <td>
                    <label for="morada">Morada</label>
                    <input type="text" id="morada" name="morada" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btn_update">
                </td>
            </tr>
        </table>
    </form>
</div>
<?php

template_footer("Rodapé")
?>