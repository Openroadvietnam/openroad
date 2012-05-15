CREATE TABLE IF NOT EXISTS web_directories (
  web_id int(11) NOT NULL AUTO_INCREMENT,
  request_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  name varchar(128) NOT NULL,
  nid int(10) UNSIGNED NOT NULL,
  public_access enum('enabled', 'disabled') NOT NULL DEFAULT 'enabled',
  state enum('todo','done','failed') NOT NULL DEFAULT 'todo',
  action_time timestamp NULL DEFAULT NULL,
  action_data longtext DEFAULT NULL,
  PRIMARY KEY (web_id),
  CONSTRAINT UNIQUE (name)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table describes existing web directories related to projects.';

ALTER TABLE `content_type_project_project`
  DROP `field_project_display_webdav_value`;

INSERT INTO `web_directories` (`request_time`, `name`, `nid`, `public_access`, `state`)
SELECT CURRENT_TIMESTAMP , project_projects.uri , project_projects.nid , 'disabled' , 'todo' from project_projects WHERE project_projects.nid NOT IN  (select nid from web_directories);
