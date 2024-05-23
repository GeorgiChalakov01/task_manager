/*
 This table holds all the languages the information system can be used in.
 */
CREATE OR REPLACE TABLE LANGUAGES (
	ISO_CODE VARCHAR(2) PRIMARY KEY,
	NAME VARCHAR(50) NOT NULL UNIQUE
);

/*
 This table holds the translations of all the text which is displayed in the informaion system.
 */
CREATE OR REPLACE TABLE PHRASES(
	ID INT AUTO_INCREMENT PRIMARY KEY,
	LANGUAGE_ISO_CODE VARCHAR(2) NOT NULL,
	`KEY` VARCHAR(100) NOT NULL,
	VALUE TEXT NOT NULL,

	FOREIGN KEY (LANGUAGE_ISO_CODE) REFERENCES LANGUAGES(ISO_CODE)
);
