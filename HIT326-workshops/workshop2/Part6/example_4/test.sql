-- Usage:  prompt>sqlite3 test.db < test.sql
-- Example: C:\myfolder>sqlite3 test.db < test.sql

-- Set output to a text file if too much is displayed in the standard output
-- remember, no semicolon after SQLite dot commands
-- .output out.txt

-- Turn on column headings in SQLite
.header ON

-- SELECT * FROM airports;

-- SELECT name, city, country FROM airports WHERE city = "Darwin";
--	    name|city|country
--      Darwin Intl|Darwin|Australia
-- SELECT name, city, country FROM airports WHERE country = "Australia";
--
-- SELECT name, city, timezone FROM airports WHERE country='Australia';
--
-- SELECT name, city, country FROM airports WHERE city LIKE "New%" AND country = "United States";
--
-- Note the LIKE “New%”. Notice the % sign. Essentially this query asks for cities beginning with “New” followed by zero or more characters AND where the country is the United States.
--
-- SELECT name, city, country FROM airports WHERE city LIKE "New York%" AND country = "United States";
--
SELECT name, city, country, latitude, longitude FROM airports WHERE longitude > 130 AND longitude <132 AND latitude < 0;
--
