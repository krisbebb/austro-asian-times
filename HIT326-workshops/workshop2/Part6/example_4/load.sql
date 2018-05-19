-- Usage:  prompt>sqlite3 test.db < load.sql
-- Example: C:\myfolder>sqlite3 test.db < load.sql

-- Note the next couple of lines are SQLite dot commands. Note, no semicolon at end of lines for dot commands because they are not SQL statements.

-- Set the field separation delimiter
.separator ","

-- Import CSV file 'airports.csv' into the table called 'airports'
.import airports.csv airports

