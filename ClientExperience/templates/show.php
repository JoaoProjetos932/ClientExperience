<?php
    include_once("header.php");
?>

<div class="container" id="view-contact-container">
    <?php include_once("backbtn.html"); ?>
    
    <h1 id="main-title"><?= $contact['name'] ?></h1>
    
    <div class="contact-detail">
        <p class="bold">Telefone</p>
        <p><?= $contact['phone'] ?></p>
    </div>
    
    <div class="contact-detail">
        <p class="bold">Observações</p>
        <p><?= $contact['observation'] ?></p>
    </div>
    
    <div class="contact-detail">
        <p class="bold">CPF</p>
        <p><?= $contact['CPF'] ?></p>
    </div>
    
    <div class="contact-detail">
        <p class="bold">Endereço</p>
        <p><?= $contact['Adress'] ?></p>
    </div>
    
    <div class="contact-detail">
        <p class="bold">Lista de produtos do Devedor</p>
        <p><?= $contact['products'] ?></p>
    </div>
    
    <div class="contact-detail highlight">
        <p class="bold">Valor a Pagar</p>
        <p style="color: #e74c3c; font-weight: bold;">R$ <?= number_format($contact['amountDue'], 2, ',', '.') ?></p>
    </div>
</div>

<?php
    include_once("footer.php");
?>