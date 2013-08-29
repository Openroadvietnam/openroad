

--
-- Remove blogs from og_ancestry 
--
DELETE FROM `og_ancestry` WHERE `nid` in (SELECT `nid` FROM `node` WHERE type='blog');

--
-- Remove blogs from og_access_post 
--
DELETE FROM  `og_access_post` WHERE  `nid` in (SELECT `nid` FROM `node` WHERE type='blog');