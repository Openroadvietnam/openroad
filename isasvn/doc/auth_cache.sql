------------------------------------------------------------------------
-- Script for creating the cache database for the SVN authentication
--
-- ** Note **
-- You may have to replae the credentials of the user and the associated
-- database
------------------------------------------------------------------------

CREATE USER 'isa_svn'@'%' IDENTIFIED BY  'isa_svn';

GRANT USAGE ON * . * TO  'test'@'%' IDENTIFIED BY  'isa_svn' 
WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE IF NOT EXISTS  `isa_svn` ;

GRANT ALL PRIVILEGES ON  `isa_svn` . * TO  'isa_svn'@'%';

CREATE TABLE auth_cache (
	last_auth INT NOT NULL,
	usr_pwd_proj VARCHAR(32) NOT NULL
);
