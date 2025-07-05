# How Run application
1) `git clone https://github.com/FerasBarahmeh/LMS.git`
2) `cd LMS`
3) `composer update`
4) copy .env file if your OS is linux use this command `cp .env.example .env`
    - Add port to APP_URL in env file
    - be if courses image not loaded set `FILESYSTEM_DISK=media` and run `php storage:link`
6) Generate key for app using `php artisan key:generate`
7) Migration DB `php artisan mi:f --seed`
8) Set your mail configuration in .env file
9) for testing sure you are install sqlite if you use linux use `sudo apt-get install php-sqlite3` 

# How Login
1) As username: admin password: pasword # admin privilage
2) As username: instructor password: pasword # instructor privilage
3) As username: student password: pasword # student privilage

# Note
 - in your php config (php.ini) file change the post_max_size and upload_max_filesize	to the max size you wan't uploade
 - Connect to internet
