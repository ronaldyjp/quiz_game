<!DOCTYPE html>
<html>
<head>
<title>QUIZ GAME</title>
</head>
<body>

<div id="app">
  {{ message }}
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'QUIZ GAME'
  }
})
</script>
</html> 