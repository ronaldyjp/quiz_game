<html>
<body>
<center>
<h1>問答比賽 登入</h1>
<font size="+3">
<form>
  <label for="fname">電郵地址</label>
  <input type="text" name="email"  id="email"><br><br>
  <input type="button" value="  進 入  "  onclick="processFormData();">
</form> 
</font>
</center>
<script>
  function processFormData() {
  const email = document.getElementById('email').value;
  const url = 'http://asjas.org/quiz/answer.php?' + email;
  window.location = url;
}
</script>
</body>
</html>
