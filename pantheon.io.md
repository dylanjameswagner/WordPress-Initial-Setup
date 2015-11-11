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
Which is shorthand for
```shell
cd ~/Sites
git clone ssh://codeserver.dev.[...]/~/repository.git example.com
cd example.com
```

### Remotes
Rename origin to pantheon and add github as origin
```shell
git remote rename origin pantheon
git remote add origin git@github.com:username/repository.git
```

### Themes
Remove legacy themes
```shell
cd wp-content/themes
find . -type d ! -name 'twentyfifteen' -d 1 -print -exec rm -r {} +;
```
