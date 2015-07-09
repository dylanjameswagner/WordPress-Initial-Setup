## Pantheon Install (example.com)

### Clone
```shell
cd ~/Sites
git clone ssh://codeserver.dev.[...]/~/repository.git example.com; $_
```

### Remotes
```shell
git remote rename origin pantheon
git remote add origin https://github.com/username/repository
```

### Themes
```shell
cd wp-content/themes
find . -type d ! -name 'twentyfifteen' -d 1 -print -exec rm -r {} +;
```

### WordPress Subdirectory
```shell
mkdir wp; mv * $_
cp wp/index.php index.php
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

###### Git Ignore
```shell
# Processors #
##########
.sass-cache
bower_components
node_modules
```
