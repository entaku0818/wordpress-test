# WordPress Development Environment

## 概要
Dockerを使用したローカルWordPress開発環境

## 環境構築
1. Docker Desktopをインストール
2. リポジトリをクローン
   ```bash
   git clone https://github.com/entaku0818/wordpress-test.git
   cd wordpress-test
   ```
3. コンテナ起動
   ```bash
   docker-compose up -d
   ```

## 使用方法
- WordPressにアクセス: http://localhost:8000
- 管理画面: http://localhost:8000/wp-admin

## 停止方法
```bash
docker-compose down
```

## ディレクトリ構造
- wp-content/
  - languages/ - 日本語翻訳ファイル
  - plugins/ - インストール済みプラグイン
  - themes/ - 使用可能なテーマ

## 使用テーマ
- Twenty Twenty-Three (デフォルト)
- Twenty Twenty-Four
- Twenty Twenty-Five

## 使用プラグイン
- Akismet Anti-Spam
- Hello Dolly

## 言語設定
- 日本語 (ja) がデフォルトで有効化

## 開発者向け情報
- データベース情報:
  - ホスト: db
  - データベース名: wordpress
  - ユーザー名: wordpress
  - パスワード: wordpress
