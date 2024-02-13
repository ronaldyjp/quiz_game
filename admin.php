<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
      <v-main>
        <v-container>
            <v-card>

            <a href="http://asjas.org/quiz/questionScreen.php" target="q">Question </a><br>
            <a href="http://asjas.org/quiz/answerScreen.php"  target="u">Answer</a><br>
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
