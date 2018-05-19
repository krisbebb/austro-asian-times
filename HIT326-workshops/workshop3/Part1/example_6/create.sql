/*
Usage
prompt> mysql < create.sql -u root -p
OR
prompt> mysql < create.sql -u root -phit325

Set mysql root account name and password
prompt>mysqladmin -u root password hit325

Don't use 'root' account in production. Set a specific user name with only the minimal required permissions

Change root password
prompt> mysqladmin -u root -p'oldpassword' password newpass

Change user password
mysql> update user set password=PASSWORD("NEWPASSWORD") where User='hit325student';

Log in to root account, and ask for password
prompt> mysql -u root -p

Create database
mysql> create database players_db;

Creating database structure from scratch
Usage:  prompt>myslq < create.sql
Example: C:\myfolder>mysql < create.sql -u root -p
*/
USE players_db;

DROP TABLE IF EXISTS players;


CREATE TABLE players(
  id INT(11) NOT NULL AUTO_INCREMENT,
  fname CHAR(50) NOT NULL,
  sname CHAR(50) NOT NULL,
  games INT(5) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL,
  -- updated_at DATETIME NOT NULL,
  updated_at TIMESTAMP NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;
