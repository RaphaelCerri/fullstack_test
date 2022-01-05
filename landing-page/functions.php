<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['telefone'];
    $reg = $_POST['regiao'];
    $unid = $_POST['unidade'];
    $data_nasc = $_POST['data_nascimento'];
    $score = $_POST['score'];
    $idade = $_POST['idade'];
    $date_nasc = date ("Y-m-d", strtotime($data_nasc));

    $username = 'raphael.cerri';
    $password = 'k38yNaESSwbgmL9x';
    try {
      $conn = new PDO('mysql:host=host.docker.internal;dbname=as_example', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    if(isset($_POST['nome'])){
        $sql = $conn->prepare("INSERT INTO formulario (nome, email, telefone, regiao, unidade, data_nascimento, score, idade) VALUES (:no, :em, :te, :re, :un, :da, :sc, :id)");
        $sql->bindValue(':no', $nome);
        $sql->bindValue(':em', $email);
        $sql->bindValue(':te', $tel);
        $sql->bindValue(':re', $reg);
        $sql->bindValue(':un', $unid);
        $sql->bindValue(':da', $date_nasc);
        $sql->bindValue(':sc', $score);
        $sql->bindValue(':id', $idade);
        $sql->execute();
        if($sql->rowCount() >= 1) {
            echo json_encode('Salvo com sucesso');
        }else {
            echo json_encode('Falha ao salvar');
        }
    }

    $url  = 'https://api-bra1.addsales.com/join-asbr/ti/lead?token=00aa665fc1dc9e98b82aa4cd1e74396e';
    $data = 
    [
        "nome"=>            $nome,
        "email"=>           $email,
        "telefone"=>        $tel,
        "regiao"=>          $reg,
        "unidade" =>        $unid,
        "data_nascimento"=> $date_nasc,
        "score" =>          $score
    ];

    $ch   = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);

    curl_close($ch);