#Usage
#prompt> mysql < test.sql -u root -p
# OR
#prompt> mysql < test.sql -u root -phit325

use friendships;

SELECT * FROM users;

SELECT * FROM friends;
-- DELETE FROM users WHERE name = 'Bob';
-- SELECT * FROM friends;

-- find bob's friends
-- SELECT users.name, friends.friend_id FROM users,friends WHERE users.user_id='1' AND friends.user_id='1';

-- find bob's friends by name
-- SELECT users.name FROM users WHERE users.user_id NOT IN (SELECT friends.friend_id FROM friends WHERE friends.user_id='1') AND users.name<>'Bob';

-- Find all users that have friends
-- SELECT users.name FROM users WHERE users.user_id IN (SELECT friends.user_id FROM friends);

-- Find all users that have no friends
-- SELECT users.name FROM users WHERE users.user_id NOT IN (SELECT friends.user_id FROM friends);

-- Find the number of friends for each user
-- SELECT users.name, count(friend_id) FROM users, friends WHERE friends.user_id = users.user_id GROUP BY users.name;

-- As above but include those with no friends (use LEFT JOIN)
SELECT users.name, count(friend_id) FROM users LEFT JOIN friends ON friends.user_id = users.user_id GROUP BY users.name;

-- Find all users and their friends by name - refer to users as users and u
SELECT users.name, u.name FROM users, friends, users as u WHERE users.user_id = friends.friend_id AND friends.user_id = u.user_id ;
