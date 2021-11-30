# Linux編

## 環境

Linux(`Ubuntu20.04 LTS`) の環境を構築します。

### Docker

Dockerインストール後に [04_ubuntu/docker/docker-compose-dev.yml](./docker/docker-compose-dev.yml) を指定して `docker-compose` を実行します。  
カレントディレクトリの場所によりパスの指定が変わります。

```bash
# docker-compose-dev.yml ファイルを指定して実行
docker-compose -f users/{★ユーザー名}/04_linux/docker/docker-compose-dev.yml up -d
```

## 操作

### Ubuntu環境

以下のコマンドでサーバーに入れます。

```bash
docker exec -it training-linux-ubuntu bash
```

ログアウトは`exit`コマンドを実行してください。
