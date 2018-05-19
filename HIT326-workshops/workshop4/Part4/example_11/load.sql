#Usage
#prompt> mysql < load.sql -u root -p
# OR
#prompt> mysql < load.sql -u root -phit325


use friendships;


-- Insert some names
INSERT INTO users (name) values ("Bob");
INSERT INTO users (name) values ("Alice");
INSERT INTO users (name) values ("Eve");
INSERT INTO users (name) values ("Fred");
INSERT INTO users (name) values ("Dennis");
INSERT INTO users (name) values ("Steve");


-- Insert some friendships
INSERT INTO friends (user_id,friend_id) values ('1','2');
INSERT INTO friends (user_id,friend_id) values ('2','1');

INSERT INTO friends (user_id,friend_id) values ('1','3');
INSERT INTO friends (user_id,friend_id) values ('3','1');

INSERT INTO friends (user_id,friend_id) values ('1','4');
INSERT INTO friends (user_id,friend_id) values ('4','1');

INSERT INTO friends (user_id,friend_id) values ('1','6');
INSERT INTO friends (user_id,friend_id) values ('6','1');

INSERT INTO friends (user_id,friend_id) values ('3','2');
INSERT INTO friends (user_id,friend_id) values ('2','3');

INSERT INTO friends (user_id,friend_id) values ('2','4');
INSERT INTO friends (user_id,friend_id) values ('4','2');
