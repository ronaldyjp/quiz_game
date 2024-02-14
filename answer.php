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
      <v-toolbar-title style="color: #ffffff;" v-if="infoUser">{{infoUser.event_name}}</v-toolbar-title>
        <v-spacer>
        </v-spacer>
        <v-btn icon>
          <v-icon>mdi-account-circle</v-icon>
        </v-btn>
        {{infoUser.user_name}}
      </v-app-bar>


      <v-main>
        <!--
        <v-container v-if="showEmail">
            <v-card>
              <v-card-text>
                <v-form>
                <v-text-field prepend-icon="mdi-email-outline" label="email" v-model="email" />
                </v-form>
              </v-card-text>

                <v-card-actions>
                    <v-btn class="info" value="send" v-on:click="getUserPhp(); showEmail=!showEmail; showGameBtn=!showGameBtn">送信</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
        -->
        <v-container v-if="showGameBtn">
            <!-- <v-card v-if="!showCard"> -->
            <v-card>
              <v-card-text>
              
              <v-radio-group v-model="game">
                <div v-for="item in infoGame">
                  <v-radio :label="item.name" :value="item"></v-radio>
                </div>
                  </v-radio-group>
              </v-card-text>
                <v-card-actions>
                    <!-- <v-btn class="info" value="send" v-on:click="getAnswerSheetphp(gameRadios.game_id); 
                    displayGameName=gameRadios.game_name; showGameBtn=!showGameBtn; showCard=!showCard; handleButtonClick()">送信</v-btn> -->
                    <v-btn class="info" value="send" v-on:click="getAnswerSheetphp">START</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
        <div v-if="showCard && game" class="ml-8 mb-2 text-h5 text--primary  text-center">
          {{game.game_name}}
        </div>
        <!-- 終了後非表示にできない -->
        <v-container v-if="showCard && currentQuestionNumber < questionsLength" class="text-center"> 
          <v-card>
            <div>回答</div>
            <div>
              第 {{currentQuestionNumber + 1}} 題 /  共 {{questionsLength}} 題
            </div>
            <v-card-text>
            <div class="ml-2 mb-4 text-h5 text--primary">
            <v-radio-group v-model="answerValue">
              <v-radio label="1" value="1"></v-radio>
              <v-radio label="2" value="2"></v-radio>
              <v-radio label="3" value="3"></v-radio>
              <v-radio label="4" value="4"></v-radio>
            </v-radio-group>
            </div>
            <div>選択：{{answerValue}}</div>
            </v-card-text>
            <v-card-actions>
              <v-btn class="info" value="send" v-on:click="sendAnswerphp()" :disabled='!(answerValue)'>回答</v-btn>
            </v-card-actions>
          </v-card>
        </v-container>

       <v-container  v-if="showCard && currentQuestionNumber == questionsLength">
            <v-card
            class="mx-auto"
              max-width="900"
            >
              <v-card-text class="pa-5">
                    <!-- padding -->

                  <div class=" ml-8 mb-2 text-h3 text--primary  text-center">

                      完結
                    
                  </div>
              </v-card-text>
              <v-card-actions class="justify-center">
                <v-btn
                  v-on:click="showCard=returnMain(); currentQuestionNumber=0; infoQuestionId=[]">
                  Return
                </v-btn>
              </v-card-actions>

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
        appStyles:{
          backgroundColor: "#b0e0e6",
          color: "#333"
        },
        showGameBtn:false,
        showCard: false,
        game: null,
        answerValue: '',
        displayGameName: "",
        message: 'Answer Screen',
        infoEvent:null,
        infoGame:null,
        infoUser:null,
        infoQuestionId:[],
        email: '<?= $email ?>',
        currentQuestionNumber: 0,
        questionsLength:0,

      },
      created() {
        this.getUserPhp();
      },
      methods:{
        nextQuestion: function(){
          this.currentQuestionNumber += 1;
          this.answerValue = "";
        },
        returnMain(){
          this.showGameBtn = true;
          this.showCard = false;
          
        },
        /*
        sendGameID: function(Ojt){
          this.getAnswerSheetphp(Ojt.game_id);
          this.displayGameName=Ojt.game_name;
          this.showGameBtn= false;
          this.showCard= true;
          this.handleButtonClick()
        },
        */
        /*
        getEventPhp: function(){
          axios.get('./api/event.php')
          .then(res =>{
           // var self = this
           var event = res.data.data;// ショートカット
           var game = res.data.data.games
            // alert('move');
            this.infoEvent.event_id = event.id
            this.infoEvent.event_name =event.name
            this.infoEvent.event_date = event.event_date
            this.infoEvent.event_city = event.city
            // console.log(res);
            for (var key in game){ //APIの返り値の連想配列から抜き出す方法 https://qiita.com/wakiwaki/items/df72519456e97867d1b2
              if(game[key].id && !this.infoGame.includes(game[key].id)){
                this.infoGame.push({
                  game_id: game[key].id,
                  game_name: game[key].name,
                  game_start_time: game[key].start_time,
                  game_end_time: game[key].end_time
                });
              }
            }

            console.log(this.infoEvent);
            console.log(this.infoGame);
           // alert(this.infoEvent.event_name);
          })
          .catch(function (error) {
            console.log(error);
          })
        },
        */
        getUserPhp: function(){
          // alert("call getUserPhp()");
          axios.get('./api/user.php?', 
          {
            params:
            {
              email: this.email
            }
          }
          )
          .then(res =>{
            this.infoUser = res.data.data;
            this.infoGame = this.infoUser.games;
            /*
            var game = res.data.data.games
            this.infoUser.event_id = user.event_id
            this.infoUser.event_name = user.event_name
            this.infoUser.team_id = user.team_id
            this.infoUser.team_name = user.team_name
            this.infoUser.user_id = user.user_id
            this.infoUser.user_name = user.user_name

            for (var key in game){ //APIの返り値の連想配列から抜き出す方法 https://qiita.com/wakiwaki/items/df72519456e97867d1b2
              if(game[key].id && !this.infoGame.includes(game[key].id)){
                this.infoGame.push({
                  game_id: game[key].id,
                  game_name: game[key].name,
                  game_start_time: game[key].start_time,
                  game_end_time: game[key].end_time
                });
              }
            }
            */
            this.showGameBtn = true;
            console.log(res)
          })
          .catch(function (error) {
            console.log(error);
          })
        },
        getAnswerSheetphp:function(){
          axios.get('./api/answer_sheet.php', 
          {
            params:
            {
              game_id: this.game.id
            }
          })
          .then(res =>{
            this.infoQuestionId = res.data.data
            /*
            for(var key in question){
              if(question[key].id && !this.infoQuestionId.includes(question[key].id)){
                this.infoQuestionId.push({
                  question_id: question[key].id
                });
              }
            }
            */
            this.questionsLength = this.infoQuestionId.length; 
            // this.displayGameName=Ojt.game_name;
            this.showGameBtn= false;
            this.showCard= true;
            console.log(this.questionsLength)

            // console.log(res.data.data)
            // console.log(res.data)
            // console.log(this.infoQuestionId)
            // console.log(this.infoQuestionId[0])
          })
          .catch(function (error) {
            console.log(error);
          })
        },
        sendAnswerphp(){
          var values = {
              user_id: this.infoUser.user_id,
              event_id: this.infoUser.event_id,
              question_id: this.infoQuestionId[this.currentQuestionNumber].id,
              answer: this.answerValue
          }
          console.log(values);
          axios.get('./api/answer.php', 
          {
            params: values
          })
          .then(res =>{
            console.log(res)          
          })
          .catch(function (error) {
            console.log(error);
          })
          this.nextQuestion();
        }

      }
    })
  </script>
</body>
</html>
