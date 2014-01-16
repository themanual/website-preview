<header class="issue-piece-header">
  
  <? if (array_key_exists('illustrator', $fm['metadata'][$fm['type']])) { ?>
  <div class="issue-piece-header-illustration">
    <figure>
      <img src="<?= illustration_path($fm['issue'], $fm['key'], 'print') ?>" alt="">
    </figure>  
  </div>
  <? } ?>
  
  <div class="issue-piece-header-text">
    <h1 class="issue-piece-header-title"><?= $fm['metadata'][$fm['type']]['title'] ?></h1>
    <h2 class="issue-piece-header-synopsis"><?= $fm['metadata'][$fm['type']]['synopsis'] ?></h2>
    <p  class="issue-piece-header-byline">Written by <strong><?= $fm['metadata']['author'] ?></strong> for <a href="/issues/<?= $fm['issue'] ?>">Issue <?= $fm['issue'] ?></a><? if (array_key_exists('illustrator', $fm['metadata'][$fm['type']])) { ?><span class="middot"> &middot; </span>Illustration by <strong><?= $fm['metadata'][$fm['type']]['illustrator'] ?></strong><? } ?></p>
    
  </div>

</header>