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

        case 'cadastro': require_once 'pages/cadastro.php';
        break;

        case 'contratacao': require_once 'pages/pagamento.php';
        break;

        case 'inscritos': require_once 'pages/inscritos.php';
        break;

        default: require_once 'pages/home.php';
        break;
      endswitch;
    else:
        require_once 'pages/home.php';
    endif;
  ?>  

<?php require_once 'footer.php' ?>