# 研修用リポジトリ

## ユーザー名

各説明に出てくる「`{★ユーザー名}`」は自分のエプコットメールアドレスのユーザー名（@マークの左）を使ってください。

- メールアドレス `"taro.yamada@epkotsoftware.co.jp"` の例
  - `{★ユーザー名}`: `taro.yamada`
    - ブランチ名: `feature/taro.yamada`
    - ユーザーディレクトリ名: `taro.yamada`

## 注意

- 環境構築を行うフォルダー（git cloneするディレクトリ）はクラウドストレージの**管理外**のフォルダー(ディレクトリ)内で行ってください。
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
現在のフォルダー(ディレクトリ)のパスが見れます。  
末端が「**epkotsoftware**」になっていることを確認しましょう。  

```bash
epkot@epkot epkotsoftware % # Macのターミナルの例
epkot@epkot epkotsoftware % pwd
/Users/epkot/git/epkotsoftware
epkot@epkot epkotsoftware % 
```

### リポジトリクローン

GitBash(Windows)またはターミナル(Mac)でコマンドを1行ずつ入力してEnterを押してください（`#`から始まっているコメントは不要）。  

※ **GitBashアプリの場合、コマンドをペーストするショートカットキーが `Ctrl+V` ではないので**  
  **右クリックメニューの「Paste」で貼り付けてください。**  

初めてgitを触る場合、トークンの入力が求められるので準備してください。  

- トークンの準備（他者には見せないようにご注意ください）
  - <https://epkotsoftware.github.io/github/#トークン>

トークンの準備が出来たら以下のコマンドを実行します。  
実行後トークンの入力が求められるかと思います。  

```bash
# GitHubのリポジトリをローカルに複製
git clone https://github.com/epkotsoftware/training.git
```

---

WindowsのGitBashで実行した例  
![git_clone](./images/git_clone.png)  

---

GitBash(ターミナル)は閉じましょう。

### VSCodeで開く

- VSCodeで「training」を開く
  - VSCodeを開き「フォルダーを開く」から「git/epkotsoftware」フォルダー内の「**training**」フォルダを選択
- ターミナルを表示
  - メニューバー「表示」→「ターミナル」
- 既定のターミナルを変更 (Windows)
  - 「既定のプロファイルの選択」→ 「Git Bash」を選択  
     ![vscode](./images/vscode_terminal.png)  
  - 「+」アイコンでターミナルを出すとターミナルとしてGitBashが使われるようになる。

---

以下のような表示になります(Windows例)。

![vscode](./images/vscode.png)  

---

### ユーザーブランチ・ディレクトリ作成

ユーザーブランチ及び、ユーザーディレクトリ(フォルダー)を作成します  

```mermaid
%%{init: {'gitGraph':{'mainBranchName':'template','rotateCommitLabel':false}}}%%
gitGraph
commit id:"templateブランチ最終コミット"
branch feature/xxxx
commit id:"ユーザーディレクトリ追加コミット"
```

VSCodeのターミナルでコマンドを1行ずつ打っていきます。

---

- `{★ユーザー名}`はルールが決まっていますのでご注意ください（[ユーザー名](#ユーザー名)参照）  
  ※ **「{」、「}」をブランチ名やディレクトリ名に含める人が多いですが不要です。**
  - 例
    - ブランチ名: `feature/taro.yamada`
    - ユーザーディレクトリ名: `taro.yamada`

```bash
# パスの確認 「epkotsoftware/training」が含まれること
pwd
# Gitコンフィグ設定（core.autocrlf に「input」を設定）
git config --local core.autocrlf input
# Gitコンフィグ設定確認（「input」が表示されること）
git config --local core.autocrlf
# 現在のブランチから、ユーザーブランチを作成してチェックアウト
#   ブランチ名例: feature/taro.yamada
git checkout -b feature/{★ユーザー名}
# training/users/_template ディレクトリを training/users/{★ユーザー名} にコピー
#   ユーザーディレクトリパス例: `users/taro.yamada`
cp -r users/_template/ users/{★ユーザー名}
# コピーしたディレクトリをステージング (warningが出ることがありますが無視でOKです)
git add .
# ステージングしたファイルをコミット
git commit -m "★任意のコメント"
```

- 実行例 (ユーザー名: taro.yamada　の場合)
  ![git_clone](./images/vscode_command.png)  

---

ここまでの手順で「[epkotsoftware/training/users/{★ユーザー名}](./users/)」にフォルダーが出来ていることを確認してください。  
問題なければ、以下のコマンドでpushします。

---

```bash
# GitHubへ作成したブランチを公開
#   ブランチ名例: feature/taro.yamada
git push -u origin feature/{★ユーザー名}
```

- コマンド例 (ユーザー名: taro.yamada　の場合)
  - `git push -u origin feature/taro.yamada`

---

これでGitHubにアップされているので確認しましょう。

- 確認
  - 作成したブランチがGitHub上に出来ているか確認してください。
    - <https://github.com/epkotsoftware/training/branches/yours>

## 禁止事項

- [users](./users/)の自分のユーザーディレクトリ以外の変更を禁止します。
  - [users/README.md](./users/README.md) にも記載しています。
