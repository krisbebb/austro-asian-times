use books_db;

# Write your tests here somewhere.
-- Display all the records from all three tables separately.
-- SELECT * from books;
-- SELECT * from tags;
-- SELECT * from taggings;

-- Display all books with their tags with the book titles in alphabetical order.
-- SELECT
--     title, name
-- FROM
--     books,
--     tags,
--     taggings
-- WHERE
--     books.book_id = taggings.book_id AND taggings.tag_id = tags.tag_id
-- ORDER BY
--     books.title;
--

--  Display book title and its tags for specified book id e.g. book_id=2.
--
-- SELECT
--     title,
--     NAME
-- FROM
--     books,
--     tags,
--     taggings
-- WHERE
--     taggings.tag_id = tags.tag_id AND taggings.book_id = 2 AND books.book_id = 2
-- GROUP BY
--     tags.name
-- ORDER BY
--     tags.name ASC;

-- Display all tags by popularity in descending order (count how popular they are too).
-- SELECT
--     tags.name,
--     COUNT(tags.name)
-- FROM
--     taggings,
--     tags
-- WHERE
--     tags.tag_id = taggings.tag_id
-- GROUP BY
--     tags.name
-- ORDER BY
--     COUNT(tags.name)
-- DESC
--     ;

-- Display book titles by a given tag id e.g. tag_id = 2 (non-fiction)
-- SELECT
--     books.title
-- FROM
--     books,
--     taggings
-- WHERE
--     taggings.book_id = books.book_id AND taggings.tag_id = 2;

-- Display all tags for a given book id e.g. book_id = 4


SELECT
    tags.name AS Category
FROM
    books,
    tags,
    taggings
WHERE
    books.book_id = 4 AND tags.tag_id = taggings.tag_id AND books.book_id = taggings.book_id
GROUP BY
    tags.name;
