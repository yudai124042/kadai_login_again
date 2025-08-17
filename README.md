# kadai_login_again

📘 README for PHP 05 ver2

目的
「PHP 04 ver2」のログイン＋CRUDに、簡易セッション維持（無操作タイムアウト）と保護ページガードを追加した“管理画面向け”バージョンです。

✅ できること（PHP 04 ver2 からの強化点）

セッションの自動起動（全ページ共通）

無操作タイムアウト（既定：30分で自動ログアウト）

未ログインアクセスの遮断（保護ページは自動で login.php にリダイレクト）

ログイン時のセッションID再発行（固定化攻撃対策）

既存の 宿泊プラン CRUD（登録/一覧/編集/削除） はそのまま使用

さらに堅牢化（Remember me、絶対タイムアウト等）は将来拡張想定。

📂 構成（主要ファイル）
PHP 05 ver2/
├─ session_boot.php        # セッション共通起動・無操作タイムアウト
├─ funcs.php               # db_conn(), loginCheck(), redirect()
├─ login.php / login_act.php / logout.php
├─ dashboard.php           # ログイン後メニュー
├─ insert.php / insert_act.php
├─ select.php
├─ update.php / update_act.php
├─ delete.php
└─ style.css
