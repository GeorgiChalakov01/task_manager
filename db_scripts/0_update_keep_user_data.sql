USE TM;

DROP TABLE PHRASES;
DROP TABLE LANGUAGES;
SOURCE 1_create_language_tables.sql;
SOURCE 2_populate_language_tables.sql;

DROP TABLE COLOR_SCHEMES;
SOURCE 3_create_color_schemes.sql;
SOURCE 4_populate_color_schemes.sql;

SOURCE 6_create_procedures.sql;
