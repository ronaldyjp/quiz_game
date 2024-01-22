<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
      <v-main>
       
        <!-- <v-btn @click="startInterval()"> count</v-btn> -->
      
          <!-- ゲーム選択のボタン getQuestionPhpを呼び出し-->
        <li v-for="item in infoGame">
            <v-btn v-if="!showGameBtn"
             color="blue"
             value="item.game_id"
             v-on:click="getQuestionPhp(item.game_id); showStart = !showStart; showGameBtn = !showGameBtn">
             {{item.game_name}} {{item.game_id}}
            </v-btn>
        </li>
            <!--  ボタンをクリックしたら表示されるようにした -->
        <div>
        <v-btn 
          color="blue"
          v-if="showStart" 
          @click="showCard =!showCard;showStart = !showStart; startInterval()">
          start 
        </v-btn>
 
        </div>
          <v-container  v-if="showCard">
              <v-card class="slidecard"> 
              
                <h4 class="col-md-8 offset-md-2">
                    第 {{infoQuiz[currentQuestionNumber].question_id}} 問 / 
                    第 {{questionsLength}} 問
                </h4>
                <div class="col-md-8 offset-md-2">
                    <div>残り {{Count.sec}} 秒</div>
                </div>
                <div class="col-md-8 offset-md-2">
                  <h3>{{infoQuiz[currentQuestionNumber].question_question}}</h3>
                </div>
                <div class="col-md-8 offset-md-2">
                  <div> 【次の4つから選べ】</div>
                  <ol>
                    <li>{{infoQuiz[currentQuestionNumber].question_choices1}}</li>
                    <li>{{infoQuiz[currentQuestionNumber].question_choices2}}</li>
                    <li>{{infoQuiz[currentQuestionNumber].question_choices3}}</li>
                    <li>{{infoQuiz[currentQuestionNumber].question_choices4}}</li>
                  </ol>
                </div>
                <!-- <v-btn  color="blue" @click="nextQuestion()"> Next </v-btn> -->
                <!-- <v-card-text>テキスト</v-card-text> -->
                <!-- <v-card-actions>リンクなど</v-card-actions> -->
              </v-card>
            <!-- <v-btn v-on:click="getEventPhp()">ログイン</v-btn> -->
         </v-container>
         <!-- <v-btn @click="getShowQuestionPhp"> show_question </v-btn> -->
         <v-btn  v-if="showCard" @click=" timeStop()"> stop </v-btn>
         <v-btn  v-if="showCard" @click="startInterval()"> restart </v-btn>

         

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
        showGameBtn: false,
        showStart: false,
        showCard: false,
        infoEvent:{
          event_id: '',
          event_name: '',
          event_date: '',
          event_city: '',
        },
        infoGame:[],
        infoQuiz:[],
        currentQuestionNumber: 0, // 現在の問題番号start from 0
        questionsLength: 0,
        Count:{
          defaultSec: 10,
          sec: 10,
          timeFin: 0,
          intervalId: null,
        },
      
      },
      computed: {
        
      },
      methods:{
     
        nextQuestion(){
          if(this.currentQuestionNumber < this.questionsLength-1){
          this.currentQuestionNumber += 1
          }
        },     //ここから
        startInterval(){
          //alert('move');
          if(this.currentQuestionNumber < this.questionsLength-1){
            this.Count.intervalId = setInterval(() =>{
              this.Count.sec --;
              if(this.Count.sec < this.Count.timeFin){
                // alert('koko')
                //clearInterval(this.Count.intervalId);
                //this.Count.intervalId=null;
                //alert(this.Count.intervalId);
                this.Count.sec = this.Count.defaultSec;
                //this.nextQuestion();
                this.getShowQuestionPhp(this.currentQuestionNumber);//こっちが先
                this.currentQuestionNumber += 1
                
              }
            }, 1000);
          }else{
            clearInterval(this.Count.intervalId);
            //this.Count.intervalId=null;
          }
        },
        timeStop(){
          clearInterval(this.Count.intervalId);
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
              // var game_id = game[key].id
              // var game_name = game[key].name
              // var game_start_time = game[key].start_time
              // var game_end_time = game[key].end_time
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
        getQuestionPhp: function(id){
          return new Promise((resolve) => { //これが終わるまで次へ行かないようにする
          axios.get('/quiz_game/api/game.php',
          {
            params:{//クエリパラメータをつける方法
              game_id: id,
              event_id: 1
            }
          }
          )
          .then(res =>{
            //var game2 = res.data.data;
         // alert('move');
            var quiz =  res.data.data.questions;
            var game = res.data.data
            var game_id = game.id
            for (var key in quiz){
              if(quiz[key].id && !this.infoQuiz.includes(quiz[key].id)){
                this.infoQuiz.push({
                  game_id: game.id,
                  question_id: quiz[key].id,
                  question_question: quiz[key].question,
                  question_image: quiz[key].image,
                  question_choices1: quiz[key].choices1,
                  question_choices2: quiz[key].choices2,
                  question_choices3: quiz[key].choices3,
                  question_choices4: quiz[key].choices4,                
                  question_answer: quiz[key].answer,
                  question_image_ur: quiz[key].image_ur,
                })
              }
            }
            this.questionsLength = Object.keys(this.infoQuiz).length; 
            //alert(this.questionsLength);
            console.log(game_id)
            //console.log(this.infoQuiz[1].question_id);
            console.log(this.infoQuiz);
            resolve();
          })
          })

        },
        getShowQuestionPhp: function(questionNum){
          axios.get('/quiz_game/api/show_question.php',
          {
            params:
              {     //クエリパラメータをつける方法   
                // game_id: this.infoQuiz.game_id ,
                //event_id: this.infoEvent.event_id
                question_id: this.infoQuiz[questionNum].question_id,
                //question_id:1,
                event_id: this.infoEvent.event_id
              }
          } 
          )
          .then(res =>{
           
            //console.log(res);
              console.log(res.data.result.message);
          })
          .catch(function (error) {
            console.log(error);
          })
        },

      },
      created(){ 
        // コンポーネントが作成された直後に myMethod を呼び出す
         this.getEventPhp();
      }
    })
  </script>
</body>
</html>
