DROP DATABASE TM;
CREATE OR REPLACE DATABASE TM;

CREATE USER 'TM'@'localhost' IDENTIFIED BY '0000';
GRANT ALL PRIVILEGES ON TM.* TO 'TM'@'localhost';
FLUSH PRIVILEGES;


USE TM

SOURCE 1_create_language_tables.sql
SOURCE 2_populate_language_tables.sql
SOURCE 3_create_task_tables.sql
SOURCE 4_create_procedures.sql
SOURCE 5_populate_color_schemes.sql
