ALTER TABLE `active_translation` CHANGE nb no int(10);
ALTER TABLE `active_translation` ADD `sig` int(10) unsigned NOT NULL;
ALTER TABLE `active_translation` DROP INDEX nb;
ALTER TABLE `active_translation` ADD INDEX ( `no` );
ALTER TABLE `active_translation` ADD INDEX ( `sig` );

UPDATE `node` SET `language` = 'no' WHERE language IN ('nb', 'nn');
UPDATE `users` SET `language` = 'no' WHERE language IN ('nb', 'nn');
UPDATE `simplenews_subscriptions` SET `language` = 'no' WHERE language IN ('nb', 'nn');
UPDATE `subscriptions_queue` SET `language` = 'no' WHERE language IN ('nb', 'nn');