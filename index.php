<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de Monitoramento | PHP</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <?php

    $servidores = [
      "UOL" => "www.uol.com.br",
      "ROTEADOR" => "192.168.1.1",
      "DESCONHECIDO" => "www.teste.com.us",
      "GLOBO" => "www.globo.com",
      "CELULAR" => "192.168.0.0",
      "LOCALHOST" => "127.0.0.1",
      "GOOGLE" => "www.google.com"
    ];

  ?>
  <div class="center">
    
    <h1>Painel de Monitoramento | PHP</h1>

    <div class="cards">

      <?php
        foreach($servidores as $servidor => $ip):
        
          $retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip");

          if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno)) {
            $status = "ONLINE";
          } else {
            $status = "OFFLINE";
          }
      ?>

        <div class="card <?= $status ?>">
          <div class="servidor"><?= $servidor ?></div>
          <div class="ip"><?= $ip ?></div>
          <div class="status"><?= $status ?></div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>
</body>
</html>
