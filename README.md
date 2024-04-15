# How Run application
1) `git clone git clone git@github.com:FerasBarahmeh/LMS.git`
2) `cd LMS`
3) `composer update`
4) copy .env file if your OS is linux use this command `cp .env.example .env`
5) Generate key for app using `php artisan key:generate`
6) Migration DB `php artisan mi:f --seed`
7) Set your mail configuration in .env file
8) Set "APP_URL=http://localhost:8000" in .env file 
9) for testing sure you are install sqlite if you use linux use `sudo apt-get install php-sqlite3` 
# Note
 - in your php config (php.ini) file change the post_max_size and upload_max_filesize	to the max size you wan't uploade
 - Connect to internet
