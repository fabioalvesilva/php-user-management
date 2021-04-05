<?php
include "template.php";
include "config.php";
?>

<?= template_header("Registo", "Criar Contacto") ?>
<div class="content read">
    <h2>Novo contacto</h2>
</div>
<div class="content create">
    <form method="POST" action="create.php">
        <table>
            <tr>
                <td>
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="">
                </td>
                <td>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="morada">Morada</label>
                    <input type="text" id="morada" name="morada" value="">
                </td>
                <td>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Nome Utilizador">Nome Utilizador</label>
                    <input type="text" id=" nome_utilizador" name="nome_utilizador" value="">
                </td>
                <td>
                    <label for="telefone">Telefone</label>
                    <input type="number" id="telefone" name="telefone" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btn_submit">
                </td>
            </tr>
        </table>
    </form>
</div>
<?php

//registar os valores na bd
$st = $pdo->prepare('INSERT INTO utilizadors VALUES(?,?,?,?,?,?,?,?)');

if (isset($_POST["btn_submit"])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $nome_utilizador = $_POST['nome_utilizador'];
    $telefone = $_POST['telefone'];
    $morada = $_POST['morada'];
    $data = date("Y/m/d");

    if (empty($nome)) {
        echo "Nome vazio.";
    } elseif (empty($email)) {
        echo "Email vazio.";
    } elseif (empty($pwd)) {
        echo "Password vazia.";
    } elseif (empty($nome_utilizador)) {
        echo "Nome de utilizador vazio.";
    } elseif (empty($telefone)) {
        echo "Telefone vazio.";
    } elseif (empty($morada)) {
        echo "Morada vazia.";
    } else {
        $st->execute([NULL, $nome, $email, $pwd, $nome_utilizador, $telefone, $morada, $data]);
        echo '<div class="content read">
                    <h3>Contacto criado com sucesso.</h3>
            </div>';
    }
}

?>
<?php

template_footer("Rodapé")
?>