<?php $arquivo = new Arquivo(); ?>
<div class="jumbotron">

  <h1>Como participar</h1>

    <p>
      <?php $arquivo->open_file('txt/como_participar.txt','r'); $arquivo->read_file();?>
    </p>
  
</div><!-- //jumbotron -->