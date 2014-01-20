<header class="issue-piece-header">
  
  <? if (array_key_exists('illustrator', $fm['metadata'][$fm['type']])) { ?>
  <div class="issue-piece-header-illustration">
    <figure>
      <img src="<?= illustration_path($fm['issue'], $fm['key'], 'print') ?>" alt="">
    </figure>  
  </div>
  <? } ?>
  
  <div class="issue-piece-header-text">
    <h1 class="issue-piece-header-title entry-title"><?= $fm['metadata'][$fm['type']]['title'] ?></h1>
    <h2 class="issue-piece-header-synopsis entry-summary"><?= $fm['metadata'][$fm['type']]['synopsis'] ?></h2>
    <p  class="issue-piece-header-byline byline vcard ">Written by <strong class="fn author" rel="author"><?= $fm['metadata']['author'] ?></strong> for <strong class="issue-current">Issue <?= $fm['issue'] ?></strong><? if (array_key_exists('illustrator', $fm['metadata'][$fm['type']])) { ?><span class="middot"> &middot; </span>Illustration by <strong><?= $fm['metadata'][$fm['type']]['illustrator'] ?></strong><? } ?></p>
    
  </div>

</header>