<ul class="issuetoc">
  <? foreach ($GLOBALS['metadata']['issues'][$issue] as $key => $pair) { ?>
    <li class="issuetoc-entry">
      <h3 class="issuetoc-author"><?= $pair['author'] ?></h3>
      <? foreach (['article', 'lesson'] as $type) { ?>
      <p class="issuetoc-piece is-<?= $type ?>">
        <a <?= (isset($fm) && $fm['key'] == $key && $fm['type'] == $type) ? 'class="current"' : '' ?> href="<?= article_url($issue, $key, $type) ?>">
          <?= $pair[$type]['title'] ?>
        </a>
      </p>
      <? } ?>
    </li>
  <? } ?> 
</ul>