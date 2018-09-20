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
        // se ocorrer um erro exibe os detalhes
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'utf8'");
      } catch(PDOException $e){
        echo "Error: ".$e->getMessage();
        exit;
      }
      if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
        $ordem = addslashes($_GET['ordem']);
        $sql = "select * from usuarios order by ".$ordem;
      } else {
        $ordem = '';
        $sql = "select * from usuarios";
      }
    ?>
    <form method="get">
      <select name="ordem" onchange="this.form.submit()">
        <option></option>
        <option value="nome" <?php echo ($ordem=="nome")?'selected':''; ?>>Pelo nome</option>
        <option value="idade" <?php echo ($ordem=="idade")?'selected':''; ?>>Pela idade</option>
      </select>
    </form>

    <table border="1" width="400">
      <tr>
        <th>Nome</th>
        <th>Idade</th>
      </tr>
      <?php

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
