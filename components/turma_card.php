<?php
$render = function ($props) {
?>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?php echo $props["nome"] ?></h3>
    </div>
    <p class="card-text">
      <?php echo $props["descricao"] ?>
    </p>
    <input type="button" onclick="() => enrollClass(<?php echo $props['id'] ?>)" value="Matricular-se" />
  </div>
<?php
}
?>
<script src="components/assunto_card.js"></script>
<style>
  .card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 16px;
    max-width: 300px;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: white;
  }

  .card-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    background-color: #e0e0e0;
    border-radius: 50%;
    color: #000;
    font-size: 14px;
    font-weight: bold;
    margin-right: 8px;
  }

  .card-title {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
  }

  .card-text {
    font-size: 14px;
    color: #666;
    margin-top: 8px;
  }

  .card-header {
    display: flex;
    align-items: center;
  }
</style>