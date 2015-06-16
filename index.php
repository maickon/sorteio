<?php require_once 'header.php' ?>
  
  <?php 
    if(isset($_GET['p'])):
      switch($_GET['p']):

        case 'home': require_once 'pages/home.php';
        break;

        case 'dados': require_once 'pages/dados.php';
        break;

        case 'sobre': require_once 'pages/sobre.php';
        break;

        case 'sorteio': require_once 'pages/sorteio.php';
        break;

        default: require_once 'pages/home.php';
        break;
      endswitch;
    endif;
  ?>  

<?php require_once 'footer.php' ?>