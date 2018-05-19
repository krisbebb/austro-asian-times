-- Usage:  [current folder]sqlite3 [database name] < [sql script]
-- Example: C:\week1>sqlite3 test.db < script.sql

DROP TABLE IF EXISTS users;

-- Create the 'users' table; automatically increment user_id; 
-- automatically set 'created_at' whereever a new record is created with INSERT; 
-- 'name' is required because it is NOT NULL.
-- 'name' is set to UNIQUE so you can't have two names the same

CREATE TABLE users (
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT UNIQUE NOT NULL,
  created_at DATE DEFAULT(datetime('now','localtime'))
);