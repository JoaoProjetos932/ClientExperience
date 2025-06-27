<?php
session_start();
include_once("connection.php");
include_once("url.php");

$data = $_POST;
if(!empty($data)) {
    if($data['type'] === 'create') {
        $name = $data['name'];
        $amount = $data['amountDue'];
        $phone = $data['phone'];
        $cpf = $data['CPF'];
        $adress = $data['Adress'];
        $products = $data['products'];
        $observation = $data['observation'];

        $query = "INSERT INTO contacts (name, phone, CPF, adress, products, observation, AmountDue) VALUES (:name, :phone, :CPF, :Adress, :products, :observation, :amountDue)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':CPF', $cpf);
        $stmt->bindParam(':Adress', $adress);
        $stmt->bindParam(':products', $products);
        $stmt->bindParam(':observation', $observation);
        $stmt->bindParam(':amountDue', $amount);
        
        try {
            $stmt->execute();
            $_SESSION['msg'] = "Contato adicionado com sucesso!";
            header("Location:". $BASE_URL . "../templates/index.php?showMsg=1");
            exit;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: " . $error;
            exit;
        }
    } else if ($data['type'] === 'edit') {
        $id = $data['id'];
        $name = $data['name'];
        $amount = $data['amountDue'];
        $phone = $data['phone'];
        $cpf = $data['CPF'];
        $adress = $data['Adress'];
        $products = $data['products'];
        $observation = $data['observation'];

        $query = "UPDATE contacts SET name = :name, phone = :phone, CPF = :CPF, adress = :Adress, products = :products, observation = :observation, AmountDue = :amountDue WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':CPF', $cpf);
        $stmt->bindParam(':Adress', $adress);
        $stmt->bindParam(':products', $products);
        $stmt->bindParam(':observation', $observation);
        $stmt->bindParam(':amountDue', $amount);
        $stmt->bindParam(':id', $id);

        try {
            if($stmt->execute()) {
                $_SESSION['msg'] = "Contato atualizado com sucesso!";
                header("Location:". $BASE_URL . "../templates/index.php?showMsg=1");
                exit;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            exit;
        }
    } else if ($data['type'] === 'delete') {
        $id = $data['id'];
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        try {
            if($stmt->execute()) {
                $_SESSION['msg'] = "Contato removido com sucesso!";
                header("Location:". $BASE_URL . "../templates/index.php?showMsg=1");
                exit;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            exit;
        }
    }
    header("Location:". $BASE_URL . "../templates/index.php");
} else {
    $id = null;
    if(!empty($_GET) && isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    
    if(!empty($id)) {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $contact = $stmt->fetch();
    } else {
        $contats = [];
        $query = "SELECT * FROM contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $contats = $stmt->fetchAll();
    }
}

$conn = null;
?>