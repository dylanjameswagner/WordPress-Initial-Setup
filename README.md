# WordPress Command Line Setup

## Standard Install (example.com)
```shell
cd ~/Sites
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
mv wordpress/ example.com
```

## Subdirectory Install (example.com)
```shell
mkdir ~/Sites/example.com; cd $_
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
mv wordpress/ wp
cp wp/index.php index.php
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

### Breaking it down

#### Project Directory
Make project directory, change directory into project directory 
```shell
mkdir ~/Sites/example.com; cd $_
```
```shell
mkdir ~/Sites/example.com
cd ~/Sites/example.com
```

#### Install WordPress
Download the latest release of WordPress, extract achive, and remove archive
```shell
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
```

#### Rename Directory or Subdirectory
Move ```wordpress``` to ```example.com``` or ```wp```
```shell
mv wordpress/ example.com
```
```shell
mv wordpress/ wp
```

#### Dulicate index.php
Copy the ```index.php``` file to the project root
```shell
cp wp/index.php index.php
```

#### Link to the Subdirectory
Search and replace in the ```index.php``` to add the subdirectory, remove backup file
```shell
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

## Hosts
Setup a hosts entry for example.com.local

vhosts _or_ MAMP Pro

## Database

phpMyAdmin _or_ Sequel Pro

## Edit wp-config.php
