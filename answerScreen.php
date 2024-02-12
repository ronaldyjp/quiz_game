<?php
    include './common.php';
?>
  <div id="app">
    <v-app :style="appStyles"  >
      <v-app-bar
        color="blue"
        dense
        dark
        app
      >        
      <v-toolbar-title style="color: #000000;">Word Quiz Answer Page</v-toolbar-title>
        <v-spacer></v-spacer>
        
      <v-menu
        left
        bottom
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            icon
            v-bind="attrs"
            v-on="on"
          >
            <v-icon>mdi-account-circle</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item>
            <v-list-item-title> user ID: {{infoUser.user_id}}</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title> user name: {{infoUser.user_name}} </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      </v-app-bar>


      <v-main>
        <v-container>
            <!-- <v-card v-if="!showCard"> -->
            <v-card>
              <v-card-text>
                <v-form>
                <v-text-field prepend-icon="mdi-email-outline" label="email" v-model="email" />
                </v-form>
              </v-card-text>

                <v-card-actions>
                    <v-btn class="info" value="send" v-on:click="getUserPhp(); showCard=!showCard">送信</v-btn>
                </v-card-actions>
            </v-card>
            <!-- <div> {{email}} </div>
            <div> {{infoUser.event_id}} </div> -->
        </v-container>
        <v-container >
            <!-- <v-card v-if="!showCard"> -->
            <v-card>
              <v-card-text>
              <v-radio-group v-model="gameRadios">
                <div v-for="item in infoGame">
                  <v-radio :label="'Game: ' + item.game_id" :value="item.game_id"></v-radio>
                </div>
                  </v-radio-group>
              </v-card-text>
              <div>{{gameRadios}}</div>
                <v-card-actions>
                    <v-btn class="info" value="send" v-on:click="getAnswerSheetphp(gameRadios)">送信</v-btn>
                </v-card-actions>
            </v-card>
            <!-- <div> {{email}} </div>
            <div> {{infoUser.event_id}} </div> -->
        </v-container>
        <!-- 終了後非表示にできない -->
        <v-container v-if="currentQuestionNumber < questionsLength"> 
          <v-card>
            <div>回答</div>
            <div>
              第 {{currentQuestionNumber + 1}} 問 /  第 {{questionsLength}} 問
            </div>
            <v-card-text>
            <div class="ml-2 mb-4 text-h5 text--primary">
            <v-radio-group v-model="answerRadios">
              <v-radio label="1" value="1"></v-radio>
              <v-radio label="2" value="2"></v-radio>
              <v-radio label="3" value="3"></v-radio>
              <v-radio label="4" value="4"></v-radio>
            </v-radio-group>
            </div>
            <div>選択：{{answerRadios}}</div>
            </v-card-text>
            <v-card-actions>
              <v-btn class="info" value="send" v-on:click="getAnswerphp(answerRadios);questionNumber();handleButtonClick()">回答</v-btn>
            </v-card-actions>
          </v-card>
        </v-container>
        <v-container v-if="currentQuestionNumber > questionsLength">
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
        showCard: false,
        gameRadios:'',
        answerRadios: '',
        
        message: 'Answer Screen',

        infoEvent:{
          event_id: '',
          event_name: '',
          event_date: '',
          event_city: '',
        },
        infoGame:[],
        infoUser:{
         event_id:'',
         event_name:'',
         team_id:'',
         team_name:'',
         team_school:'',
         user_id:'',
         user_name:''
        },
        infoQuestionId:[],
        email:'user1_1@asjas.org',
        currentQuestionNumber: 0,
        questionsLength:0,

      },
      methods:{
        questionNumber: function(){
          this.currentQuestionNumber += 1
        },
        handleButtonClick: function(){
          this.answerRadios ="";
        },
        getEventPhp: function(){
          axios.get('/quiz_game/api/event.php')
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
        getUserPhp: function(){
          axios.get('/quiz_game/api/user.php', 
          {
            params:
            {
              email:this.email
            }
          }
          )
          .then(res =>{
            var user = res.data.data
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
            console.log(res)
          })
          .catch(function (error) {
            console.log(error);
          })
        },
        getAnswerSheetphp:function(id){
          axios.get('/quiz_game/api/answer_sheet.php', 
          {
            params:
            {
              game_id:id
            }
          })
          .then(res =>{
            var question = res.data.data
            for(var key in question){
              if(question[key].id && !this.infoQuestionId.includes(question[key].id)){
                this.infoQuestionId.push({
                  question_id: question[key].id
                });
              }
            }
            this.questionsLength = Object.keys(this.infoQuestionId).length; 
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

        getAnswerphp:function(answer){
          axios.get('/quiz_game/api/answer.php', 
          {
            params:
            {
              user_id:this.infoUser.user_id,
              event_id:this.infoUser.event_id,
              question_id:this.infoQuestionId[this.currentQuestionNumber].question_id,
              answer:answer
              // question_id: this.
            }
          })
          .then(res =>{
            console.log(res)          
          })
          .catch(function (error) {
            console.log(error);
          })
        }

      },
      created(){ 
        // コンポーネントが作成された直後に myMethod を呼び出す
        //this.getEventPhp();
      }
    })
  </script>
</body>
</html>
