<?php
  function link_ativo($p){
    if(isset($_GET['p']) && $_GET['p'] == $p):
      echo 'class="ativo"';
    endif;
  }
?>

<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills pull-right">
      <li role="presentation" <?php link_ativo('home'); ?> ><a href="index.php?p=home">Home</a></li>
      <li role="presentation" <?php link_ativo('sorteio'); ?> ><a href="?p=sorteio">Sorteio</a></li>
      <li role="presentation" <?php link_ativo('sobre'); ?> ><a href="?p=sobre">sobre</a></li>
      <li role="presentation" <?php link_ativo('dados'); ?> ><a href="?p=dados">Dados</a></li>
    </ul>
  </nav>

  <h3 class="text-muted">
    <p id="hora"></p>
    <h6 id="data"></h6>
  </h3>
</div>