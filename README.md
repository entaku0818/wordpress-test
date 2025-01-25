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

## 開発者向け情報
- データベース情報:
  - ホスト: db
  - データベース名: wordpress
  - ユーザー名: wordpress
  - パスワード: wordpress
