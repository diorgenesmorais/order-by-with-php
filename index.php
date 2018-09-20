<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ordenação de resultado</title>
    <style media="screen">
      .idade {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php
      require_once 'config.php';
      try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);
      } catch(PDOException $e){
        echo "Error: ".$e->getMessage();
        exit;
      }
    ?>
    <table border="1" width="400">
      <tr>
        <th>Nome</th>
        <th>Idade</th>
      </tr>
      <?php
        $sql = "select * from usuarios";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
          foreach ($sql->fetchAll() as $usuario):
            ?>
            <tr>
              <td><?php echo $usuario['nome']; ?></td>
              <td class="idade"><?php echo $usuario['idade']; ?></td>
            </tr>
            <?php
          endforeach;
        }
      ?>
    </table>
  </body>
</html>
