USE TM

SOURCE /docker-entrypoint-initdb.d/sql/1_create_sequences.sql
SOURCE /docker-entrypoint-initdb.d/sql/2_create_language_tables.sql
SOURCE /docker-entrypoint-initdb.d/sql/3_populate_language_tables.sql
SOURCE /docker-entrypoint-initdb.d/sql/4_create_color_schemes.sql
SOURCE /docker-entrypoint-initdb.d/sql/5_populate_color_schemes.sql
SOURCE /docker-entrypoint-initdb.d/sql/6_create_task_tables.sql
SOURCE /docker-entrypoint-initdb.d/sql/7_create_procedures.sql
SOURCE /docker-entrypoint-initdb.d/sql/8_create_test_user.sql
