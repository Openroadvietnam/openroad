<?php
// $Id$

/**
 * @file
 * FeedsTermProcessor class.
 */

/**
 * Feeds processor plugin. Create taxonomy terms from feed items.
 */
class TermFieldsTermProcessor extends FeedsTermProcessor {
  /**
   * Get id of an existing feed item term if available.
   */
  protected function existingItemId(FeedsImportBatch $batch, FeedsSource $source) {
    $tid = parent::existingItemId($batch, $source);
    
    if ($tid == 0) {
      $storage = term_fields_get_storage();
      
      foreach ($this->uniqueTargets($batch) as $target => $value) {
        if (! empty($storage[$target])) {
          list($column, ) = each($storage[$target]);
          $query = "SELECT tft.tid FROM {term_fields_term} AS tft, {term_fields_instance} AS tfi WHERE tfi.fid = '%s' AND tfi.vid = %d and tft.%s = '%s'";
        
          if ($tid = db_result(db_query($query, $target, $this->vocabulary()->vid, $column, $value))) {
            return $tid;
          }
        }
      }
    }
    
    return $tid;
  }
}
