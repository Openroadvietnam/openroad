
/*  Suppression doublon        */
/*  et release inidentifiable  */
delete from qa_answer where uid=13281 and dateanswer=1327591523;
delete from qa_answer where uid=13325;

/* Mise à jour des nid         */
UPDATE qa_answer set nid=42565  WHERE uid=7788 AND dateanswer=1327912341;
UPDATE qa_answer set nid=31122  WHERE uid=10088 AND dateanswer=1325013396;
UPDATE qa_answer set nid=30833  WHERE uid=11471 AND dateanswer=1324834028;
UPDATE qa_answer set nid=31005  WHERE uid=11563 AND dateanswer=1328521539;
UPDATE qa_answer set nid=42522  WHERE uid=11639 AND dateanswer=1328296087;
UPDATE qa_answer set nid=43205  WHERE uid=11749 AND dateanswer=1328420970;
UPDATE qa_answer set nid=43205  WHERE uid=12583 AND dateanswer=1328515872;
UPDATE qa_answer set nid=30630  WHERE uid=13073 AND dateanswer=1325666651;
UPDATE qa_answer set nid=43205  WHERE uid=13201 AND dateanswer=1327144149;
UPDATE qa_answer set nid=31127  WHERE uid=13281 AND dateanswer=1327591402;
UPDATE qa_answer set nid=44167  WHERE uid=13428 AND dateanswer=1328799719;
UPDATE qa_answer set nid=31152  WHERE uid=7668 AND dateanswer=1324489443;
UPDATE qa_answer set nid=43756  WHERE uid=11687 AND dateanswer=1327744659;
UPDATE qa_answer set nid=31151  WHERE uid=12980 AND dateanswer=1325612914;
UPDATE qa_answer set nid=30985  WHERE uid=13254 AND dateanswer=1327283301;
UPDATE qa_answer set nid=30782  WHERE uid=13254 AND dateanswer=1327283466;
