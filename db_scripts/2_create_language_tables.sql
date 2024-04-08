/*
 This table holds all the languages the information system can be used in.
 */
CREATE OR REPLACE TABLE LANGUAGES (
	ID INT AUTO_INCREMENT PRIMARY KEY,
	CODE VARCHAR(10) NOT NULL UNIQUE,
	NAME VARCHAR(50) NOT NULL UNIQUE
);

/*
 This table holds the translations of all the text which is displayed in the informaion system.
 */
CREATE OR REPLACE TABLE PHRASES(
	ID INT AUTO_INCREMENT PRIMARY KEY,
	LANGUAGE_ID INT NOT NULL,
	`KEY` VARCHAR(100) NOT NULL,
	VALUE TEXT NOT NULL,

	FOREIGN KEY (LANGUAGE_ID) REFERENCES LANGUAGES(ID)
);
