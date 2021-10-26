# 研修用リポジトリ

## ユーザー名

各説明に出てくる「`{★ユーザー名}`」は自分のメールアドレスのユーザー名を使ってください。

- メールアドレス `"taro.yamada@epkotsoftware.co.jp"` の例
  - `{★ユーザー名}`: `taro.yamada`
    - ブランチ名: `feature/taro.yamada`
    - ユーザーディレクトリ名: `taro.yamada`

## 環境構築

- 以下の手順で構築してください（わからない場合は[環境構築詳細](#環境構築詳細)へ）
  - リポジトリクローン
    - リポジトリ: <https://github.com/epkotsoftware/training>
  - 「`template`」ブランチから「`feature/{★ユーザー名}`」ブランチを作成
  - 「[users/_template/](./users/_template/)」フォルダを「`users/{★ユーザー名}`」にコピーして「`feature/{★ユーザー名}`」ブランチにコミット
  - 作成したブランチをGitHubへpush

### 環境構築詳細

- Windows での例
  - 任意の場所に「`epkotsoftware`」フォルダー（ディレクトリ）を作成します。
    - 例: `C:\Users\{Windowsユーザー名}\Documents\git\epkotsoftware`
    ![new_folder.png](./images/new_folder.png)
  - 作成したフォルダーを右クリックし、「`Git Bash Here`」を選択してください。
    ![git_bash_here](./images/git_bash_here.png)
  - 開かれた`Git Bash`上で以下のコマンドを1行ずつ入力してEnterを押してください（`#`から始まっているコメントは不要）。

```bash
# GitHubのリポジトリをローカルに複製
git clone https://github.com/epkotsoftware/training.git
# 現在のディレクトリを training/users/ に変更
cd training/users/
# 現在のブランチから、ユーザーブランチを作成してチェックアウト
git checkout -b feature/{★ユーザー名}
# training/users/_template ディレクトリを training/users/{★ユーザー名} にコピー
cp -r _template/ {★ユーザー名}/
# コピーしたディレクトリをステージング
git add .
# ステージングしたファイルをコミット
git commit -m "★任意のコメント"
```

ここまでの手順で「[epkotsoftware/training/users/{★ユーザー名}](./users/)」にフォルダーが出来ていることを確認してください。  
問題なければ、以下のコマンドでpushします。

```bash
# GitHubへ作成したブランチを公開
git push -u origin feature/{★ユーザー名}
```

- 実行例
  - ![git_clone](./images/git_clone.png)
- 確認
  - 作成したブランチがGitHub上に出来ているか確認してください。
    - <https://github.com/epkotsoftware/training/branches/yours>

## 研修講師

### Osanai Seiya

- 1983年生まれ
- 経歴
  - 情報系専門学校卒
  - 2009/08 : 異業種からプログラマーへ
    - 企画、PM、PL、TL、設計、開発、教育 を経験
  - 2021/10 : 研修担当へ
- 設計・開発経験
  - 分野
    - 某音楽配信サービス バックエンド
    - 金融システム
    - 投資信託WEBシステム
    - フレームワーク開発 (C#)
    - GIS（地理情報システム） デスクトップアプリ・スマートフォンアプリ・WEB
    - ハンディーターミナルアプリ
  - 言語
    - PHP、JavaScript、C++、Java、C#、VB.Net、VBA、VB6、Objective-C
