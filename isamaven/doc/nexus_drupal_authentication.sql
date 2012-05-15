DELIMITER | 

-- list every project-scope known role, i.e. the "developer" and "release manager" roles for each project.
DROP PROCEDURE IF EXISTS listRoles |
CREATE PROCEDURE listRoles()
BEGIN
  SELECT *
  FROM (
    SELECT CONCAT(uri, '_developer')        AS rid, CONCAT(title, ' project developer') AS name FROM project_projects INNER JOIN node USING (nid)
    UNION
    SELECT CONCAT(uri, '_release_manager')  AS rid, CONCAT(title, ' release manager')   AS name FROM project_projects INNER JOIN node USING (nid)
    UNION
    SELECT CONCAT(uri, '_owner')            AS rid, CONCAT(title, ' project owner')     AS name FROM project_projects INNER JOIN node USING (nid)
    UNION
    SELECT 'drupal_authenticated', 'Authenticated user Drupal'
  ) roles_available
  ORDER BY rid ASC;
END |

-- list a specific role
DROP PROCEDURE IF EXISTS getRole |
CREATE PROCEDURE getRole (IN role_id VARCHAR(64))
BEGIN
  SELECT *
  FROM (
    SELECT CONCAT(uri, '_developer')        AS rid, CONCAT(title, ' project developer') AS name FROM project_projects INNER JOIN node USING (nid)
    UNION
    SELECT CONCAT(uri, '_release_manager')  AS rid, CONCAT(title, ' release manager')   AS name FROM project_projects INNER JOIN node USING (nid)
    UNION
    SELECT CONCAT(uri, '_owner')            AS rid, CONCAT(title, ' project owner')     AS name FROM project_projects INNER JOIN node USING (nid)
    UNION
    SELECT 'drupal_authenticated', 'Authenticated user Drupal'
  ) roles_available
  WHERE rid = role_id;
END |

-- list ids of every Drupal user having a content profile
DROP PROCEDURE IF EXISTS listUserIds |
CREATE PROCEDURE listUserIds()
BEGIN
  SELECT name
  FROM users
  INNER JOIN node ON users.uid = node.uid AND node.type = 'profile'
  INNER JOIN content_type_profile USING (nid, vid);
END |

DROP PROCEDURE IF EXISTS listUsers |
CREATE PROCEDURE listUsers()
BEGIN
  SELECT
    users.name,
    content_type_profile.field_firstname_value AS firstname,
    content_type_profile.field_lastname_value  AS lastname,
    users.mail AS email,
    roles_join.final_rid AS rid
  FROM users 
  -- we restrict users to those having a content profile
  INNER JOIN node profile_nodes ON profile_nodes.type = 'profile' AND users.uid = profile_nodes.uid 
  INNER JOIN content_type_profile ON profile_nodes.nid = content_type_profile.nid AND profile_nodes.vid = content_type_profile.vid
  -- for each user, we add...
  LEFT JOIN (
    -- ... his owner roles
    SELECT
      projects_nodes.uid AS uid,
      CONCAT(project_projects.uri, '_owner') AS final_rid
    FROM node projects_nodes
    INNER JOIN project_projects ON projects_nodes.nid = project_projects.nid
    WHERE projects_nodes.type = 'project_project'

    UNION

    -- ... and his developer or release manager roles
    SELECT
      group_roles.uid AS uid,
      CONCAT(project_projects.uri, '_', REPLACE( role.name, ' ', '_') ) AS final_rid
    -- we also need projects nodes
    FROM node projects_nodes
    INNER JOIN project_projects USING (nid)
    -- we want to get developers roles within our selected projects
    INNER JOIN og_users_roles group_roles ON projects_nodes.nid = group_roles.gid AND (group_roles.rid = 9 OR group_roles.rid = 17)
	INNER JOIN role USING (rid)
    WHERE projects_nodes.type = 'project_project'
  ) roles_join ON users.uid = roles_join.uid

    UNION
    SELECT 'drupal_authenticated', 'Authenticated', 'Drupal', '', 'drupal_authenticated';

END |

DROP PROCEDURE IF EXISTS getUser |
CREATE PROCEDURE getUser(IN username VARCHAR(60))
BEGIN
  SELECT
    users.name,
    content_type_profile.field_firstname_value AS firstname,
    content_type_profile.field_lastname_value  AS lastname,
    users.mail AS email,
    roles_join.final_rid AS rid
  FROM users 
  -- we restrict users to those having a content profile
  INNER JOIN node profile_nodes ON profile_nodes.type = 'profile' AND users.uid = profile_nodes.uid 
  INNER JOIN content_type_profile ON profile_nodes.nid = content_type_profile.nid AND profile_nodes.vid = content_type_profile.vid
  -- for each user, we add...
  LEFT JOIN (
    -- ... his owner roles
    SELECT
      projects_nodes.uid AS uid,
      CONCAT(project_projects.uri, '_owner') AS final_rid
    FROM node projects_nodes
    INNER JOIN project_projects ON projects_nodes.nid = project_projects.nid
    WHERE projects_nodes.type = 'project_project'

    UNION

    -- ... his developer or release manager roles
    SELECT
      group_roles.uid AS uid,
      CONCAT(project_projects.uri, '_', REPLACE( role.name, ' ', '_') ) AS final_rid
    -- we also need projects nodes
    FROM node projects_nodes
    INNER JOIN project_projects USING (nid)
    -- we want to get developers roles within our selected projects
    INNER JOIN og_users_roles group_roles ON projects_nodes.nid = group_roles.gid AND (group_roles.rid = 9 OR group_roles.rid = 17)
	INNER JOIN role USING (rid)
    WHERE projects_nodes.type = 'project_project'

    UNION
    SELECT users.uid, 'drupal_authenticated' AS final_rid FROM users WHERE name = username

  ) roles_join ON users.uid = roles_join.uid
  WHERE name = username;
END |

DROP PROCEDURE IF EXISTS searchUsers |
CREATE PROCEDURE searchUsers (IN username_prefix VARCHAR(60), IN mail_prefix VARCHAR(100), IN role_id VARCHAR(60))
BEGIN
  SELECT
    users.name,
    content_type_profile.field_firstname_value AS firstname,
    content_type_profile.field_lastname_value  AS lastname,
    users.mail AS email,
    roles_join.final_rid AS rid
  FROM users 
  -- we restrict users to those having a content profile
  INNER JOIN node profile_nodes ON profile_nodes.type = 'profile' AND users.uid = profile_nodes.uid 
  INNER JOIN content_type_profile ON profile_nodes.nid = content_type_profile.nid AND profile_nodes.vid = content_type_profile.vid
  -- for each user, we add...
  LEFT JOIN (
    -- ... his owner roles
    SELECT
      projects_nodes.uid AS uid,
      CONCAT(project_projects.uri, '_owner') AS final_rid
    FROM node projects_nodes
    INNER JOIN project_projects ON projects_nodes.nid = project_projects.nid
    WHERE projects_nodes.type = 'project_project'

    UNION

    -- ... his developer or release manager roles
    SELECT
      group_roles.uid AS uid,
      CONCAT(project_projects.uri, '_', REPLACE( role.name, ' ', '_') ) AS final_rid
    -- we also need projects nodes
    FROM node projects_nodes
    INNER JOIN project_projects USING (nid)
    -- we want to get developers roles within our selected projects
    INNER JOIN og_users_roles group_roles ON projects_nodes.nid = group_roles.gid AND (group_roles.rid = 9 OR group_roles.rid = 17)
	INNER JOIN role USING (rid)
    WHERE projects_nodes.type = 'project_project'
	
  ) roles_join ON users.uid = roles_join.uid
  WHERE name LIKE CONCAT(username_prefix, '%')
  AND mail LIKE CONCAT(mail_prefix, '%')
  AND final_rid = role_id;
END |


DROP PROCEDURE IF EXISTS isa_authentify |
CREATE PROCEDURE isa_authentify (IN username VARCHAR(60), IN password VARCHAR(32))
BEGIN
  SELECT name
  FROM users 
  -- we restrict users to those having a content profile
  INNER JOIN node profile_nodes ON profile_nodes.type = 'profile' AND users.uid = profile_nodes.uid 
  INNER JOIN content_type_profile ON profile_nodes.nid = content_type_profile.nid AND profile_nodes.vid = content_type_profile.vid
  WHERE name=username AND pass = MD5(password);
END |

DROP PROCEDURE IF EXISTS isa_get_roles_per_project |
CREATE PROCEDURE isa_get_roles_per_project (IN username VARCHAR(60))
BEGIN
  DECLARE my_uid INT DEFAULT NULL;
  SELECT uid INTO my_uid FROM users WHERE name = username;

  SELECT
    project_projects.uri AS uri,
    CONCAT(project_projects.uri, '_owner') AS final_rid
  FROM node projects_nodes
  INNER JOIN project_projects ON projects_nodes.nid = project_projects.nid
  WHERE projects_nodes.type = 'project_project'
  AND projects_nodes.uid = my_uid

  UNION

  SELECT
    project_projects.uri AS uri,
    CONCAT(project_projects.uri, '_', REPLACE( role.name, ' ', '_') ) AS final_rid
  -- we also need projects nodes
  FROM node projects_nodes
  INNER JOIN project_projects USING (nid)
  -- we want to get developers roles within our selected projects
  INNER JOIN og_users_roles group_roles ON projects_nodes.nid = group_roles.gid AND (group_roles.rid = 9 OR group_roles.rid = 17) AND group_roles.uid = my_uid
  INNER JOIN role USING (rid)
  WHERE projects_nodes.type = 'project_project'
  UNION
  SELECT '', 'drupal_authenticated';
END |

DELIMITER ;
