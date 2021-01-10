CREATE DATABASE devops_db
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'en_US.utf8'
    LC_CTYPE = 'en_US.utf8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

CREATE TABLE accounts 
( 
	  user_id INT PRIMARY KEY GENERATED ALWAYS AS IDENTITY, 
	  username VARCHAR(50) UNIQUE NOT NULL, 
	  password VARCHAR(255) NOT NULL, 
	  email VARCHAR(50) UNIQUE NOT NULL 
)
