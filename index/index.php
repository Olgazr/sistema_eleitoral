<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database/database.php';

$result = $con->query("SELECT * FROM candidatos ORDER BY nome ASC");
$candidatos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lista de Candidatos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
  <div class="container py-4">
    <h1 class="mb-4">Lista de Candidatos</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCandidato">
      Adicionar candidato
    </button>

    <div class="modal fade" id="modalCandidato" tabindex="-1" aria-labelledby="modalCandidatoLabel" aria-hidden="true">
      <div class="modal-dialog">
      <<form action="adicionar_candidato.php" method="POST" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCandidatoLabel">Adicionar Candidato</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="mb-3">
              <label for="partido" class="form-label">Partido</label>
              <input type="text" class="form-control" name="partido" id="partido" required>
            </div>
          <div class="mb-3">
              <label for="imagem" class="form-label">URL da Imagem</label>
              <input type="url" class="form-control" name="imagem" id="imagem">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row mt-4">
      <?php if (count($candidatos) === 0): ?>
        <p>Nenhum candidato cadastrado ainda.</p>
      <?php else: ?>
        <?php foreach ($candidatos as $cand): ?>
          <div class="col-md-4 mb-3">
            <div class="card">
            <img src="<?= htmlspecialchars($cand['imagem'] ?? 'https://via.placeholder.com/150') ?>" class="card-img-top" alt="<?= htmlspecialchars($cand['nome']) ?>">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($cand['nome']) ?></h5>
                <p class="card-text">Partido: <?= htmlspecialchars($cand['partido']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
