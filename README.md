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

問題比賽系統

要求：
・參加者分為小組，每組由2至5人組成。
・所有參加者必須以電子郵件地址和姓名註冊，並分為小組。

此問題由以下要素組成：
・1個圖像文件
・問題正文
・4個自選角色
・1到4中的一個數字的正確答案
・遊戲中有30題，題目每30秒更換一次。計劃舉辦兩次。
・參與者透過智慧型手機使用指定的 URL（例如 http://XXXX/xxx?email=abc@gmail.com）進入回應網站。
・答題網站上會顯示報名者的姓名。
・目前正在玩的遊戲（第1次和第2次）的問題編號和答案選擇（1至4）將顯示在答案網站上。
- 選擇選項後，檢查你的答案，如果你在問題出現後10秒內答對，你將獲得2分，如果你在11秒後答對，你將獲得1分。
・只加入同一組成員中第一個答案，後面的答案將被忽略。
- 遊戲結束後，各組計算答案結果（正確/錯誤）和總分，並顯示結果。

相關網址:

/quiz/admin.php 管理人畫面
/quiz/questionScreen.php 學生回答問題畫面
/quiz/api.php　相關API的資料

相關的TABLE
q0001_user 參加者
q0002_team 參加組
q0004_user_answer 參加者的回答記錄
q0011_game 遊戲
q0012_event 比賽 
q0013_event_game_rel 比賽和遊戲
q0021_question 問題
q0022_question_show_record 問題顯示記錄


test url
https://asjas.org/quiz/answer.php?yeung@purecode.jp