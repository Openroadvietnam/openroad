CREATE TABLE IF NOT EXISTS repositories_management (
	task_id INT NOT NULL AUTO_INCREMENT,
	request_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	repository VARCHAR( 128 ) NOT NULL,
	action VARCHAR( 128 ) NOT NULL,
	p1 LONGTEXT NULL,
	p2 LONGTEXT NULL,
	p3 LONGTEXT NULL,
	result_data LONGTEXT NULL,
	state ENUM( 'todo', 'done', 'failed' ) NOT NULL DEFAULT 'todo',
	action_time TIMESTAMP NULL,
	PRIMARY KEY (task_id)
);
