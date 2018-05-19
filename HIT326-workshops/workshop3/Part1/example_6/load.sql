#Usage
#prompt> mysql < load.sql -u root -p
# OR
#prompt> mysql < load.sql -u root -phit325

use players_db;


-- INSERT INTO players (fname,sname, games) values ("Jon","Smith",5);
-- INSERT INTO players (fname,sname, games) values ("Fred","Nerk",15);
-- INSERT INTO players (fname,sname) values ("Joanne","Jones");

INSERT INTO players (fname,sname, games, created_at) values ("Jon","Smith",5, NOW());
INSERT INTO players (fname,sname, games, created_at) values ("Fred","Nerk",15, NOW());
INSERT INTO players (fname,sname, created_at) values ("Joanne","Jones", NOW());
