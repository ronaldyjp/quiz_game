<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
      <v-main>
        <v-container>
            <v-card>
            {{message}} 
            <br>
            <a href="./questionScreen.php">Question </a><br>
            <a href="./answerScreen.php">AnswerScreen </a><br>
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
