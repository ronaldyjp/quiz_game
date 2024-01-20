# quiz_gamw

- 

# Commit pull push
```bash
git add .
git commit -m "message"
git push
```

# Install required software
- vscode


# Apache path setup

C:\xampp\apache\conf\httpd.conf


<Directory "C:/github/quiz_game">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>

<IfModule alias_module>
	
	Alias /quiz_game/ "C:/github\quiz_game/"
</IfModule>


# Function 

クェズ大会システム

要件：
・参加者グループに分け、グループには２人から５人まで構成しています。
・参加者は全員メールアドレスと名前で登録して、グループを分けるようにします。

クェズの問題は以下の要素で構成されています。
　　・１画像ファイル
　　・質問の文字
　　・４選択肢の文字
　　・１から４の一つの数字の正解
・ゲームは一回３０問があり，３０秒ごとに問題が切り替えます。２回実施する予定です。
・参加者はスマートフォンから指定したURL（例：http://XXXX/xxx?email=abc@gmail.com) で回答サイトに入ります。
・回答のサイトには登録者の名前が表示しています。
・回答サイトに現在実施しているゲーム（１回目、２回目）の問題番号と回答選択（１から４）を表示します。
・選択肢を選択したら、その回答を確認して、もし質問を表示している１０秒以内に正解になったら２点、１１秒以降に正解したら１点に加算します。
・同じグループメンバーの中に、最初の回答のみ加算して、後で答えた回答を無視します。
・ゲームの終了後、各グループが問題の回答結果（正解・不正解）と合計の点数を計算して、結果を表示します。
