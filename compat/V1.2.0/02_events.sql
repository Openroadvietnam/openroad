-- delete useless fees descriptions
UPDATE `content_type_event`, `term_node` SET `field_event_fees_description_value` = NULL
WHERE  content_type_event.nid = term_node.nid
AND content_type_event.vid = term_node.vid
AND term_node.tid = 1574;