# CodeIgniter4.1環境

CodeIgniter4.1の環境を構築します。

- 公式
  - User Guide
    - <https://codeigniter4.github.io/userguide/>
  - GitHub
    - <https://github.com/codeigniter4/CodeIgniter4>

## 開発環境

Dockerを使って環境を構築します。  
本リポジトリで使用する場合、自分のユーザーディレクトリ内に [env/ci4_1/](./) をコピーしてお使いください。

### 開発環境について

- ソースコードについては2022/03/02時点で「`composer create-project codeigniter4/appstarter {ディレクトリ名}`」コマンドで生成したものになります。
  - <https://codeigniter4.github.io/CodeIgniter4/installation/installing_composer.html>
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

### CodeIgniter

CodeIgniter関連のコマンドはDockerで用意した、WEBサーバー上で行います。

```bash
# ■ Git Bashで入力
# WEBサーバーに入るコマンド
docker exec -it env-ci4_1-web bash
```

#### spark

Laravelの「artisan」にあたるのが「spark」になります。

- Laravel Artisan Console
  - <https://readouble.com/laravel/8.x/ja/artisan.html>

「`php spark list`」コマンドで使用可能なコマンドの一覧を見る事が出来ます。

```bash
# ■ WEBサーバーで入力
cd /var/www/root
php spark list
```

#### composer install

```bash
# ■ WEBサーバーで入力
cd /var/www/root
# 「composer.json」、「composer.lock」に記載されているパッケージをvendorディレクトリにインストール
#   ※ 時間がかかるので注意。
composer install
```

`composer install` 実行後に「`Exception`」が出ていると失敗しているので  
[root/vendor/](./root/vendor/)ディレクトリを削除して、再実行してみましょう。  
「`successfully`」が出ていれば成功です。

#### CodeIgniter初期設定

```bash
# ■ WEBサーバーで入力
cd /var/www/root
# 「.env」ファイル
## 「.env.dev」ファイルを「.env」にコピー
cp .env.dev .env
## 「.env」ファイルの APP_KEY 生成
php spark key:generate
# writable ディレクトリに読み取り・書き込み権限を与える（writable内に書き込み（ログ出力時等）に「CacheException」のエラーが発生する）
chmod -R 777 writable/
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

### envファイル設定

Laravelの「`.env`」ファイルの設定を確認してください。  
DB設定については「`.env.dev`」に記載していて、それをコピーした「`.env`」にも既に記載されていますが、確認してください。

```ini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=ci4
DB_USERNAME=root
DB_PASSWORD=root
```

### データベースの確認

「[`docker/.env`](./docker/.env)」ファイルの`DB_DATABASE`のデータベースが実際に追加されていることを確認してください(`ci4`)。

### 日本設定
