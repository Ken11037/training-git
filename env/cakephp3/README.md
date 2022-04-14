# CakePHP 3.10環境

CakePHP 3.10の環境を構築します。

- 公式
  - User Guide
    - <https://book.cakephp.org/3/ja/>
  - GitHub
    - <https://github.com/cakephp/cakephp>

## 開発環境

Dockerを使って環境を構築します。  
本リポジトリで使用する場合、自分のユーザーディレクトリ内に [env/cakephp3/](./) をコピーしてお使いください。

### 開発環境について

- ソースコードについては2022/04/14時点で「`composer create-project --prefer-dist cakephp/app:^3.10 {ディレクトリ名}`」コマンドで生成したものになります。
  - <https://book.cakephp.org/3/ja/installation.html>
- 「`vendor`」ディレクトリは含まれていないので「`composer install`」が必要です。
- WEBサーバーは社内の開発では「`Apache（アパッチ）`」が使われることが多いため環境をあわせてあります。
  - 現場により、リクエスト数が多いサービス・DBサーバー等が分かれている環境では「`NGINX(エンジンエックス)`」が採用されることがあります。

### Docker

以下のコマンドを実行します（[docker/docker-compose-dev.yml](./docker/docker-compose-dev.yml) ファイルを指定）。

```bash
docker-compose -f docker/docker-compose-dev.yml up -d
```

#### 使用しているDockerイメージ

- PHP (`php:<version>-apache`)
  - <https://hub.docker.com/_/php?tab=tags>
  - composer (マルチステージビルドで使用しています)
    - <https://hub.docker.com/_/composer?tab=tags>
- MySQL
  - <https://hub.docker.com/_/mysql?tab=tags>
- phpMyAdmin
  - <https://hub.docker.com/r/phpmyadmin/phpmyadmin/tags>

### CakePHP
