use books_db;

/* Uncomment each one by one, and recommenting earlier queries.*/

/*
SELECT * from books; 
*/

/* 
SELECT * from tags; 
*/

/* 
SELECT * from taggings; 
*/



/* Display Each Book and its Tags. The books are in alphabetical order */
/* 
SELECT books.title, tags.name FROM books, taggings, tags WHERE books.book_id = taggings.book_id AND taggings.tag_id = tags.tag_id ORDER BY books.title ASC; 
*/


/* Get tags for specified book id e.g. id=2*/
/*
SELECT books.title,tags.name FROM  books, taggings, tags WHERE tags.tag_id = taggings.tag_id AND taggings.book_id = 2 AND books.book_id = 2 GROUP BY tags.name ORDER BY tags.name ASC ;
*/


/* List a tags by popularity */
/*
SELECT tags.name, count(tags.name) FROM tags, taggings WHERE tags.tag_id = taggings.tag_id GROUP BY tags.name ORDER BY count(tags.name) DESC;
*/

/* List book titles by tag id */
/*
SELECT books.title FROM books, taggings WHERE taggings.tag_id = 2 AND taggings.book_id = books.book_id;
*/


/* List tags for given book id */
/*
SELECT tags.name As Category FROM tags, taggings, books WHERE books.book_id = 4 AND books.book_id = taggings.book_id AND taggings.tag_id = tags.tag_id GROUP BY tags.name;
*/







