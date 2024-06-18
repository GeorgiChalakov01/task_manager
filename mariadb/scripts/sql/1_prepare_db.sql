DROP DATABASE IF EXISTS TM;
CREATE OR REPLACE DATABASE TM;

CREATE USER IF NOT EXISTS 'TM'@'%' IDENTIFIED BY '0000';
GRANT ALL PRIVILEGES ON TM.* TO 'TM'@'%';
FLUSH PRIVILEGES;

SOURCE 0_create_drop_all_procedures.sql;
CALL DROP_ALL_PROCEDURES();