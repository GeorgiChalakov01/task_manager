DELETE FROM PHRASES;
DELETE FROM LANGUAGES;

INSERT INTO LANGUAGES (ISO_CODE, NAME) VALUES("en", "English");
INSERT INTO LANGUAGES (ISO_CODE, NAME) VALUES ("bg", "български");



/*
Used in the signin.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-page-title", "Sign In");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-page-title", "Вход");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-form-title", "Sign In");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-form-title", "Вход");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-form-email-label", "Email Address");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-form-email-label", "Имейл Адрес");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-form-email-placeholder", "example@email.com");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-form-email-placeholder", "example@email.com");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-form-password-label", "Password");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-form-password-label", "Парола");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-form-password-placeholder", "Password");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-form-password-placeholder", "Парола");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-form-submit-button", "Въведи");

/*
Used in the signup.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-page-title", "Sign Up");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-page-title", "Регистрация");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-title", "Sign Up");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-title", "Регистрация");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-first-name-label", "First Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-first-name-label", "Име");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-first-name-placeholder", "Your Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-first-name-placeholder", "Вашето Име");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-last-name-label", "Last Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-last-name-label", "Фамилия");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-last-name-placeholder", "Your Last Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-last-name-placeholder", "Вашата Фамилия");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-username-label", "Username");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-username-label", "Потребителско Име");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-username-placeholder", "Username");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-username-placeholder", "Потребителско Име");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-email-label", "Email Address");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-email-label", "Имейл Адрес");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-email-placeholder", "example@email.com");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-email-placeholder", "example@email.com");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-password-label", "Password");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-password-label", "Парола");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-password-placeholder", "Password");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-password-placeholder", "Парола");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-password-repeat-label", "Repeat Password");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-password-repeat-label", "Потвърдете Паролата");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-password-repeat-placeholder", "Password");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-password-repeat-placeholder", "Парола");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-profile-picture-label", "Profile Picture");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-profile-picture-label", "Профилна Снимка");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-form-submit-button", "Въведи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "default-category-name", "Unsorted");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "default-category-name", "Неподредени");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "default-project-title", "Unsorted");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "default-project-title", "Неподредени");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "default-project-description", "Here you can create your unsorted tasks. This is useful for standalone tasks which can't be added to a specific project.");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "default-project-description", "Тук можете да създавате неподредени задачи. Това е особено полезно за задачи които не могат да се причислят към определен проект.");

/*
Used in the files.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "files-page-title", "Files");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "files-page-title", "Файлове");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "files-upload-button", "Upload");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "files-upload-button", "Качване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "dropdown-filter-categories", "Category");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "dropdown-filter-categories", "Категория");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "dropdown-all-categories", "All Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "dropdown-all-categories", "Всички Категории");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "text-no-description", "No Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "text-no-description", "Няма Описание");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "files-file-download-button", "Download");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "files-file-download-button", "Изтегляне");

--INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-question", "What would you like to do with this category?");
--INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-question", "Какво бихте искали да направите с тази категория?");

--INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-edit", "Edit");
--INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-edit", "Промяна");

--INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-delete", "Delete");
--INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-delete", "Изтриване");

/*
Used in the categories.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-page-title", "Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-page-title", "Категории");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-question", "What would you like to do with this category?");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-question", "Какво бихте искали да направите с тази категория?");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-move-form-question", "What should the new place of this task be?");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-move-form-question", "На кое място бихте искали да преместите задачата?");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-move", "Move");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-move", "Премести");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-open", "Open");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-open", "Отвори");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-unattach", "Unattach");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-unattach", "Откачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-edit", "Edit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-edit", "Промяна");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-hidden-menu-delete", "Delete");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-hidden-menu-delete", "Изтриване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-category-created", "Category Created Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-category-created", "Категорията е създадена успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-category-deleted", "Category Deleted Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-category-deleted", "Категорията е изтрита успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-category-edited", "Category Edited Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-category-edited", "Категорията е променена успешно!");

/*
Used in the category_edit.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-page-title", "Create a Category");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "catgegory-create-page-title", "Създаване на Категория");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-edit-page-title", "Edit a Category");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "catgegory-edit-page-title", "Промяна на Категория");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-title", "Create a Category");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-title", "Създаване на Категория");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-edit-title", "Edit a Category");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-edit-title", "Промяна на Категория");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-name-label", "Category Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-name-label", "Име на Категорията");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-name-placeholder", "Work");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-name-placeholder", "Работа");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-color-style-label", "Color Style");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-color-style-label", "Цвят");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-form-submit-button", "Въведи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-info-header", "Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-info-header", "Категории");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "category-create-info-paragraph", "The categories are used to order your information. <br/>Be sure to give them discriptive names and append the right category to all your objects! :)");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "category-create-info-paragraph", "Можете да използвате категориите за да организирате своите обекти.<br/>Старайте се да давате описателни имена на всяка своя категория и добавяйте категории на всички свои обекти! :)");

/*
Used in the file_edit.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-create-page-title", "Create a File");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-create-page-title", "Създаване на Файл");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-page-title", "Edit a File");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-page-title", "Промяна на Файл");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-create-title", "Create a File");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-create-title", "Създаване на Файл");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-title", "Edit a File");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-title", "Промяна на Файл");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-title-label", "File Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-title-label", "Име на Файлта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-title-placeholder", "File Name");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-title-placeholder", "Име на Файла");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-description-label", "File Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-description-label", "Описание на Файлта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-description-placeholder", "File Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-description-placeholder", "Описание на Файла");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-upload-label", "Chose a File");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-upload-label", "Изберете Файла");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories-label", "Choose Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories-label", "Изберете Категории");


INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-form-submit-button", "Въведи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-info-header", "Files");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-info-header", "Файлове");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "file-edit-info-paragraph", "You can easily upload important files and attach them to any of your notes! :)");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "file-edit-info-paragraph", "Тук можете лесно да качвате полезни файлове, които по-късно могат да бъдат прикачвани във всяка бележка, която желаете! :)");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-file-uploaded", "File Uploaded Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-file-uploaded", "Файлът е качен успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-file-edited", "File Edited Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-file-edited", "Файлът е променен успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-file-deleted", "File Deleted Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-file-deleted", "Файлът е изтрит успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-file-unattached", "File Unattached Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-file-unattached", "Файлът е откачен успешно!");


/*
Used in the home.php. 
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "home-page-title", "Home");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "home-page-title", "Начало");

/*
Used in signup.inc.php to indicate errors.
*/

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-forbiden-symbols-username", "Please don't use special characters for the username!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-forbiden-symbols-username", "Моля не използвайте специални символи за потребителското име!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-username-taken", "Username is taken!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-username-taken", "Потребителскот име е заето!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-email-taken", "Email is taken!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-email-taken", "Имейла е зает!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-weak-password", "Password needs to have at least one lower case letter, upper case letter, symbol and number. The minimum length is 8 characters!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-weak-password", "Паролата трябва да съдържа най-малко една малка буква, една голяма буква, един символ и една цифра. Минималната дължина е 8 символа!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-passwords-dont-match", "Passwords don't match!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-passwords-dont-match", "Паролите не съвпадат!");

/*
Used in the navbar.php.
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signin-link-text", "Sign In");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signin-link-text", "Вход");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "signup-link-text", "Sign Up");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "signup-link-text", "Регистрация");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "navbar-profile", "My Profile");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "navbar-profile", "Моят Профил");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "navbar-signout", "Sign Out");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "navbar-signout", "Изход");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "navbar-languages", "Languages");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "navbar-languages", "Езици");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "home", "Home");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "home", "Начало");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "categories", "Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "categories", "Категории");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "files", "Files");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "files", "Файлове");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "notes", "Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "notes", "Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "projects", "Projects");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "projects", "Проекти");

/*
Used for statuserror in the signin_system/functions.inc.php
 */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-no-db-connection", "No connection with the DataBase! Statement not prepared.");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-no-db-connection", "Няма връзка с базата данни.");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-signin-wrong-credentials", "Wrong credentials!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-signin-wrong-credentials", "Грешни входни данни!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-account-created", "Successfully created an account!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-account-created", "Успешно създаден профил!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-field-is-manditory", "This field is manditory!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-field-is-manditory", "Това поле е задължително!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "error-file-upload", "File was not uploaded!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "error-file-upload", "Файлът не беше качен!");

/*Used in notes.php*/
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "notes-page-title", "Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "notes-page-title", "Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "notes-create-button", "Create");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "notes-create-button", "Създай");

/*Used in note_view.php*/
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-view-created-on", "Created On");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-view-created-on", "Създадена на");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-view-attached-files", "Attached Files");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-view-attached-files", "Прикачени Файлове");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-view-deadline", "Deadline");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-view-deadline", "Краен Срок");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-view-edit", "Edit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-view-edit", "Промени");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-view-archive", "Archive");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-view-archive", "Архивиране");

/*Used in project_view.php*/
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-description", "Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-description", "Описание");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-created-on", "Created On");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-created-on", "Създадена на");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-deadline", "Deadline");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-deadline", "Краен Срок");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-edit", "Edit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-edit", "Промени");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-archive", "Archive");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-archive", "Архивиране");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-mark-complete", "Mark as Complete");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-mark-complete", "Приключване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-hide-completed-tasks", "Hide Completed Tasks");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-hide-completed-tasks", "Скриване на приключените задачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-unhide-completed-tasks", "Show Completed Tasks");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-unhide-completed-tasks", "Показване на приключените задачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-completed-on", "Completed On");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-completed-on", "Приключен на");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-attached-notes", "Attached Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-attached-notes", "Прикачени Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-attach-note", "Attach");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-attach-note", "Прикачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-tasks-header", "Tasks");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-tasks-header", "Задачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-add-task", "Add New Task");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-add-task", "Създаване на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-note-chooser-question", "Choose notes to attach");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-note-chooser-question", "Изберете кои бележки да прикачите");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-view-attach-button", "Attach");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-view-attach-button", "Прикачване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-task-moved", "Success! Task Moved.");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-task-moved", "Задачата е преместена успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-project-completed-tasks-hidden", "Completed tasks are hidden");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-project-completed-tasks-hidden", "Приключените задачи са скрити");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-project-completed-tasks-not-hidden", "Completed tasks are shown");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-project-completed-tasks-not-hidden", "Приключените задачи са показани");

/*Used in task_view.php*/
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-description", "Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-description", "Описание");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-created-on", "Created On");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-created-on", "Създадена на");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-deadline", "Deadline");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-deadline", "Краен Срок");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-edit", "Edit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-edit", "Промени");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-archive", "Archive");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-archive", "Архивиране");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-mark-completed", "Mark as Completed");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-mark-completed", "Приключване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-mark-non-completed", "Mark as non-completed");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-mark-non-completed", "Маркиране като неприключена");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-completed-on", "Completed On");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-completed-on", "Приключен на");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-attached-notes", "Attached Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-attached-notes", "Прикачени Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-tasks-header", "Tasks");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-tasks-header", "Задачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-view-add-task", "Add New Task");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-view-add-task", "Създаване на Задача");

/*Used in note_edit.php*/
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-page-title", "Edit Note");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-page-title", "Промяна на Бележка");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-create-page-title", "Create Note");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-create-page-title", "Създаване на Бележка");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-title", "Edit Note");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-title", "Промяна на Бележка");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-create-title", "Create Note");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-create-title", "Създаване на Бележка");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-title-label", "Title");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-title-label", "Заглавие");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-title-placeholder", "Shopping List");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-title-placeholder", "Списък с покупки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-description-label", "Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-description-label", "Описание");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-files-label", "Attach Files");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-files-label", "Прикачете Файлове");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-description-placeholder", "Milk, Eggs ...");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-description-placeholder", "Мляко, Яйца ...");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-form-submit-button", "Въведи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-info-header", "Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-info-header", "Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "note-edit-info-paragraph", "Write down any important information so you don't forget it.<br> Attach relevant pictures or documents for context! :)");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "note-edit-info-paragraph", "Записвайте важната за вас информация за да не я забравите.<br>Прикачете снимки и документи които да дадат допълнителен контекст! :)");


INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-note-created", "Note Created Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-note-created", "Бележката е създадена успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-note-edited", "Note Edited Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-note-edited", "Бележката е променена успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-note-deleted", "Note Deleted Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-note-deleted", "Бележката е изтрита успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-note-unattached", "Note Unattached Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-note-unattached", "Бележката е откачена успешно!");

/*projects.php*/
/* Used in projects.php */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "projects-page-title", "Projects");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "projects-page-title", "Проекти");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "projects-create-button", "Create");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "projects-create-button", "Създай");


/* Used in project_edit.php */
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-create-page-title", "Create a Project");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-create-page-title", "Създаване на Проект");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-page-title", "Edit a Project");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-page-title", "Промяна на Проект");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-create-title", "Create a Project");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-create-title", "Създаване на Проект");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-title", "Edit a Project");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-title", "Промяна на Проект");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-title-label", "Project Title");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-title-label", "Заглавие на Проекта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-title-placeholder", "Project Title");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-title-placeholder", "Заглавие на Проекта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-description-label", "Project Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-description-label", "Описание на Проекта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-description-placeholder", "Project Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-description-placeholder", "Описание на Проекта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-categories-label", "Choose Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-categories-label", "Изберете Категории");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-attached-notes", "Attach Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-attached-notes", "Прикачи Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-form-submit-button", "Въведи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-project-created", "Project Created Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-project-created", "Проектът е създаден успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-project-edited", "Project Edited Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-project-edited", "Проектът е променен успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-project-deleted", "Project Deleted Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-project-deleted", "Проектът е изтрит успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-deadline-label", "Deadline");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-deadline-label", "Краен Срок");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-endedOn-label", "End Date");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-endedOn-label", "Дата на Завършване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-info-header", "Project Details");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-info-header", "Детайли за Проекта");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "project-edit-info-paragraph", "Use this section to add details about your project. Make sure to set a clear title and description to keep everything organized.");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "project-edit-info-paragraph", "Използвайте тази секция, за да добавите детайли за вашия проект. Уверете се, че сте задали ясно заглавие и описание, за да поддържате всичко организирано.");

-- used in task_edit.php
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-blocker-label", "Blocker");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-blocker-label", "Блокираща");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-create-page-title", "Create a Task");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-create-page-title", "Създаване на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-page-title", "Edit a Task");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-page-title", "Промяна на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-create-title", "Create a Task");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-create-title", "Създаване на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-title", "Edit a Task");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-title", "Промяна на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-title-label", "Task Title");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-title-label", "Заглавие на Задачата");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-title-placeholder", "Task Title");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-title-placeholder", "Заглавие на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-description-label", "Task Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-description-label", "Описание на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-description-placeholder", "Task Description");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-description-placeholder", "Описание на Задача");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-categories-label", "Choose Categories");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-categories-label", "Изберете Категории");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-attached-notes", "Attach Notes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-attached-notes", "Прикачи Бележки");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-form-submit-button", "Submit");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-form-submit-button", "Въведи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-task-created", "Task Created Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-task-created", "Задачата е създадена успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-task-edited", "Task Edited Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-task-edited", "Задачата е променена успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-task-deleted", "Task Deleted Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-task-deleted", "Задачата е изтрита успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-task-completed", "Task Completed Status Changed Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-task-completed", "Статуса на задачата е променен успешно!");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-deadline-label", "Deadline");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-deadline-label", "Краен Срок");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-endedOn-label", "End Date");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-endedOn-label", "Дата на Завършване");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-info-header", "Tasks");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-info-header", "Задачи");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-info-paragraph", "Each project has tasks. If the project is the end goal you need to reach the tasks are the steps to it.");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-info-paragraph", "Всеки проект съдържа задачи. Ако проекта е крайната цел която трябва да бъде достигната, задачите са стъпките чрез които да стигнете до нея.");

INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "task-edit-duration", "Duration in minutes");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "task-edit-duration", "Продължителност в минути");



INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "success-notes-attached", "Notes Attached Successfully!");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "success-notes-attached", "Бележките са прикачени успешно!");


INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('en', "", "");
INSERT INTO PHRASES (LANGUAGE_ISO_CODE, `KEY`, VALUE) VALUES('bg', "", "");

