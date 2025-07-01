<?php
session_start();
require_once '../model/PontoEletronico.php';
include_once(__DIR__."/../model/PontoEletronicoDAO.php");
require_once __DIR__ . '/../model/PontoEletronicoDAO.php';

//die(var_dump($_SESSION));
if (empty($_SESSION['cpf'])) {
    header('Location: PontoEletronicoV.php');
    exit;
}

$cpf = $_SESSION['cpf'];
$metodo = new PontoEletronicoDAO();

if (isset($_GET['mes'])) {
    $mesSelecionado = $_GET['mes'];
    if($_GET['mes'] === '00'){
      $ponto = $metodo->selecionar($cpf);
    }else{
      $ponto = $metodo->selecionarMes($cpf, $mesSelecionado);
      if(empty($ponto)){
        $ponto = $metodo->selecionar($cpf);
        echo "<script>alert('Nenhum registro encontrado para este mês!');</script>";
      }
    }
    $_SESSION['pontoPassado'] = serialize($ponto);
} else {
    // Usa o que já estava na sessão (padrão)
    $ponto = unserialize($_SESSION['pontoPassado']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Visualizar Horários</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box; /* Inclui padding e borda no tamanho total dos elementos */
    }

    html, body {
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: #2c6b8f;
      color: white;
    }

    .main {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .top-section {
      background-color: #2c6b8f;
      color: white;
      padding: 30px 25px;
    }

     .filter-bar {
      display: flex; 
      justify-content: flex-start; 
      align-items: center; 
      gap: 25px; 
     }
     

    .filter-bar label {
      font-size: 25px;
      font-weight: bold;
    }

    .filter-bar select {
      padding: 8px; 
      font-size: 16px; 
      width: 150px; 
      border-radius: 4px;
      border: 1px solid #ccc;
      color: #000;
      background: linear-gradient(to bottom, #f9f9f9, #eaeaea); /* fundo estilo Windows */
      outline: none; /* remove o foco padrão do navegador */
      box-shadow: 0 0 5px rgba(0, 191, 255, 0.6); /* mesma luz azul do input */
      transition: box-shadow 0.2s ease-in-out, border 0.2s ease-in-out;
    }
    
    .filter-bar select:focus {
      box-shadow: 0 0 8px rgba(0, 191, 255, 0.9);
    }


    .filter-bar button {
      padding: 6px 10px; 
      font-size: 13px; 
      font-weight: bold;
      background: linear-gradient(to bottom, #f0f0f0, #dcdcdc);
      border: 1px solid #a0a0a0;
      border-radius: 4px;
      cursor: pointer;
      color: #1a4e80; 
      box-shadow: inset 0 1px 0 #fff;
    }
  
    .filter-bar button:hover {
      background: linear-gradient(to bottom, #e0e0e0, #c0c0c0); /* escurece ao passar o mouse */
    }

    .Tabela {
      flex: 1;
      overflow-y: auto;
      background-color: white; 
    }

    table {
      width: 100vw;
      height: 100%;
      border-collapse: collapse;
      table-layout: fixed;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
      height: 40px;
    }

    th {
      background-color: #ddd; 
      color: #000000;      
    }

    td {
      background-color: #ffffff;
      color: #000;
    }

    tr:nth-child(even) td {
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>
  <div class="main">
    <div class="top-section">
      <div class="filter-bar">
        <form method="GET" action="VisualizarHorarios.php">
          <label for="mes">Mês:</label>
          <select name="mes" id="mes">
            <option value="00" <?= ($_GET['mes'] ?? '') === '00' ? 'selected' : '' ?>></option>
            <option value="01" <?= ($_GET['mes'] ?? '') === '01' ? 'selected' : '' ?>>Janeiro</option>
            <option value="02" <?= ($_GET['mes'] ?? '') === '02' ? 'selected' : '' ?>>Fevereiro</option>
            <option value="03" <?= ($_GET['mes'] ?? '') === '03' ? 'selected' : '' ?>>Março</option>
            <option value="04" <?= ($_GET['mes'] ?? '') === '04' ? 'selected' : '' ?>>Abril</option>
            <option value="05" <?= ($_GET['mes'] ?? '') === '05' ? 'selected' : '' ?>>Maio</option>
            <option value="06" <?= ($_GET['mes'] ?? '') === '06' ? 'selected' : '' ?>>Junho</option>
            <option value="07" <?= ($_GET['mes'] ?? '') === '07' ? 'selected' : '' ?>>Julho</option>
            <option value="08" <?= ($_GET['mes'] ?? '') === '08' ? 'selected' : '' ?>>Agosto</option>
            <option value="09" <?= ($_GET['mes'] ?? '') === '09' ? 'selected' : '' ?>>Setembro</option>
            <option value="10" <?= ($_GET['mes'] ?? '') === '10' ? 'selected' : '' ?>>Outubro</option>
            <option value="11" <?= ($_GET['mes'] ?? '') === '11' ? 'selected' : '' ?>>Novembro</option>
            <option value="12" <?= ($_GET['mes'] ?? '') === '12' ? 'selected' : '' ?>>Dezembro</option>
          </select>
          <button type="submit">Buscar</button>
        </form>
      </div>
    </div>
    <div class="Tabela">
      <table>
        <thead>
          <tr>
            <th>Data</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Salário Diário</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ponto as $p): ?>
            <tr>
              <td><?= date('d/m/Y', strtotime($p->getDataRegistro())) ?></td>
              <td><?= $p->getHorarioEntradaM() ?? '' ?></td>
              <td><?= $p->getHorarioSaidaM() ?? '' ?></td>
              <td><?= $p->getHorarioEntradaV() ?? '' ?></td>
              <td><?= $p->getHorarioSaidaV() ?? '' ?></td>
              <td><?= $p->getHorarioEntradaEx() ?? '' ?></td>
              <td><?= $p->getHorarioSaidaEx() ?? '' ?></td>
              <td><?= $p->getSalarioDoDia() ?? '' ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
