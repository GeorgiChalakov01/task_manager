USE TM;

DROP TABLE PHRASES;
DROP TABLE LANGUAGES;
SOURCE 2_create_language_tables.sql;
SOURCE 3_populate_language_tables.sql;

SOURCE 0_create_drop_all_procedures.sql;
CALL DROP_ALL_PROCEDURES();
SOURCE 7_create_procedures.sql;
