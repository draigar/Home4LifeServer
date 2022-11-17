<?php
// $Id: news.pages.inc,v 1.6.2.1 2008/02/08 21:15:12 goba Exp $

/**
 * @file
 * Page callback file for the news module.
 */

/**
 * Menu callback; displays a Drupal page containing recent news entries of a given user.
 */
function news_page_user($account) {
  global $user;

  drupal_set_title($title = t("@name's news", array('@name' => $account->name)));

  $items = array();

  if (($account->uid == $user->uid) && user_access('create news entries')) {
    $items[] = l(t('Post new news entry.'), "node/add/news");
  }
  else if ($account->uid == $user->uid) {
    $items[] = t('You are not allowed to post a new news entry.');
  }

  $output = theme('item_list', $items);

  $result = pager_query(db_rewrite_sql("SELECT n.nid, n.sticky, n.created FROM {node} n WHERE n.type = 'news' AND n.uid = %d AND n.status = 1 ORDER BY n.sticky DESC, n.created DESC"), variable_get('default_nodes_main', 10), 0, NULL, $account->uid);
  $has_posts = FALSE;
  
  while ($node = db_fetch_object($result)) {
    $output .= node_view(node_load($node->nid), 1);
    $has_posts = TRUE;
  }
  
  if ($has_posts) {
    $output .= theme('pager', NULL, variable_get('default_nodes_main', 10));
  }
  else {
    if ($account->uid == $user->uid) {
      drupal_set_message(t('You have not created any news entries.'));
    }
    else {
      drupal_set_message(t('!author has not created any news entries.', array('!author' => theme('username', $account))));
    }
  }
  drupal_add_feed(url('news/'. $account->uid .'/feed'), t('RSS - !title', array('!title' => $title)));

  return $output;
}

/**
 * Menu callback; displays a Drupal page containing recent news entries of all users.
 */
function news_page_last() {
  global $user;

  $output = '';
  $items = array();

  if (user_access('edit own news')) {
    $items[] = l(t('Create new news entry.'), "node/add/news");
  }

  $output = theme('item_list', $items);

  $result = pager_query(db_rewrite_sql("SELECT n.nid, n.created FROM {node} n WHERE n.type = 'news' AND n.status = 1 ORDER BY n.sticky DESC, n.created DESC"), variable_get('default_nodes_main', 10));
  $has_posts = FALSE;

  while ($node = db_fetch_object($result)) {
    $output .= node_view(node_load($node->nid), 1);
    $has_posts = TRUE;
  }
  
  if ($has_posts) {
    $output .= theme('pager', NULL, variable_get('default_nodes_main', 10));
  }
  else {
    drupal_set_message(t('No news entries have been created.'));
  }
  drupal_add_feed(url('news/feed'), t('RSS - newss'));

  return $output;
}

/**
 * Menu callback; displays an RSS feed containing recent news entries of a given user.
 */
function news_feed_user($account) {
  $result = db_query_range(db_rewrite_sql("SELECT n.nid, n.created FROM {node} n  WHERE n.type = 'news' AND n.uid = %d AND n.status = 1 ORDER BY n.created DESC"), $account->uid, 0, variable_get('feed_default_items', 10));
  $channel['title'] = $account->name ."'s news";
  $channel['link'] = url('news/'. $account->uid, array('absolute' => TRUE));

  $items = array();
  while ($row = db_fetch_object($result)) {
    $items[] = $row->nid;
  }
  node_feed($items, $channel);
}

/**
 * Menu callback; displays an RSS feed containing recent news entries of all users.
 */
function news_feed_last() {
  $result = db_query_range(db_rewrite_sql("SELECT n.nid, n.created FROM {node} n WHERE n.type = 'news' AND n.status = 1 ORDER BY n.created DESC"), 0, variable_get('feed_default_items', 10));
  $channel['title'] = variable_get('site_name', 'Drupal') .' newss';
  $channel['link'] = url('news', array('absolute' => TRUE));

  $items = array();
  while ($row = db_fetch_object($result)) {
    $items[] = $row->nid;
  }

  node_feed($items, $channel);
}
