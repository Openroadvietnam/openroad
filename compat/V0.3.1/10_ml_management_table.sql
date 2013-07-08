-- for action ml_creation:
--   * p1 is the mail address of the owner 
--   * p2 is a serialized array associating mailman options with their desired
-- values; this will be used to override the default configuration options
-- declared in the ml creation batch
--   * p3 is a serialized array listing initial members to be subscribed to the newly created list
CREATE TABLE IF NOT EXISTS ml_management (
	task_id INT NOT NULL AUTO_INCREMENT,
	request_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	ml VARCHAR( 128 ) NOT NULL,
	action VARCHAR( 128 ) NOT NULL,
	p1 LONGTEXT NULL,
	p2 LONGTEXT NULL,
	p3 LONGTEXT NULL,
	result_data LONGTEXT NULL,
	state ENUM( 'todo', 'done', 'failed' ) NOT NULL DEFAULT 'todo',
	action_time TIMESTAMP NULL,
	PRIMARY KEY (task_id)
);
