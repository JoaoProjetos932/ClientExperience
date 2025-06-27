<?php
    include_once("header.php");

?>
    <div class="container">
    <?php include_once("backbtn.html"); ?>    
    <h1 id="main-title">Editar Dados Do Cliente</h1>
    <form id="create-form" action="<?= $BASE_URL ?>../config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="form-group">
            <label for="name">Nome do Cliente: </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome do cliente" value="<?= $contact['name'] ?>" >
        </div>
        <div class="form-group">
            <label for="amountDue">Valor a ser pago pelo cliente:  </label>
            <input type="text" name="amountDue" id="amountDue" class="form-control" placeholder="Digite o valor a ser pago do cliente" value="<?= isset($contact['AmountDue']) ? number_format($contact['AmountDue'], 2, ',', '.') : '' ?>" >
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Cliente: </label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o Telefone do cliente" value="<?= $contact['phone'] ?>" >
        </div>
        <div class="form-group">
            <label for="CPF">CPF do Cliente: </label>
            <input type="text" name="CPF" id="CPF" class="form-control" placeholder="Digite o CPF do cliente" value="<?= $contact['CPF'] ?>" >
        </div>
         <div class="form-group">
            <label for="Adress">Endereço do Cliente: </label>
                <input type="text" name="Adress" id="Adress" class="form-control" placeholder="Digite o endereço do cliente" value="<?= $contact['Adress'] ?>" >
            </div>
        <div class="form-group">
            <label for="products">Produtos: </label>
            <textarea name="products" id="products" class="form-control" placeholder="Digite os produtos do cliente"><?= isset($contact['products']) ? htmlspecialchars($contact['products']) : '' ?></textarea>
        </div>
        <div class="form-group">
            <label for="observation">Observações: </label>
            <input type="text" name="observation" id="observation" class="form-control" placeholder="Insira as observações" rows="10" value="<?= $contact['observation'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        

    </form>

    </div>
<?php
    include_once("footer.php");
?>