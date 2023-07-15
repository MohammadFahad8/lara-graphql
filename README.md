# Requirements
#### composer install
#### ./vendor/bin/sail up -d

#Postgres Connection Issues

If you don't know the password for the "postgres" user in your PostgreSQL database, you have a couple of options to resolve the issue:

1. Reset the password manually:
   - Open a command prompt or terminal.
   - Run the following command to access the PostgreSQL database as the system user "postgres":
     ```
     psql -U postgres
     ```
   - Once you're in the PostgreSQL command-line interface, run the following command to reset the password for the "postgres" user:
     ```
     ALTER USER postgres WITH PASSWORD 'new_password';
     ```
     Replace `'new_password'` with the desired password you want to set for the "postgres" user.
   - Exit the PostgreSQL command-line interface by running `\q`.

2. Update the Laravel `.env` file to use a different PostgreSQL user:
   - Create a new PostgreSQL user with the desired username and password. You can use the following command in the PostgreSQL command-line interface:
     ```
     CREATE USER new_username WITH ENCRYPTED PASSWORD 'new_password';
     ```
     Replace `'new_username'` with the desired username and `'new_password'` with the desired password.
   - Grant the necessary privileges to the new user. In the PostgreSQL command-line interface, run the following command to grant all privileges on the database to the new user:
     ```
     GRANT ALL PRIVILEGES ON DATABASE your_database TO new_username;
     ```
     Replace `'your_database'` with the name of your PostgreSQL database.
   - Update the Laravel `.env` file with the new PostgreSQL username and password. Update the following lines:
     ```
     DB_USERNAME=new_username
     DB_PASSWORD=new_password
     ```
     Replace `'new_username'` with the new PostgreSQL username and `'new_password'` with the new password you set.

After performing one of the above options, save the changes and try running the `php artisan config:cache && php artisan migrate` command again to see if the issue is resolved.

Remember to use the correct username and password in your Laravel `.env` file, whether you reset the password for the "postgres" user or create a new PostgreSQL user.
