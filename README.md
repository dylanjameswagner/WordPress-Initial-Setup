# WordPress Command Line Setup

## Standard Install - example.com
```
cd ~/Sites
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
mv wordpress/ example.com
```

## Subdirectory Install - example.com
```
mkdir ~/Sites/example.com
cd ~/Sites/example.com
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
mv wordpress/ wp
cp wp/index.php index.php
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

## Breaking it down

### Project Directory
Make project directory, change directory into project directory 
```
mkdir ~/Sites/example.com
cd ~/Sites/example.com
```

### Install WordPress
Download the latest release of WordPress, extract achive, and remove archive
```
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
```

### Rename Subdirectory
```
mv wordpress/ wp
```

### Dulicate index.php
```
cp wp/index.php index.php
```

### Add Subdirectory to index.php
```
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

## Hosts

vhosts _or_ MAMP Pro

## Database

phpMyAdmin _or_ Sequel Pro

## Edit wp-config.php
