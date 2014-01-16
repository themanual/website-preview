<?
  include($_SERVER["DOCUMENT_ROOT"].'/../helpers/lib.php');

  $fm = extract_frontmatter();
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
  
  <!-- Twitter / OG -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@themanual">
  <meta property="og:site_name" content="The Manual"/>
  <meta property="og:url" content="<?= ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . article_url($fm['issue'], $fm['key'], $fm['type']) ?>">
  <meta property="og:type" content="article" />
  <meta name="twitter:title" content="<?= $fm['metadata'][$fm['type']]['title'] ?>">
  <meta property="og:title" content="<?= $fm['metadata'][$fm['type']]['title'] ?>" />
  <meta name="twitter:description" content="<?= $fm['metadata'][$fm['type']]['synopsis'] ?>">
  <meta property="og:description" content="<?= $fm['metadata'][$fm['type']]['synopsis'] ?>" />
  <meta name="twitter:creator" content="@<?= $fm['metadata']['twitter'] ?>">
  
  <meta property="article:author" content="<?= $fm['metadata']['author'] ?>" />
  <meta property="article:author" content="https://www.facebook.com/<?= $fm['metadata']['facebook'] ?>" />

  <meta name="twitter:image:src" content="<?= ($_SERVER['HTTPS']?'https://':'http://').$_SERVER['SERVER_NAME'] . illustration_path($fm['issue'], $fm['key'], 'print') ?>">
  <meta property="og:image" content="<?= ($_SERVER['HTTPS']?'https://':'http://').$_SERVER['SERVER_NAME'] . illustration_path($fm['issue'], $fm['key'], 'print') ?>"/>
      
  
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