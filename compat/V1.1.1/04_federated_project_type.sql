UPDATE content_field_project_common_type
SET    field_project_common_type_value=1
WHERE  nid IN (SELECT node.nid FROM node WHERE node.type='federated_project' );