use books_db;

INSERT INTO books (title) values ("How the west was won");
INSERT INTO books (title) values ("My Favourite Politicians");
INSERT INTO books (title) values ("The Arab Spring");
INSERT INTO books (title) values ("PHP and MySQL for Smarties");
INSERT INTO books (title) values ("Trip to Andromeda");
INSERT INTO books (title) values ("The 7th Cavalry");
INSERT INTO books (title) values ("China and the Pacific");
INSERT INTO books (title) values ("USA and China Relationships");
INSERT INTO books (title) values ("Web 2.0 Structures");
INSERT INTO books (title) values ("C++ Greatest Hits");

INSERT INTO tags (name) values ("fiction");
INSERT INTO tags (name) values ("non-fiction");
INSERT INTO tags (name) values ("2009");
INSERT INTO tags (name) values ("2010");
INSERT INTO tags (name) values ("science");
INSERT INTO tags (name) values ("novel");
INSERT INTO tags (name) values ("politics");
INSERT INTO tags (name) values ("fantasy");
INSERT INTO tags (name) values ("western");
INSERT INTO tags (name) values ("computer");

INSERT INTO taggings (book_id,tag_id) values (1,1);
INSERT INTO taggings (book_id,tag_id) values (1,9);
INSERT INTO taggings (book_id,tag_id) values (2,1);
INSERT INTO taggings (book_id,tag_id) values (2,7);
INSERT INTO taggings (book_id,tag_id) values (2,8);
INSERT INTO taggings (book_id,tag_id) values (3,2);
INSERT INTO taggings (book_id,tag_id) values (3,7);
INSERT INTO taggings (book_id,tag_id) values (5,1);
INSERT INTO taggings (book_id,tag_id) values (5,5);
INSERT INTO taggings (book_id,tag_id) values (4,2);
INSERT INTO taggings (book_id,tag_id) values (4,10);
INSERT INTO taggings (book_id,tag_id) values (4,4);
INSERT INTO taggings (book_id,tag_id) values (9,10);
INSERT INTO taggings (book_id,tag_id) values (10,10);
INSERT INTO taggings (book_id,tag_id) values (7,7);