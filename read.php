<?php
include "template.php";
include "config.php";
?>

<?= template_header("List", "Lista Contactos") ?>
<div class="content read">
    <h2>Contactos Existentes</h2>
    <a href="create.php" class="create-contact">Criar Registos</a>
</div>
<?php
//mostrar os registos da BD
$st = $pdo->prepare("SELECT * FROM utilizadors ORDER BY email");
//executar a query para retirar os valores que estão dentro da base de dados
$st->execute();
//retirar a lista de valores para uma variavel
$utilizadores = $st->fetchAll(PDO::FETCH_ASSOC);
//contar o número de registos existentes na tabela utilizador
$num_registos = $pdo->query("SELECT count(*) FROM utilizadors")->fetchColumn();
//se não existirem registos não vamos mostrar a tabela
if ($num_registos <= 0) {
    echo "<h1>Não existem registos na base de dados</h1>";
} else {

?>
    <div class="content read">
        <table>
            <thead>
                <td>#</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Data de registo</td>
                <td></td>
            </thead>
            <tbody>
                <?php foreach ($utilizadores as $utilizador) : ?>
                    <tr>
                        <td><?= $utilizador["cod_utilizador"] ?></td>
                        <td><?= $utilizador["nome"] ?></td>
                        <td><?= $utilizador["email"] ?></td>
                        <td><?= $utilizador["data_registo"] ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $utilizador['cod_utilizador'] ?>" class="edit"><i class="fas fa-pen"></i></a>
                            <a href="delete.php?id=<?= $utilizador['cod_utilizador'] ?>" class="delete"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
}
template_footer("Rodapé")
?>