UPDATE `node` SET `language` = 'en' WHERE language like '' and type NOT LIKE "federated_project";
DELETE FROM `heartbeat_activity` WHERE `language` NOT LIKE 'en';
DELETE FROM `heartbeat_translations` WHERE heartbeat_translations.tuaid NOT IN (select uaid from heartbeat_activity);