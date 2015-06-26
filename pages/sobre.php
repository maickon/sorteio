<?php require_once 'class/arquivos.class.php'; ?>
<?php $arquivo = new Arquivo(); ?>
<div class="jumbotron">
  <div class="container">
    <div class="blog-header">
      <?php $arquivo->open_file('txt/sobre.txt','r'); $arquivo->read_file();?>
    </div>
  </div>
</div>