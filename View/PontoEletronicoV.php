<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Ponto Eletrônico</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #386b8f;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
    }

    .logo {
      width: 250px;
      gap: 30px;
      padding: 15px;
    }

    .inputContainer {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-bottom: 30px;
    }

    .icon {
      width: 35px;
      height: 35px;
      background-color: black;
      padding: 5px;
      border-radius: 5px;
    }

    input {
      padding: 10px;
      width: 250px;
      border: none;
      border-radius: 5px;
      outline: none;
      font-size: 14px;
      box-shadow: 0 0 5px rgba(0, 191, 255, 0.6);
    }

    input:focus {
      box-shadow: 0 0 8px rgba(0, 191, 255, 0.9);
    }

    .botoes {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
    }

    #button {
      padding: 10px 20px;
      width: 100px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      background: linear-gradient(to bottom, #e0e0e0, #a0a0a0);
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    #button:hover {
      background: linear-gradient(to bottom, #f5f5f5, #d0d0d0);
      color: #333;
    }

  </style>
</head>
<body>
  <?php  include_once(__DIR__."/../model/PontoEletronicoDAO.php");?>
  <?php 
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $cpf_raw = $_POST['cpf'] ?? '';
      var_dump( $cpf_raw);
      $cpf = preg_replace('/[.\-\s]/', '', $cpf_raw);
      $_SESSION['cpf'] = $cpf;
      

      require_once __DIR__ . '/../model/PontoEletronicoDAO.php';
  
      $metodos = new PontoEletronicoDAO();
      if ($metodos->selecionar($cpf)) {
         $pontoPassado = array($metodos->selecionar($cpf));
         $pontoPassado = serialize($pontoPassado);
         $_SESSION['pontoPassado'] = $pontoPassado;
         session_write_close();  
          header('Location: VisualizarHorarios.php');
          exit; 
      } else {
          $error = "CPF não encontrado!";
      }
  }
  ?>
  <form id="Cpf" action="PontoEletronicoV.php" method="post">
    <div class="container">
      <img src="../imagens/gsf.png" class="logo">
      <div class="inputContainer">
        <img src="../imagens/usuario.png" class="icon">
        <input type="text" name="cpf" placeholder="Digite seu CPF" value="<?= htmlspecialchars($_POST['cpf'] ?? '') ?>">
      </div>
      <div class="botoes">
        <input type="submit" id="button" value="Confirmar"/>
      </div>
    </div>
  </form>
</body>
</html>
