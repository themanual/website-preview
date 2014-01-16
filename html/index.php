<?
  include($_SERVER["DOCUMENT_ROOT"].'/../helpers/lib.php');

  $fm = ['issue' => 4, 'key' => 'wilson', 'type' => 'article'];
  $fm['metadata'] = $GLOBALS['metadata']['issues'][$fm['issue']][$fm['key']];
  $title    = make_title($fm);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
  <!-- Title and Meta -->
  <title>
  <?php 
    if (!isset($GLOBALS['title']) || empty($GLOBALS['title'])) { 
      echo "The Manual";
    } else { 
      echo $GLOBALS['title'] . " · The Manual";
    }
  ?>
  </title>
  
  <!-- JS -->
  <script type="text/javascript" src="//use.typekit.net/wnf5tgz.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" media="screen" href="/assets/css/build/main.min.css" />

  
</head>
<body lang="en">

  <!-- <header class="header"><div class="wrapper">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, iste, consequatur sunt inventore doloribus quo possimus atque qui consequuntur rerum animi dolores optio modi pariatur itaque repudiandae eum laborum officia.
  </div></header> -->

  <main class="issue-<?= $fm['issue'] ?>" role="main">
    
    <!-- Article -->
    <article class="issue-piece is-<?= $fm['type'] ?>"><div>
      <? render_piece_header($fm); ?>
      
      <div class="issue-piece-text">
        <? include($_SERVER["DOCUMENT_ROOT"].'/../data/issues/'.$fm["issue"].'/'.$fm["key"].'/'.$fm["type"].'.php'); ?>
      </div>

      <? render_piece_footer($fm); ?>
    </div></article>

  </main>
  
  <script src="/assets/js/build/main.min.js"></script>
</body>
</html>