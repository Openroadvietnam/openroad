<?php
/**
 * @file isa_simple_solr_toolbox_template.tpl.php
 * Template for the custom solr sort toolbox
 *
 *  Available variables:
 *      .- $current: current sort
 *      .- $sort_types: available sorts
 *      .- $sort_default: default sort 
 *      .- $url: current url
 */
?>
<div id="solr-sort-tollbox">
    <div class="toolbox-title"><?php echo t('Sort by') ?>: </div>
    <?php foreach($sort_types as $key => $value): ?>
        <?php foreach($value as $sub_key => $sub_value): ?>
            <div class="<?php echo $sub_value['sort'] ?> <?php echo $sub_key == $current[0] ? 'active' : '' ?>">
                <?php
                    $sub_value['param'] == $current[0] ? ($sub_value['sort'] =='asc' ? $sort = 'desc' : $sort = 'asc') : $sort = $sub_value['sort'];
                    $options  = array(
                        'query' => array(
                            'solrsort' => $sub_value['param'] . " " . $sort
                        )    
                    );
                    isset($url['filters']) ? $options['query']['filters']  = $url['filters']: FALSE;
                    echo l($sub_value['name'], $url['q'], $options);
                ?>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
