/* Name this database as books_db. Why not use phpMyAdmin? */

use books_db;

/* On re-creation, the order in which tables are dropped is important */
/* e.g. dropping books first will cause a constraint error */
DROP TABLE IF EXISTS taggings;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS tags;


CREATE TABLE books(
  book_id INT PRIMARY KEY AUTO_INCREMENT, 
  title VARCHAR(50)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

CREATE TABLE tags(
  tag_id INT PRIMARY KEY AUTO_INCREMENT,
  name CHAR(50)
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;

CREATE TABLE taggings(
  book_id INT NOT NULL ,
  tag_id INT NOT NULL,
  PRIMARY KEY (book_id,tag_id),
  FOREIGN KEY (book_id) REFERENCES books (book_id) ON DELETE CASCADE,
  FOREIGN KEY (tag_id) REFERENCES tags (tag_id) ON DELETE CASCADE
)ENGINE=InnoDB, DEFAULT CHARACTER SET utf8;
