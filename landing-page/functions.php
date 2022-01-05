<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['telefone'];
    $reg = $_POST['regiao'];
    $unid = $_POST['unidade'];
    $data_nasc = $_POST['data_nascimento'];
    $score = $_POST['score'];

    $username = 'raphael.cerri';
    $password = 'k38yNaESSwbgmL9x';
    try {
      $conn = new PDO('mysql:host=host.docker.internal;dbname=as_example', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    //se veio enviado validate true envia pro banco
    if(isset($_POST['nome'])){
        $sql = $conn->prepare("INSERT INTO formulario (nome, email, telefone, regiao, unidade, data_nascimento, score) VALUES (:no, :em, :te, :re, :un, :da, :sc)");
        $sql->bindValue(':no', $nome);
        $sql->bindValue(':em', $email);
        $sql->bindValue(':te', $tel);
        $sql->bindValue(':re', $reg);
        $sql->bindValue(':un', $unid);
        $sql->bindValue(':da', $data_nasc);
        $sql->bindValue(':sc', $score);
        $sql->execute();
        if($sql->rowCount() >= 1) {
            echo json_encode('Salvo com sucesso');
        }else {
            echo json_encode('Falha ao salvar');
        }
    }