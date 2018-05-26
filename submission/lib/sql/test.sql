
-- Articles table tests
-- is_db_empty()
SELECT article_id FROM articles WHERE id=1;

--  get_article_id($id)
SELECT * from articles, journalists
WHERE articles.created_by = journalists.id AND article_id=1;

-- get_article_id($headline)
SELECT article_id from articles
WHERE headline = "Eggs are bad again";

-- get_articles()
SELECT * FROM articles;

-- get_user_articles($id)
SELECT * FROM articles WHERE created_by = 1 ORDER BY updated_at DESC;

-- get_latest_articles()
SELECT articles.headline, articles.article_id, GROUP_CONCAT(tag_text) as tags, updated_at FROM articles, article_tags, tags WHERE articles.article_id = article_tags.article_id AND article_tags.tag_id = tags.tag_id GROUP BY articles.headline ORDER BY updated_at DESC LIMIT 5;

-- add_article($headline, $data, $created_by, $tags)
INSERT INTO articles (headline,data,created_by) VALUES (?,?,?);

-- edit_article($headline, $data, $created_by, $tags, $id)
UPDATE articles SET headline = ?, data = ?, created_by = ? WHERE article_id = ?;

-- get_tags($id)
SELECT tag_text FROM articles, article_tags, tags WHERE articles.article_id=? AND article_tags.article_id=articles.article_id AND article_tags.tag_id=tags.tag_id GROUP BY tag_text;

-- delete_tags($id)
DELETE FROM article_tags WHERE article_id = ?;

-- add_tags($id,$tags)
INSERT INTO article_tags (article_id,tag_id) VALUES (?,?);

-- delete_article($id)
DELETE FROM articles WHERE article_id=?;

-- User table tests

-- is_admin()
SELECT privilege FROM journalists WHERE id=?;

-- is_db_empty()
SELECT id FROM journalists WHERE id=?;

-- get_users()
SELECT * FROM journalists;

-- sign_up($user_name, $firstname, $lastname, $password, $password_confirm)
INSERT INTO journalists (login,firstname,lastname,salt,hashed_password) VALUES (?,?,?,?,?);

-- get_user_name($id)
SELECT login FROM journalists WHERE id=?;

-- delete_user($id)
DELETE FROM journalists WHERE id=?;

-- sign_in($user_name,$password)
SELECT id, salt, hashed_password FROM journalists WHERE login=?;

-- set_privilege($login)
UPDATE journalists SET privilege = '2' WHERE login = ?;

-- change_password($user_id, $old_pw, $new_pw, $pw_confirm)
UPDATE journalists SET salt = ?, hashed_password = ? WHERE id = ?;
