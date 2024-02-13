<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
      <v-main>
        <v-container>
            <v-card>
            LOCAL
            <br>
            <a href="./questionScreen.php" target="q">Question </a><br>
            <a href="./answerScreen.php" target="u">AnswerScreen </a><br>
            <a href="./api.php" target="a">API </a><br>
            <p>
            <v-card>
            SERVER
            <br>
            <a href="http://asjas.org/quiz/questionScreen.php" target="q">Question </a><br>
            <a href="http://asjas.org/quiz/answerScreen.php"  target="u">AnswerScreen </a><br>
            <a href="http://asjas.org/quiz/api.php" target="a">API </a><br>
            </v-card>
        </v-container>
      </v-main>
    </v-app>
  </div>

  <?=$common_js?>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
     data: {
        message: 'QUIZ GAME'
    }
    })
  </script>
</body>
</html>
