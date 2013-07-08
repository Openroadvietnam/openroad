UPDATE term_hierarchy, term_data SET parent = 0
WHERE term_data.tid = term_hierarchy.tid AND term_data.vid = 10 AND parent <> 0;