UPDATE vocabulary SET name = 'Licence', description = 'List of licence' WHERE vid = 33;
DELETE FROM term_data WHERE tid = '914';
UPDATE term_data SET name = 'European Union Public Licence (EUPL)' WHERE tid = 910;