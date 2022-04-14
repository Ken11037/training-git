# 研修用リポジトリ

## ユーザー名

各説明に出てくる「`{★ユーザー名}`」は自分のエプコットメールアドレスのユーザー名（@マークの左）を使ってください。

- メールアドレス `"taro.yamada@epkotsoftware.co.jp"` の例
  - `{★ユーザー名}`: `taro.yamada`
    - ブランチ名: `feature/taro.yamada`
    - ユーザーディレクトリ名: `taro.yamada`

## 注意

- 環境構築を行うディレクトリ（git cloneするディレクトリ）はクラウドストレージの**管理外**のディレクトリ内で行ってください。
  - Windowsの場合は「OneDrive」、OneDriveのアイコンがついていない場所にする。
    - まるに緑チェックなに？｜OneDrive-アイコンの意味
      - <https://pc119.toyama.jp/work/%E3%81%BE%E3%82%8B%E3%81%AB%E7%B7%91%E3%83%81%E3%82%A7%E3%83%83%E3%82%AF%E3%81%AA%E3%81%AB%EF%BC%9F%EF%BD%9Conedrive-%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B3%E3%81%AE%E6%84%8F%E5%91%B3/>
    - デスクトップ等もOneDrive管理になりますのでご注意ください。
    - よくわからない場合、「`C:\Users\{自分のWindowsユーザー名}\Documents`」配下に作ることをおすすめします。
  - Macの場合は「iCloud Drive」、iCloudを使用していない場所にする。
    - <https://support.apple.com/ja-jp/HT204025>
  - その他のクラウドストレージ、ご自身で設定しているはずなので説明は割愛します。
    - Nextcloud
    - Dropbox
    - Google ドライブ

## 環境構築

- 以下の手順で構築してください（わからない場合は[環境構築詳細](#環境構築詳細)へ）
  - リポジトリクローン
    - リポジトリ: <https://github.com/epkotsoftware/training>
  - Git設定
    - 「`git config --local core.autocrlf input`」を実行し設定を行う。
    - 「`git config --local core.autocrlf`」を実行し設定されていることを確認する。
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
- Mac での例
  - 任意の場所に「`epkotsoftware`」フォルダー（ディレクトリ）を作成します。
    - 例: `/Users/{Macユーザー名}/git/epkotsoftware`
    - 参考: Finderでホームを表示
      - <https://dtmmethod.com/mac-finder-home>
  - 作成したフォルダーのメニューを出し、「`フォルダに新規ターミナル`」を選択してください。  

GitBash(ターミナル)で`pwd`コマンドを入力してEnterを押すと  
現在のディレクトリのパスが見れます。

```bash
epkot@epkot epkotsoftware % pwd
/Users/epkot/git/epkotsoftware
epkot@epkot epkotsoftware % 
```

#### コマンド

GitBash(Windows)またはターミナル(Mac)でコマンドを1行ずつ入力してEnterを押してください（`#`から始まっているコメントは不要）。

- **初回の「git clone」実行時にトークンが求められますので予めご用意ください。**
  - [GitHubアカウント作成](https://epkotsoftware.github.io/github.html#githubアカウント作成)
  - Macの場合、トークンの入力画面ではなく、以下のようにUsername、Passwordが求められます。

    ```bash
    Username for 'https://github.com':  ★GitHubユーザー名を入力　例:taro-yamada-epkotsoftware
    Password for 'https://{自分のGitHubユーザー名}@github.com': ★トークンを入力　※入力しても見えないので注意
    ```

- `{★ユーザー名}`はルールが決まっていますのでご注意ください（[ユーザー名](#ユーザー名)参照）

```bash
# GitHubのリポジトリをローカルに複製
git clone https://github.com/epkotsoftware/training.git
# 現在のディレクトリを training に変更
cd training
# Gitコンフィグ設定（core.autocrlf に「input」を設定）
git config --local core.autocrlf input
# Gitコンフィグ設定確認（「input」が表示されること）
git config --local core.autocrlf
# 現在のディレクトリを training/users/ に変更
cd users
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

## 社内開発

研修終了後（自己学習）に社内で開発しているシステム（提案止まり含む）の
リポジトリにアクセス出来るようになります。  

- 技術者マッチングサイトの開発
  - <https://github.com/epkotsoftware/dev-it-matching>
- 勤怠管理・労務管理システムの開発
  - <https://github.com/epkotsoftware/internal-system>
- 助成金申請向けWeb診断サイトの開発
  - <https://github.com/epkotsoftware/dev-subsidy>
- 薬剤師会向けWeb報告システムの開発
  - <https://github.com/epkotsoftware/dev-proposal/tree/main/pre-avoid>
- 顧客管理システムの開発
  - <https://github.com/epkotsoftware/dev-proposal/tree/main/dev-survey-management-system>

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
