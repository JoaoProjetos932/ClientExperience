<?php
include_once("header.php");
?>

<div class="container">
    <?php if(isset($_GET['showMsg']) && isset($_SESSION['msg'])): ?>
        <p id="msg"><?= $_SESSION['msg'] ?></p>
        <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>
</div>

<h1 id="main-title">Meus Clientes</h1>

<?php if(count($contats) > 0): ?>
    <table class="table" id="contacts-table">
        <thead>
            <tr>
                <th scope="col"><i class="fa-sharp-duotone fa-solid fa-circle-user"></i></th>
                <th scope="col">Nome</th> 
                <th scope="col">Telefone</th>
                <th scope="col">Valor a ser Pago</th>
                <th scope="col">Produtos</th>
                <th scope="col">Observações</th>    
                <th scope="col"></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($contats as $contact): ?>
                <tr>
                    <td scope="row" class="col-id"><?= $contact['id'] ?></td>
                    <td><?= $contact['name'] ?></td>
                    <td><?= $contact['phone'] ?></td>
                    <td>R$ <?= isset($contact['AmountDue']) ? number_format($contact['AmountDue'], 2, ',', '.') : '0,00' ?></td>
                    <td><?= $contact['products'] ?></td>
                    <td><?= $contact['observation'] ?></td>
                    <td class="actions">
    <a style="text-decoration: none" href="<?= $BASE_URL ?>show.php?id=<?= $contact['id'] ?>">
        <i class="fas fa-eye check-icon"></i>
    </a>
    <a style="text-decoration: none" href="<?= $BASE_URL ?>edit.php?id=<?= $contact['id'] ?>">
        <i class="far fa-edit edit-icon"></i>
    </a>
    <form style="display: inline; margin: 0; padding: 0; border: none; background: none;" class="delete-form" action="<?= $BASE_URL ?>../config/process.php" method="POST">
        <input type="hidden" name="type" value="delete">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <button type="submit" class="delete-btn">
            <i class="fas fa-times delete-icon"></i>
        </button>
    </form>
</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p id="empty-list-text">Ainda não Há clientes, <a href="<?= $BASE_URL ?>create.php">Clique aqui para adicionar</a></p>
<?php endif; ?>

<?php
include_once("footer.php");
?>