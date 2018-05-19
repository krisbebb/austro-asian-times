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
mysql> create database friendships;

Creating database structure from scratch
Usage:  prompt>myslq < create.sql
Example: C:\myfolder>mysql < create.sql -u root -p
*/

USE friendships;

DROP TABLE IF EXISTS friends;

DROP TABLE IF EXISTS users;

-- Note the UNIQUE contraint on 'name'. No two names can be same now.
CREATE TABLE users (
  user_id INT(11) NOT NULL AUTO_INCREMENT,
  name char(50) UNIQUE NOT NULL,
  PRIMARY KEY (user_id)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;;



-- We now set foreign-key contraints. So we can't insert user_id into the table unless it already exists in the users table.


CREATE TABLE friends (
  user_id INT(11) NOT NULL,
  friend_id INT(11) NOT NULL,
  PRIMARY KEY (user_id,friend_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  FOREIGN KEY (friend_id) REFERENCES users (user_id) ON DELETE CASCADE
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;
