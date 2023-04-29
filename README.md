# Getting started

## Local deployment via XAMPP

### 1. Installation

#### 1.1. Server installation

Install XAMPP from https://www.apachefriends.org/index.html.  
_You would need only those components: Apache, MySQL, PHP, phpMyAdmin._

#### 1.2. PeopleDB installation

Download project files and place them at the XAMPP's website root.   
In the case of default setup it should be `C:\xampp\htdocs\`, but you can have any specific location via step 2.1.

### 2. Setup

#### 2.1. Setup vHost (optional)

_vHost is normally needed if you plan to have multiple apps/websites on the XAMPP, so if PeopleDB would be the only one you can safely skip this step._

2.1.1. Set your desired application URL in the Windows hosts file.  
You would need to put string like  
`127.0.0.1 peopledb.localhost`  
at `C:\WINDOWS\system32\drivers\etc\` file.  
_You can use any name instead of peopledb.localhost_  
2.1.2. Create vHost in XAMPP  
You would need to put 
```
<VirtualHost *:80>
    DocumentRoot 'C:/xampp/htdocs/peopledb/'
    ServerName peopledb.localhost
</VirtualHost>
```
at `C:\xampp\apache\conf\extra\httpd-vhosts.conf` file.  
_DocumentRoot can be any folder, it does not required to be inside of the XAMPP folder_  
2.1.3. Check that `C:\xampp\apache\conf\httpd.conf` has vHost configuration applied.  
Its lines should look like that (without `#` in front of second line):
```
#Virtual hosts
Include conf/extra/httpd-vhosts.conf`
```
2.1.4. In case of choosing directory out of XAMPP htdocs folder you should also add these lines (with directory replaced by the DocumentRoot from step 2.1.2) to the httpd.conf file:
```
<Directory "D:/PeopleDB/">
      Options Indexes FollowSymLinks MultiViews
      AllowOverride all
      Order Deny,Allow
      Allow from all
      Require all granted
</Directory>
```

#### 2.2. Setup MySQL

2.2.1. Setup port (optional)
_If you want to MySQL to run on another port you can change it from default value `3306` to another one_  
2.2.1.1. Change port number at `C:\xampp\mysql\bin\my.ini`. Replace port number at two places:  
```
# The following options will be passed to all MySQL clients
[client]
# password       = your_password 
port=3306
socket="C:/xampp/mysql/mysql.sock"
```
and
```
# The MySQL server
default-character-set=utf8mb4
[mysqld]
port=3306
socket="C:/xampp/mysql/mysql.sock"
```  
2.2.1.2. Add info about port for the `C:\xampp\phpMyAdmin\config.inc.php`.  
Add string with new port value to the file:
`$cfg['Servers'][$i]['port'] = '3307';`

2.2.2. Create user  
2.2.2.1. Launch XAMPP and MySQL through XAMPP control panel, then open phpMyAdmin via SQL's Admin button.  
2.2.2.2. Create user through user accounts tab.  
By default you should create user with user name `php_test`, password `password` and all privileges, but you can adjust login information in a way it is needed.

#### 2.3. Setup database

Create new schema `peopledb` and import `peopledb.sql` file from source code there through SQL tab.

#### 2.4. Setup connection

If you had change mysql port, schema name, username or password - adjust connection.php file to corresponding values. e.g.
```
<?php
$host = 'peopledb.localhost:3307';
$database = 'peopledb';
$user = 'php_test';
$pass = 'password';
?>
```

### 3. Launch

#### 3.1. Launch server

Launch XAMPP and re-/start Apache and MySQL.

#### 3.2. Launch PeopleDB

Open localhost (or any name you could have setup at step 2.1., e.g. `peopledb.localhost`) and you are ready to go

### 4. Update

#### 4.1. Update code

Download project files and replace the one you have with the new ones

#### 4.2. Update SQL data

Import all migrations files `migration/migration-YYYY-MM-DD-vX-X-X-X.sql` which were added after the release you were
using through SQL tab of XAMPP's phpMyAdmin

