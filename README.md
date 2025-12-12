# SkillVista

**動画学習サイト**

## 画面イメージ
|ログイン選択|
|---|
|<img width="100%" alt="select_login" src="https://github.com/user-attachments/assets/26e373c4-31ff-4826-9f90-65312a789956" />|

|教師ログイン|ユーザーログイン|
|---|---|
|<img width="100%" alt="login_teacher" src="https://github.com/user-attachments/assets/3e47d653-6cbe-4756-815e-5aee1bb5b729" />|<img width="100%" alt="login_user" src="https://github.com/user-attachments/assets/b05d2a2e-04c7-430c-a7da-01a852aa7c8d" />|

|教師新規登録|ユーザー新規登録|
|---|---|
|<img width="100%" alt="create_teacher" src="https://github.com/user-attachments/assets/cf55ee37-a38d-42c3-aec4-f8f802fd5898" />|<img width="100%" alt="create_user" src="https://github.com/user-attachments/assets/fae92e7a-9bc9-43d9-b3b6-0335cbd3c11f" />|

|TOP|カテゴリ絞り込み|
|---|---|
|<img width="100%" alt="top" src="https://github.com/user-attachments/assets/1e80828b-1399-43c1-bfb7-dbd614a7118b" />|<img width="100%" alt="php" src="https://github.com/user-attachments/assets/62dfd526-a91b-4a77-b7ee-9852b397b4b5" />|

|コースの内容|評価モーダル|
|---|---|
|<img width="100%" alt="course" src="https://github.com/user-attachments/assets/782779e0-e87f-451e-87fa-4b7974cf5443" />|<img width="100%" alt="rate_modal" src="https://github.com/user-attachments/assets/61fcfd65-0db7-4129-95d9-1e594a426994" />|

|動画一覧|Q & A|
|---|---|
|<img width="100%" alt="movie" src="https://github.com/user-attachments/assets/83ec1ac4-bbe0-4c87-b02c-421974f99fff" />|<img width="100%" alt="q_a" src="https://github.com/user-attachments/assets/40576c62-a2e5-47a4-b79e-1db551128ce2" />|

|教師プロフィール|教師マイ設定|
|---|---|
|<img width="100%" alt="teacher_presentation" src="https://github.com/user-attachments/assets/87b855b9-4ee7-4481-a23e-903960a44212" />|<img width="100%" alt="teacher_profile" src="https://github.com/user-attachments/assets/20cffc2e-1456-467c-bf9a-ea232dc2c744" />|

|アイコン編集|パスワード編集|
|---|---|
|<img width="100%" alt="update_icon" src="https://github.com/user-attachments/assets/ba70481f-3a5a-41b3-9ca5-8c7c18a4c0b5" />|<img width="100%" alt="update_password" src="https://github.com/user-attachments/assets/55d215e3-0e62-463b-aba0-2a58e7a51437" />|


## 環境

- Laravel
- Tailwindcss

## 情報

- プロジェクト：http://localhost/top
- phpMyAdmin：http://localhost:18080
- mailpit：http://localhost:8025

- テストユーザーアドレス：test@example.com
- テストユーザーパス：password

- テスト教師ユーザーアドレス：test_t@example.com
- テスト教師ユーザーパス：password

## 使い方

### 初期インストール（プロジェクトルートで）

```bash
$ make install
```

### 次回以降コンテナ起動（プロジェクトルートで）

```bash
$ make up
```

### npm install
```bash
$ make npm-install
```

### vite立ち上げ

```bash
$ cd src
$ npm run dev
```

### composer install（プロジェクトルートで）
```bash
$ make composer-install
```

### マイグレーションの実行（プロジェクトルートで）

```bash
$ make migrate
```

### コンテナ停止（プロジェクトルートで）

```bash
$ make down
```

### コンテナ再起動（プロジェクトルートで）

```bash
$ make restart
```

### appコンテナシェルログイン（php）（プロジェクトルートで）

```bash
$ make app
```

### すべてのテーブルを削除後にマイグレーション・シーダの実行（プロジェクトルートで）

```bash
$ make fresh
```

### シーダの実行（プロジェクトルートで）

```bash
$ make seed
```

### Laravelキャッシュクリア（プロジェクトルートで）

```bash
$ make clear
```

## コンテナ情報

### app container

- Base image
  - [php](https://hub.docker.com/_/php):8.3-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.6

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.25

### db container

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### phpmyadmin container

- Base image
  - [phpmyadmin/phpmyadmin](https://hub.docker.com/_/phpmyadmin):最新版

### mailpit container

- Base image
  - [axllent/mailpit](https://hub.docker.com/r/axllent/mailpit)
