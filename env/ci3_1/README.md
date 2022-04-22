# CodeIgniter v3.1.0環境

CodeIgniter v3.1.0の環境を構築します。

- 公式
  - User Guide
    - <http://codeigniter.com/userguide3/>
  - User Guide（日本語翻訳）
    - <https://codeigniter.jp/user_guide/3/>
  - CodeIgniter のダウンロード
    - <https://codeigniter.jp/user_guide/3/installation/downloads.html>
  - GitHub
    - <https://github.com/bcit-ci/CodeIgniter>

## 開発環境

Dockerを使って環境を構築します。  
本リポジトリで使用する場合、自分のユーザーディレクトリ内に [env/ci3_1/](./) をコピーしてお使いください。

### 開発環境について

- ソースコードについては日本語翻訳のダウンロードページの「CodeIgniter v3.1.0」をダウンロードしたものになります。
  - <https://codeigniter.jp/user_guide/3/installation/downloads.html>
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
docker exec -it env-ci3_1-web bash
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
