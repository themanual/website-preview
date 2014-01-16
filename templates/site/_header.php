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

  <header class="header"><div class="wrapper">

    <nav class="header-nav">
      <h1 class="header-nav-logo"><a href="/">The Manual</a></h1>  
      <ul class="header-nav-menu">
        <li <?= page_is_subpath_of("/issues") ? 'class="has-dropdown is-current"' : 'class="has-dropdown"'; ?>>
          <a href="/issues">Issues</a>
          <ul class="header-nav-menu-item-dropdown">
          <?php foreach (array_reverse($GLOBALS['metadata']['published_issues']) as $i): ?>
            <li class="issue-<?= $i ?>"><a href="<?= issue_url($i) ?>">Issue <strong><?= $i ?></strong></a></li>
          <?php endforeach ?>
          <li class="all-issues"><a href="/issues">All Issues</a></li>
          </ul>
        </li>
        <li <?= page_is_subpath_of("/periodical", 'class="is-current"') ?> >
          <a href="#">Periodical</a>
        </li>
        <li <?= page_is_subpath_of("/store", 'class="is-current"') ?> >
          <a href="#">Store</a>
        </li>
        <li <?= page_is_subpath_of("/blog", 'class="is-current"') ?> >
          <a href="/blog">Blog</a>
        </li>
      </ul>
      <span class="subscribe"><a href="#">Buy</a> or <a href="#">Subscribe</a></span>
    </nav>

  </div></header>