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

CakePHP関連のコマンドはDockerで用意した、WEBサーバー上で行います。

```bash
# ■ Git Bash等のターミナルで入力
# WEBサーバーに入るコマンド
docker exec -it env-cake3-web bash
```

#### composer install

```bash
# ■ WEBサーバーで入力
cd /var/www/root
# 「composer.json」、「composer.lock」に記載されているパッケージをvendorディレクトリにインストール
#   ※ 時間がかかるので注意。
composer install
```

#### CakePHP初期設定

`config/app_local.dev.php`ファイルにDB設定をしているので  
`config/app_local.php`に上書きします。

```bash
# ■ WEBサーバーで入力
cd /var/www/root
## 「app_local.dev.php」ファイルを「app_local.php」にコピー
cp config/app_local.dev.php config/app_local.php
```

#### 確認

- WEB ※ ポート番号は [`docker/.env`](./docker/.env) の `PORT_WEB` を参照
  - <http://localhost:80/>
- phpMyAdmin ※ ポート番号は [`docker/.env`](./docker/.env) の `PORT_PHPMYADMIN` を参照
  - <http://localhost:8080>

### SQLクライアント

- `A5:SQL Mk-2`
  - <https://a5m2.mmatsubara.com/>
- 接続情報 ※ [`docker/.env`](./docker/.env) の情報にあわせて設定すること
  - ホスト名: `localhost`  ～  `IP` 参照 (localhost = 127.0.0.1)
  - ユーザーID: `root`
  - パスワード: `root`  ～  `DB_ROOT_PASSWORD` 参照
  - ポート番号: `3306`  ～  `PORT_DB` 参照
