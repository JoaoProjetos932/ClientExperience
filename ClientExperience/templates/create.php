<?php
    include_once("header.php");

?>
    <div class="container">
    <?php include_once("backbtn.html"); ?>    
    <h1 id="main-title">Adicionar Cliente</h1>
    <form id="create-form" action="<?= $BASE_URL ?>../config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do Cliente: </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome do cliente" required>
        </div>
        <div class="form-group">
            <label for="amountDue">Valor a ser pago pelo cliente:  </label>
            <input type="text" name="amountDue" id="amountDue" class="form-control" placeholder="Digite o valor a ser pago do cliente" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Cliente: </label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o Telefone do cliente" required>
        </div>
        <div class="form-group">
            <label for="CPF">CPF do Cliente: </label>
            <input type="text" name="CPF" id="CPF" class="form-control" placeholder="Digite o CPF do cliente" required>
        </div>
         <div class="form-group">
            <label for="Adress">Endereço do Cliente: </label>
            <input type="text" name="Adress" id="Adress" class="form-control" placeholder="Digite o endereço do cliente" required>
        </div>
        <div class="form-group">
            <label for="products">Produtos: </label>
            <textarea type="text" name="products" id="products" class="form-control" placeholder="Digite os produtos do cliente" required></textarea>
        </div>
        <div class="form-group">
            <label for="observation">Observações: </label>
            <input type="text" name="observation" id="observation" class="form-control" placeholder="Insira as observações" rows="10">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        

    </form>

    </div>
<?php
    include_once("footer.php");
?>