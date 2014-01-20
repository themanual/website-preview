<?

include_once($_SERVER["DOCUMENT_ROOT"].'/../helpers/metadata.php');






// Helpers

function extract_frontmatter()
{
  $path     = array_filter(explode('/', strtok($_SERVER['REQUEST_URI'], '?')));
  $fm = [
    'issue'    => intval($path[2]),
    'key'      => $path[3],
    'type'     => $path[4]
  ];
  $fm['metadata'] = $GLOBALS['metadata']['issues'][$fm['issue']][$fm['key']];
  return $fm;
}

function make_title($fm) {
  $title = $fm['metadata'][$fm['type']]['title'];
  return $title . ", by " . $fm['metadata']['author'] . ' · Issue ' . $fm['issue'];
}

function illustration_path($issue, $key, $variant, $extension = 'png') {
  return '/assets/images/illustrations/issues/'.$issue.'/'.$key.'/'.$variant.'.'.$extension;
}

function portrait_path($issue, $key) {
  return '/assets/images/authors/issues/'.$issue.'/'.$key.'.jpg';
}

function article_url($issue, $key, $type) {
  return "/issues/{$issue}/{$key}/{$type}";
}

function sibling_key($needle, $haystack, $mode) {
  reset($haystack);
  while(key($haystack) !== NULL && current($haystack) !== $needle) { next($haystack); }
  if      ($mode == 'prev') { prev($haystack); }
  else if ($mode == 'next') { next($haystack); }

  return current($haystack);
}

function next_article($fm) {

  if ($fm['type'] == 'article') {
    return [
      'issue'  => $fm['issue'],
      'key'    => $fm['key'],
      'type'   => 'lesson'
    ];
  }

  if ($fm['type'] == 'lesson') {
    $keys = array_keys($GLOBALS['metadata']['issues'][$fm['issue']]);
    $key  = sibling_key($fm['key'], $keys, 'next');
    if ($key) {
      return [
        'issue'  => $fm['issue'],
        'key'    => $key,
        'type'   => 'article'
      ];
    }
  }

  return NULL;

}

function prev_article($fm) {

  if ($fm['type'] == 'lesson') {
    return [
      'issue'  => $fm['issue'],
      'key'    => $fm['key'],
      'type'   => 'article'
    ];
  }

  if ($fm['type'] == 'article') {
    $keys = array_keys($GLOBALS['metadata']['issues'][$fm['issue']]);
    $key  = sibling_key($fm['key'], $keys, 'prev');
    if ($key) {
      return [
        'issue'  => $fm['issue'],
        'key'    => $key,
        'type'   => 'lesson'
      ];
    }
  }

  return NULL;
  
}


function issue_url($issue) {
  return "/issues/{$issue}";
}

function issue_link($issue, $text = 'Issue') {
  return '<a class="issue-'.$issue.'" href="'.issue_url($issue).'">'.$text.' '.$issue.'</a>';
}

function page_is_subpath_of($root, $output = NULL) {
  $pattern = "/^".preg_quote($root, "/")."((\/|\?).*)?$/";
  $matches = preg_match($pattern, $_SERVER['REQUEST_URI']);
  if ($output) {
    if ($matches) { return $output; }
    else { return ""; }
  }
  else {
    return $matches;
  }
}

function prosperize($name) {
  $names = explode(' ', $name);
  $first_name = $names[0];
  if (strtolower($names[0]) == 'the' ) { $first_name = $name; }
  return $first_name.'’'.($first_name[strlen($first_name) - 1] != 's' ? 's' : '');
}










// Rendering

function render_site_header() {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/site/_header.php');
}

function render_site_footer() {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/site/_footer.php');
}


function render_piece_header($fm) {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/piece/_header.php');
}

function render_piece_footer($fm) {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/piece/_footer.php');
}

function render_issue_toc($issue, $fm = NULL) {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/modules/issuetoc.php');
}

function render_issuebuy_options($render_subscription = true) {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/modules/issuebuy-options.php');
}

function render_featured_piece($featured_piece) {
  include($_SERVER["DOCUMENT_ROOT"].'/../templates/modules/featured_piece.php');
}

function random_piece($fm) {
  do {
    $issue = array_rand($GLOBALS['metadata']['issues']);
  } while ($issue == $fm['issue'] || !in_array($issue, $GLOBALS['metadata']['published_issues']));
  $key = array_rand($GLOBALS['metadata']['issues'][$issue]);
  
  return ['issue' => $issue, 'key' => $key, 'fm' => $GLOBALS['metadata']['issues'][$issue][$key]];
}

?>