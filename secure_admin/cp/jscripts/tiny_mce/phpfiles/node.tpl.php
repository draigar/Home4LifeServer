<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<h1 class="title"><?php print $title ?></a></h1>

<?php if ($node->type!="news" && $node->type!="simplenews" && ( $submitted || $terms)): ?>
  <div class="meta">
  <?php if ($submitted): ?>
    <div class="submitted"><?php print $submitted ?></div>
  <?php endif; ?>
  </div>
<?php elseif ($node->type=="news" || $node->type=="simplenews"): ?>
  <div class="meta">
    <div class="submitted"><?php print format_date($node->created) ?></div>
  </div>
<?php endif; ?>

  <div id="nodecontent" style="margin-top:5px;">
    <?php print $picture ?>
    <?php print $content ?>
  </div>
<?php
  if ($links) {
  	if($node->type!="news")
	  print '<div class="right" style="float:right">'. $links .'</div>';
	elseif(strstr($links,'Read more'))  
	  print '<div class="right" style="float:right"><a href="/demo/bible2/node/'.$node->nid.'" title="'.$title.'">Read more</a></div><p>&nbsp;</p><p>&nbsp;</p>';
  }
  if ($node->type!="simplenews" && $terms) {
    print '<div class="terms">'.t('Tags').': '. $terms .'</div>';
  }
  global $varsimplenews;
  if($node->type=="simplenews") $varsimplenews="1";
?>
</div>