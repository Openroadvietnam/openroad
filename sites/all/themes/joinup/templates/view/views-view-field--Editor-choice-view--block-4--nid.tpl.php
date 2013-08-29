<?php
    //https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
    // 
    $title_lenght = strlen($row->node_title);
    if($title_lenght < 45){//One line title
        $body_lenght = 500;
    }else{
        if($title_lenght < 95){//Two lines title
            $body_lenght = 400;
        }else{//Three lines title
            $body_lenght = 300;
        }
    }
    $body = truncate_utf8(strip_tags($row->node_revisions_body), $body_lenght, FALSE, FALSE);
    $body_title = truncate_utf8($row->node_title, 150, FALSE, FALSE);
    $tabs_title = truncate_utf8($row->node_title, 70, FALSE, FALSE);
?>
<div class="news-tab">
    <em class="content-type"><?php echo node_get_types('name', $row->node_type) ?></em>
    <strong class="title"><?php echo $tabs_title ?></strong>
</div>
<div class="news-body">
    <div class="toptitle-wrapper clearfix">
		<strong class="toptitle"><?php echo t("What's new") ?></strong>
		<em class="editor"><?php echo t("Editor's choice") ?></em>
		<h3 class="body-title"><?php echo $body_title?></h3>
	</div>
	<div class="body-type <?php echo str_replace("_", "-" , $row->node_type) ?>-icon"><?php echo node_get_types('name', $row->node_type) ?></div>	
	<div class="body-fivestars"><?php echo theme('fivestar_static', $row->votingapi_cache_node_value * 10);?></div>
    <div class="body-teaser"><?php echo trim($body)  ?>;</div>
    <div class="body-more"><?php echo l( t('Read more') , 'node/' . $row->nid )?></div>
</div>