<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
      <v-main>
        <v-container>
            <v-card>

            <a href="http://asjas.org/quiz/questionScreen.php" target="q">Dispplay Question </a><br>
            <a href="http://asjas.org/quiz/answer.php?user1_1@asjas.org"  target="u">Student Answer</a><br>
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
