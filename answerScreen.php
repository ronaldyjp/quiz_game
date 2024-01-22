<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
      <v-main>
        <v-container>
            <v-card>
            {{message}}
            </v-card>
            <!-- <v-btn v-on:click="getAPIs()">ログイン</v-btn> -->
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
        message: 'Answer Screen',
        inforEvent:{
          
        },
      },
      methods:{
        getEventPhp: function(){
          axios.get('/quiz_game/api/event.php')
          .then(res =>{
            this.inforAll = res.data
            console.log(res);
            //console.log(this.inforAll)
          })
          .catch(function (error) {
            console.log(error);
          })
        }

      },
      created(){ 
        // コンポーネントが作成された直後に myMethod を呼び出す
        this.getEventPhp();
      }
    })
  </script>
</body>
</html>
