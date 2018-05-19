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
USE airports_db;

DROP TABLE IF EXISTS airports;

CREATE TABLE airports (
 id INT(11) NOT NULL,
 name CHAR(50) NOT NULL,
 city CHAR(40) NOT NULL,
 country CHAR(30) NOT NULL,
 faa CHAR(10),
 icao CHAR(10),
 latitude FLOAT NOT NULL,
 longitude FLOAT NOT NULL,
 altitude INT NOT NULL,
 timezone TINYINT NOT NULL ,
 dst CHAR(1) NOT NULL,
 PRIMARY KEY (id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;




