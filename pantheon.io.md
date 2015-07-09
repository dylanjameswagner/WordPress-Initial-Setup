## Pantheon Install (example.com)

### Clone
```shell
cd ~/Sites
git clone ssh://codeserver.dev.[...]/~/repository.git example.com; $_
```

### Remotes
```shell
git remote rename origin pantheon
git remote add origin https://github.com/teamcolab/example.com
```

### Themes
```shell
cd wp/wp-content/themes
rm -rf twentyten twentyeleven twentytwelve twentythirteen twentyfourteen
```

```shell
rm -rf twentyfifteen
```

### WordPress Subdirectory
```shell
mkdir wp; mv * $_
cp wp/index.php index.php
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

###### Git Ignore
```
# WordPress #
############
wp/wp-config-local.php
wp/wp-content/uploads
wp/wp-content/blogs.dir/
wp/wp-content/upgrade/
wp/wp-content/backup-db/
wp/wp-content/advanced-cache.php
wp/wp-content/wp-cache-config.php
sitemap.xml
sitemap.xml.gz
*.log

# @TODO writable paths
wp/wp-content/cache/
wp/wp-content/backups/

[...]

# Processors #
##########
.sass-cache
bower_components
node_modules
```

###### Commit
```shell
git add -A
git commit -m "move wordpress into subdirectory"
```
