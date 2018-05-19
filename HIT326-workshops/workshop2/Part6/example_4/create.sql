-- DROP table if it exist. This gives us a clean database each time we import this file 
DROP TABLE IF EXISTS airports;


-- -- The field order of each table is the same as the that in the CSV files

-- Let's create the tables first
-- See http://openflights.org/data.html for meanings of airports attributes (i.e. columns or fields)

CREATE TABLE airports (
 id INTEGER PRIMARY KEY,
 name TEXT NOT NULL,
 city TEXT NOT NULL,
 country TEXT NOT NULL,
 faa TEXT,
 icao TEXT,
 latitude REAL NOT NULL,
 longitude REAL NOT NULL,
 altitude REAL NOT NULL,
 timezone REAL NOT NULL ,
 dst TEXT NOT NULL
);





