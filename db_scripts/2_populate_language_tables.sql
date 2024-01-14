INSERT INTO LANGUAGES (ID, CODE, NAME) VALUES (1, "en", "English");
INSERT INTO LANGUAGES (ID, CODE, NAME) VALUES (2, "bg", "български");



/*
Used in the signin.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-page-title", "Sign In");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-page-title", "Вход");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-form-title", "Sign In");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-form-title", "Вход");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-form-email-label", "Email Address");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-form-email-label", "Имейл Адрес");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-form-email-placeholder", "example@email.com");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-form-email-placeholder", "example@email.com");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-form-password-label", "Password");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-form-password-label", "Парола");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-form-password-placeholder", "Password");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-form-password-placeholder", "Парола");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-form-submit-button", "Въведи");

/*
Used in the signup.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-page-title", "Sign Up");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-page-title", "Регистрация");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-title", "Sign Up");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-title", "Регистрация");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-first-name-label", "First Name");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-first-name-label", "Име");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-first-name-placeholder", "Your Name");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-first-name-placeholder", "Вашето Име");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-last-name-label", "Last Name");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-last-name-label", "Фамилия");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-last-name-placeholder", "Your Last Name");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-last-name-placeholder", "Вашата Фамилия");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-username-label", "Username");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-username-label", "Потребителско Име");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-username-placeholder", "Username");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-username-placeholder", "Потребителско Име");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-email-label", "Email Address");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-email-label", "Имейл Адрес");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-email-placeholder", "example@email.com");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-email-placeholder", "example@email.com");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-password-label", "Password");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-password-label", "Парола");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-password-placeholder", "Password");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-password-placeholder", "Парола");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-password-repeat-label", "Repeat Password");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-password-repeat-label", "Потвърдете Паролата");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-password-repeat-placeholder", "Password");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-password-repeat-placeholder", "Парола");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-profile-picture-label", "Profile Picture");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-profile-picture-label", "Профилна Снимка");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-form-submit-button", "Въведи");

/*
Used in signup.inc.php to indicate errors.
*/

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-forbiden-symbols-username", "Please don't use special characters for the username!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-forbiden-symbols-username", "Моля не използвайте специални символи за потребителското име!");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-username-taken", "Username is taken!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-username-taken", "Потребителскот име е заето!");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-email-taken", "Email is taken!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-email-taken", "Имейла е зает!");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-weak-password", "Password needs to have at least one lower case letter, upper case letter, symbol and number. The minimum length is 8 characters!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-weak-password", "Паролата трябва да съдържа най-малко една малка буква, една голяма буква, един символ и една цифра. Минималната дължина е 8 символа!");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-passwords-dont-match", "Passwords don't match!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-passwords-dont-match", "Паролите не съвпадат!");

/*
Used in the navbar.php.
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signin-link-text", "Sign In");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signin-link-text", "Вход");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "signup-link-text", "Sign Up");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "signup-link-text", "Регистрация");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "home", "Home");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "home", "Начало");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "categories", "Categories");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "categories", "Категории");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "notes", "Notes");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "notes", "Бележки");

/*
Used for statuserror in the signin_system/functions.inc.php
 */
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-no-db-connection", "No connection with the DataBase! Statement not prepared.");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-no-db-connection", "Няма връзка с базата данни.");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-signin-wrong-credentials", "Wrong credentials!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-signin-wrong-credentials", "Грешни входни данни!");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "success-account-created", "Successfully created an account!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "success-account-created", "Успешно създаден профил!");

INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (1, "error-field-is-manditory", "This field is manditory!");
INSERT INTO PHRASES (LANGUAGE_ID, `KEY`, VALUE) VALUES (2, "error-field-is-manditory", "Това поле е задължително!");



