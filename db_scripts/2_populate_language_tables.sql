INSERT INTO LANGUAGES (ID, CODE, NAME) VALUES (1, 'en', 'English');
INSERT INTO LANGUAGES (ID, CODE, NAME) VALUES (2, 'bg', 'български');



/*
Used in the signin.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-page-title', 'Sign In');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-page-title', 'Вход');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-form-title', 'Sign In');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-form-title', 'Вход');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-form-email-label', 'Email Address');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-form-email-label', 'Имейл Адрес');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-form-email-placeholder', 'example@email.com');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-form-email-placeholder', 'example@email.com');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-form-password-label', 'Password');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-form-password-label', 'Парола');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-form-password-placeholder', 'Password');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-form-password-placeholder', 'Парола');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'signin-form-submit-button', 'Submit');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'signin-form-submit-button', 'Въведи');

/*
Used in the navbar.php.
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'home', 'Home');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'home', 'Начало');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'categories', 'Categories');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'categories', 'Категории');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'notes', 'Notes');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'notes', 'Бележки');

/*
Used for statuserror in the signin_system/functions.inc.php
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'error-no-db-connection', 'No connection with the DataBase! Statement not prepared.');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'error-no-db-connection', 'Няма връзка с базата данни.');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'error-signin-wrong-credentials', 'Wrong credentials!');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'error-signin-wrong-credentials', 'Грешни входни данни!');

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, 'error-field-is-manditory', 'This field is manditory!');
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, 'error-field-is-manditory', 'Това поле е задължително!');



