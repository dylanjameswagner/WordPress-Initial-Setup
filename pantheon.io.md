## Pantheon Install (example.com)

```shell
cd ~/Sites
git clone ssh://codeserver.dev.[...]/~/repository.git example.com; $_
```

```shell
git remote rename origin pantheon
git remote add origin https://github.com/teamcolab/example.com
```

```shell
mkdir wp; mv * $_
cp wp/index.php index.php
sed -ie "s/'\/wp-blog-header.php/'\/wp\/wp-blog-header.php/g" index.php
rm index.phpe
```

```shell
git add -A
git commit -m "move wordpress into subdirectory"
```
