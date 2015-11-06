# WordPress Initial Setup

## Standard Install (example.com)
```shell
cd ~/Sites
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
mv wordpress/ example.com; cd $_
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

---

# Breaking It Down

## Standard Install (example.com)
### Sites Directory
Change directory into ```Sites```
```shell
cd ~/Sites
```

### WordPress
Download the latest release of WordPress, extract achive, and remove archive
```shell
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
```

### Rename WordPress Directory to Project Directory
Move ```wordpress``` to ```example.com```
```shell
mv wordpress/ example.com
```

---

## Subdirectory Install (example.com)
### Sites Directory
Change directory into ```Sites```
```shell
cd ~/Sites
```

### Project Directory
Make project directory, change directory into project directory
```shell
mkdir ~/Sites/example.com; cd $_
```
which is shorthand for
```shell
mkdir ~/Sites/example.com
cd ~/Sites/example.com
```

### WordPress
Download the latest release of WordPress, extract achive, and remove archive
```shell
wget http://wordpress.org/latest.tar.gz
tar -xzvf latest.tar.gz
rm -rf latest.tar.gz
```

### Rename WordPress Directory to Shorter Filename
Move ```wordpress``` to ```wp```
```shell
mv wordpress/ wp
```

### Duplicate index.php
Copy the ```index.php``` file to the project root
```shell
cp wp/index.php index.php
```

### Connect Root to Subdirectory 
Search and replace in the ```index.php``` to add the subdirectory, remove backup file
```shell
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

---

# Redirects
Add support for redirects to the ```index.php``` in the root directory. Insert before ```WP_USE_THEMES```.

```php
/**
 * PHP 301 Redirects
 *
 * https://pantheon.io/docs/articles/sites/code/redirect-incoming-requests/
 */
if ( file_exists( dirname( __FILE__ ) . '/redirects.php' ) ):
    require_once( dirname( __FILE__ ) . '/redirects.php' );
endif;
```

Create a ```redirects.php``` in the root directory.

```php
<?php
/**
 * 301 Redirects
 *
 * An associative array of old and new urls. Trailing slashes are trimmed from
 * the request URI so array keys should not have a trailing slash for match compatibility.
 *
 * @link https://pantheon.io/docs/articles/sites/code/redirect-incoming-requests/
 */
$request = rtrim( $_SERVER['REQUEST_URI'], '/\\' ); // trim trailing slash
$redirects = array(
    '/old' => '/new/',
);

if ( array_key_exists( $request, $redirects ) ) :
    header( 'HTTP/1.0 301 Moved Permanently' );
    header( 'Location: ' . $redirects[ $request ] );
    exit();
endif;
```

# Configuration

## Hosts
Setup a hosts entry for example.com.local

vhosts _or_ MAMP Pro

## Database

phpMyAdmin _or_ Sequel Pro

## Configuration
Copy and Paste Files
- .gitignore
- index.php - subdirectory installations
- redirects.php - included in index.php
- wp-config.php - see wp-config.md for more information

## Themes
Remove legacy themes, however consider leaving an alternate theme for testing
### Remove Legacy Themes
```shell
cd wp-content/themes
```
```shell
cd wp/wp-content/themes
```
```shell
rm -rvf twenty*
```
```shell
rm -rf twentyten twentyeleven twentytwelve twentythirteen twentyfourteen twentyfifteen
```
```shell
find . -type d ! -name 'twentyfifteen' -d 1 -print -exec rm -r {} +;
```
