<div class="featured_piece">
  <figure class="featured_piece-illo">
    <img src="<?= illustration_path($featured_piece['issue'], $featured_piece['key'], 'small') ?>" alt="" />
  </figure>
  <div class="featured_piece-text">
    <h3 class="featured_piece-title">
      <a href="<?= article_url($featured_piece['issue'], $featured_piece['key'], 'article') ?>"><?= $featured_piece['fm']['article']['title'] ?></a>
    </h3>
    <blockquote class="featured_piece-synopsis">
      <p><?= $featured_piece['fm']['article']['synopsis'] ?></p>
    </blockquote>
    <p class="featured_piece-author">By <?= $featured_piece['fm']['author'] ?></p>
  </div>
</div>