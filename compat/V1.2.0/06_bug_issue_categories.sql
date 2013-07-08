DELETE FROM project_issue_categories
WHERE nid NOT IN (SELECT nid FROM node);