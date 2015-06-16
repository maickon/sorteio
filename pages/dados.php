<div class="jumbotron">

  <h1>Rolador de dados</h1>

  <input type="text" class="form-control" readonly id="campo" name="campo" />
  <div id="config">
    <br>
    <br>
    <?php $dados_list_1 = array('d4','d6','d8'); ?>
    <div class="row">
      <?php foreach($dados_list_1 as $dado):?>
        <div class="col-lg-4">
          <a href="#" class="roll_link">
            <img src=<?php echo "dados-icon/{$dado}.png"?> onclick=<?php echo "rolar('{$dado}');" ?> class="roll">
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <br>
    <br>

    <?php $dados_list_2 = array('d10','d12','d20'); ?>
    <div class="row">
      <?php foreach($dados_list_2 as $dado):?>
        <div class="col-lg-4">
          <a href="#" class="roll_link">
            <img src=<?php echo "dados-icon/{$dado}.png"?> onclick=<?php echo "rolar('{$dado}');" ?> class="roll">
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <br>
    
    <div class="row">
      <span id="dado_rolado"></span>
    </div>
  </div>
  
</div><!-- //jumbotron -->