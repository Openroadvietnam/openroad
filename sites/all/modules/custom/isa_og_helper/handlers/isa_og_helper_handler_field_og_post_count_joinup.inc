<?php
//Most active block algorithm
/**
 * We do not try to run db_rewrite_sql() on this subquery so the count is potentially more than the user can see.
 */
class isa_og_helper_handler_field_og_post_count_joinup extends views_handler_field_numeric {
  function query() {
    $table = $this->query->ensure_table('og');
    $sql = "SELECT COUNT(n.nid) FROM {node} n INNER JOIN {og_ancestry} oga ON n.nid = oga.nid WHERE n.status = 1 AND oga.group_nid = %d AND n.type NOT IN ('topic') ";
    $sql = str_replace('%d', 'og.nid', $sql);
    $this->query->add_field('', "($sql)", 'post_count_joinup');
    $this->field_alias = 'post_count_joinup';
  }
}