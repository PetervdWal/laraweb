# Laravel install for windows
## Step 1
Install xampp in location outside program files
## Step 2
Install composer [To page](https://getcomposer.org/download)
Use the windows installer.
## Step 3
Install git for windows [To downloadpage](https://git-scm.com/download/win)
## Step 4
Open git bash and cd to your htdocs file
use 
```
git clone https://github.com/beatusv/laraweb.git
```
## Step 5
cd into laraweb
use
```
composer update
```
## Step 6
in your apache vhost file `/xampp/apache/conf/extra/httpd.vhosts.conf`
add the following:
```
<VirtualHost laravelweb.dev:80>
  DocumentRoot "C:\xampp\htdocs\laravelweb\public"
  ServerAdmin laravelweb.dev
  <Directory "C:\xampp\htdocs\laravelweb">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>
```
## Step 7
open your host file on your windows pc with admin rights editor:
`C:/Windows/System32/drivers/etc/hosts`
add the following
```
127.0.0.1 laravelweb.dev
```
## Step 8
Run xammp apache and sql server.
Go to laravelweb.dev and its running!

*happy coding!*