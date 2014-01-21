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
  <meta name="description" content="<?= $fm['metadata'][$fm['type']]['synopsis'] ?>" />
  
  <!-- Twitter / OG -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@themanual" />
  <meta property="og:site_name" content="The Manual"/>
  <meta property="og:url" content="<?= ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . article_url($fm['issue'], $fm['key'], $fm['type']) ?>" />
  <meta property="og:type" content="article" />
  <meta name="twitter:title" content="<?= $fm['metadata'][$fm['type']]['title'] ?>" />
  <meta property="og:title" content="<?= $fm['metadata'][$fm['type']]['title'] ?>" />
  <meta name="twitter:description" content="<?= $fm['metadata'][$fm['type']]['synopsis'] ?>" />
  <meta property="og:description" content="<?= $fm['metadata'][$fm['type']]['synopsis'] ?>" />
  <meta name="twitter:creator" content="@<?= $fm['metadata']['twitter'] ?>" />
  <meta property="article:author" content="https://www.facebook.com/<?= $fm['metadata']['facebook'] ?>" />
  <meta name="twitter:image:src" content="<?= ($_SERVER['HTTPS']?'https://':'http://').$_SERVER['SERVER_NAME'] . illustration_path($fm['issue'], $fm['key'], 'thumbnail') ?>" />
  <meta property="og:image" content="<?= ($_SERVER['HTTPS']?'https://':'http://').$_SERVER['SERVER_NAME'] . illustration_path($fm['issue'], $fm['key'], 'square') ?>" />
      
  
  <!-- JS -->
  <script type="text/javascript" src="//use.typekit.net/wnf5tgz.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <!-- CSS -->
  <link rel="stylesheet" media="screen" href="/assets/css/build/main.min.css?v1.1" />

  
</head>
<body lang="en">

  <header><div>
    <div class="preview-header">
      <p><strong>Hi there.</strong> This is a preview of an article from Issue #4 of <a href="http://alwaysreadthemanual.com/">The Manual.</a> Wondering where we’ve been? Read about <a href="#">what’s been going on</a>, and <a href="#">what’s coming next.</a></p>
    </div>
  </div></header>

  <main class="issue-<?= $fm['issue'] ?>" role="main">
    
    <!-- Article -->
    <article class="issue-piece is-<?= $fm['type'] ?> hentry"><div>
      <? render_piece_header($fm); ?>
      
      <div class="issue-piece-text entry-content">
        <? include($_SERVER["DOCUMENT_ROOT"].'/../data/issues/'.$fm["issue"].'/'.$fm["key"].'/'.$fm["type"].'.php'); ?>
      </div>

      <? render_piece_footer($fm); ?>
    </div></article>

  </main>

  <footer><div>
    <div class="preview-footer">
      <div class="preview-footer-form">
        <h2>Thanks for reading</h2>
        <p>This is an article from Issue #4 of <a href="http://alwaysreadthemanual.com/">The Manual</a>, coming March 2014.</p>
        <form action="http://campaigns.fiction.co/t/y/s/qtrjtk/" method="post">
          <p>
            <label for="preview-footer-form-email">Sign up to be notified:</label>
            <input type="email" name="cm-qtrjtk-qtrjtk" id="preview-footer-form-email" placeholder="name@domain.com" />&nbsp;<input type="submit" value="Send" />
          </p>
        </form>
      </div>
      <div class="preview-footer-text">
        <h2>Stay in touch</h2>
        <p>Follow along on our <a href="http://blog.alwaysreadthemanual.com/">blog</a>, <a href="https://twitter.com/themanual">Twitter</a>, and <a href="http://dribbble.com/themanual">Dribbble</a> as we share previews and insights from the making of our upcoming website and issues.</p>
      </div>
    </div>
  </div></footer>
  
  <script src="/assets/js/build/main.min.js?v1.0"></script>
</body>
</html>