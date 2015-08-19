## Pantheon Install (example.com)

### SSH Key
Acount SSH Keys
```shell
pbcopy < ~/.ssh/id_rsa.pub
```

### Clone
```shell
cd ~/Sites
git clone ssh://codeserver.dev.[...]/~/repository.git example.com; cd $_
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

### Git Ignore
###### __Search__
```shell
# Sass #
##########
.sass-cache
```
###### __Replace__
```shell
# Processors #
##########
.sass-cache
bower_components
node_modules
```
