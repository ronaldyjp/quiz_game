<?php
    include './common.php';
    $url = explode('?',$_SERVER['REQUEST_URI']);
    $email = $url[1];
?>
  <div id="app">   
    <v-app :style="appStyles"  >
      <v-app-bar
        color="blue"
        dense
        dark
        app
      >        
      <v-toolbar-title style="color: #ffffff;" v-if="data.result.status =='success'">{{event.event_name}}</v-toolbar-title>
        <v-spacer>
        </v-spacer>
        
        <v-icon>mdi-account-circle</v-icon>
        {{event.name}}
        &nbsp;
      </v-app-bar>
      <v-main>
        <v-container v-if="data.result.status=='success'">
            <!-- <v-card v-if="!showCard"> -->
            <v-card  class="text-center">
              <v-card-text>
                <div class="text-h6">會場： {{event.game_name}} </div>
                <div class="text-h6">日期： {{event.game_date}} </div>
                <div class="text-h6">比賽結果</div>
                <div class="text-h6">{{event.result}} </div>
              </v-card-text>
                <v-card-actions>
                    <v-btn large color="primary" class="mx-auto" value="send" v-on:click="downloadCert()">下載【參加証書】</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>

       <v-container  v-if="data.result.status !='success'">
            <v-card
            class="mx-auto"
              max-width="900"
            >
              <v-card-text class="pa-5">
                    <!-- padding -->

                  <div class="  text-h5 text-center">

                      {{data.result.message}}
                    
                  </div>
              </v-card-text>

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
        data:null,
        event:null
      },
      created() {
        this.getResultApi();
      },
      methods:{
        downloadCert: function(){
          // alert("call downloadCert()");
          window.open('https://asjas.org/api/report.api?api=QuizService.downloadQuizCert&city=' + this.event.city + '&event_id=' + this.event.event_id + '&email=' + this.event.email + '&format=pdf&report=cert', '_blank');
        },
        getResultApi: function(){
          // alert("call getUserPhp()");
          axios.get('./api/result.php?email=<?= $email ?>')
          .then(res =>{
            this.data = res.data
            this.event = res.data.data
            console.log(res)
          })
          .catch(function (error) {
            console.log(error);
          })
        }


      }
    })
  </script>
</body>
</html>
