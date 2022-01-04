<?php
    $username = 'raphael.cerri';
    $password = 'k38yNaESSwbgmL9x';
    try {
        $conn = new PDO('mysql:host=host.docker.internal;dbname=as_example', $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      }
    $data = $conn->query('SELECT * FROM formulario');

    foreach($data as $row) {
        print_r($row);
    }
?>