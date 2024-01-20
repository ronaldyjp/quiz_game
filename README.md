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
