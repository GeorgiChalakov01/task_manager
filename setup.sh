echo "\n\nInstalling MariaDB..."
sudo apt install mariadb-server

echo "\n\nInstall PHP and php-mysqli..."
sudo apt install php php-mysqli

echo "\n\nSetup the database..."
cd db_scripts
sudo mariadb < 0_full_upgrade.sql
cd ..

echo -e "\n\nYou are now set.\nYou can host the contents of the html folder to get access to the web frontend.\nFor testing purposes you can do:\nphp -S localhost:8080 in the html directory."
