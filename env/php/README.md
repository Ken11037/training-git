# PHP環境

PHPの環境を構築します。

## 開発環境

Dockerを使って環境を構築します。  
本リポジトリで使用する場合、自分のユーザーディレクトリ内に [env/php/](./) をコピーしてお使いください。

### ターミナル

コマンド入力が必要な手順については、「PowerShell」・「GitBash」等でコマンドを入力してください。  
VSCodeの「ターミナル」でも使用が可能です。  

### Docker

Docker Desktopをインストールしてください。

- Docker (参考情報)
  - <https://epkotsoftware.github.io/training/docker/>

#### .env

各名称・ポート設定が可能です。  
IPとポートが重複すると、コンテナが起動しないので  
自身の環境に合わせて設定を変えてください。

#### 構成

- Docker 例 (参考情報)
  - <https://epkotsoftware.github.io/training/docker/example/>

#### 開発環境構築

以下のコマンドを実行します。

```bash
# ターミナルで実行
## ls コマンドで docker-compose.yml があるか確認
$ ls
README.md               docker                  docker-compose.yml      htdocs
## docker-compose で環境構築  ※ 時間がかかるので注意
$ docker-compose up -d
```

上記コマンドでエラーがなければ環境構築が完了しています。

#### 確認

- WEB ※ ポート番号は [`.env`](./.env) の `PORT_WEB` を参照
  - <http://localhost:80/>  
    [htdocs/index.php](./htdocs/index.php)の実行結果が画面に表示されます。
- phpMyAdmin ※ ポート番号は [`.env`](./.env) の `PORT_PHPMYADMIN` を参照
  - <http://localhost:8080>

### SQLクライアント

- `DBeaver`
  - <https://dbeaver.io/>
  - 接続情報 ※ [`.env`](./.env) の情報にあわせて設定すること
    - ドライバ名: `MySQL`
    - ServerHost: `localhost`  ～  `IP` 参照 (localhost = 127.0.0.1)
    - Port: `3316`  ～  `PORT_DB` 参照
    - Database: ※ 未入力でOK
    - ユーザー名: `root`
    - パスワード: `root`  ～  `DB_ROOT_PASSWORD` 参照
- `A5:SQL Mk-2`
  - <https://a5m2.mmatsubara.com/>
  - 接続情報 ※ [`.env`](./.env) の情報にあわせて設定すること
    - ホスト名: `localhost`  ～  `IP` 参照 (localhost = 127.0.0.1)
    - ユーザーID: `root`
    - パスワード: `root`  ～  `DB_ROOT_PASSWORD` 参照
    - ポート番号: `3316`  ～  `PORT_DB` 参照
