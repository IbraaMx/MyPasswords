My Passwords  PHP script load passwords from database

# **NOTE**

Your passwords is very important to be away from people so don't host this script at live host or server if you do `all risks will be borne by you` so install this script at local apache like XAMPP to be safe

**this script for you i don't bear anything about anything happen to you when using this script**

### How To Install

1. You need to download script `git clone https://github.com/IbraaMx/MyPasswords.git`
2. create database then import `db.sql`
3. open file connect.php in `/inc/connect.php`
   - servername 	= database hostname
   - username         = Database username
   - database           = database name
   - password          = database password
4. now access your site `example.com/` or `example.com/subfolder`
5. will ask about login information the default is `admin`, `admin`
6. Now you're done you can store passwords in database

### How To Insert

to insert new service you need to login then press at `New Service` add service information and 

now press at `Add Service` button if message is `Service has been registred` reload the page and you'll find the record

### How To Edit Login Information

right now this release doesn't support change login information you can do it manually from PHPMyAdmin

1. Login to PHPMyAdmin
2. Select DB
3. go to `account` table
4. now click on `Edit`
   - username		= login username `change it as you want but keep in mind case sensitive should write same when login
   - password       login password `after change choose from drop menu MD5`

### Credits

i'm using UI Kit `Now UI Kit` free version created by `Creative Tim`

Thanks to https://elshaikh.net for fixing Edit Modal with ajax

### I'm Done

now you can use script but please, don't expose yourself to danger by upload this script at live host, just use on place away from people like `localhost`