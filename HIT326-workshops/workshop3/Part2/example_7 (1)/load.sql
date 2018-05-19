#Usage
#prompt> mysql < load.sql -u root -p
# OR
#prompt> mysql < load.sql -u root -phit325

#Select the actual database into which to load CSV files

use airports_db;

# Import each CSV file into the database tables

# Make sure you set the correct path to the CSV file on your system
LOAD DATA LOCAL INFILE 'airports.csv' INTO TABLE airports FIELDS TERMINATED BY ',';
