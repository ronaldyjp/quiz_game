<?php
    include './common.php';
?>
  <div id="app" >
    <!-- <v-app style="font-family: 'YourFont', sans-serif; background-color: #b0e0e6 ;"> -->
    <v-app :style="appStyles"  >
      <v-app-bar
          color="blue"
          dense
          dark
          app
        >        
        <v-toolbar-title style="color: #ffffff;">{{infoEvent.event_name}}</v-toolbar-title>
          <v-spacer></v-spacer>
          

      </v-app-bar>

      <v-main>
          <!-- <div>{{currentQuestionNumber}}</div> -->
        <!-- <v-btn @click="startInterval()"> count</v-btn> -->
        <div v-if="!showGameBtn" class="mt-3 ml-8 mb-3" > 
          <div v-for="item in infoGame">
              <v-btn 
              color="orange-lighten-2"
              variant="text"
              class="mt-3 ml-8 mb-3"
              value="item.game_id"
              v-on:click="getQuestionPhp(item.game_id); displayGameName=item.game_name; showStart = !showStart; showGameBtn = !showGameBtn">
              {{item.game_name}}
              </v-btn>
          </div>
          <div>
            <v-btn
            color="orange-lighten-2"
              variant="text"
              class="mt-3 ml-8 mb-3"
              v-if="!haveReport"
                v-on:click="getReportPhp()">
                Result
            </v-btn>
          </div>
          <v-container v-if="haveReport">
          <v-card class="text-center">
            <v-row>
              <v-col>
              <h1>TOP 5</h1>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <h3><font color="blue">團體組 </font></h3>
                <div v-for="(item,index) in infoReportTeam">
                    <h3>第{{index+1}}位 {{item.school}}({{item.name}})</h3>
                    <div> 分數  {{item.point}} point , 時間: {{item.total_min | numFilter }} mins</div>
                </div>
              </v-col>
              <v-col>
                <h3><font color="blue">個人組 </font></h3>
                <div v-for="(item,index) in infoReportPerson">
                    <h3>第{{index+1}}位  {{item.name}}</h3>
                    <div>分數: {{item.point}} point, 時間: {{item.total_min | numFilter}} mins</div>
                </div>
              </v-col>
            </v-row>
            <v-row>
            <v-btn
            color="orange-lighten-2"
              variant="text"
              class="mt-3 ml-8 mb-3"
                v-on:click="clearReport()">
                Close
            </v-btn>
            </v-row>
          </v-card>
        </v-container>
        </div>
          <!-- ゲーム選択のボタン getQuestionPhpを呼び出し-->
 
            <!--  ボタンをクリックしたら表示されるようにした -->
        <div>
            <v-btn 
              color="orange-lighten-2"
              
              v-if="showStart" 
              class="mt-3 ml-8 mb-3" 
              @click="showCard =!showCard;showStart = !showStart; startInterval()">
              start 
            </v-btn>
        </div>
        <div v-if="showCard" class="ml-8 mb-2 text-h5 text--primary  text-center">
          {{displayGameName}}
        </div>
          <v-container  v-if="showCard && currentQuestionNumber == questionsLength">
            <v-card
              class="mx-auto"
              max-width="900"
            >
            <v-card-text class="pa-5">
                  <!-- padding -->

                <div class=" ml-8 mb-2 text-h3 text--primary  text-center">
                    Fin
                </div>
            </v-card-text>
            <v-card-actions class="justify-center">
              <v-btn
                v-on:click="showCard=returnMain(); currentQuestionNumber=0; infoQuiz=[];showResult=!showResult">
                Return
              </v-btn>
            </v-card-actions>

            </v-card>
          </v-container>
          <v-container  v-if="showCard && currentQuestionNumber <= questionsLength-1">
                <v-card
                    class="mx-auto"
                    max-width="900"
                    
                >
                <v-card-text class="pa-5">
                  <!-- padding -->

                <div class=" ml-8 mb-2 text-h5 text--primary  text-center">
                    <div class=" text-right text-h5" style="color: #ff0000;" v-show=" Count.sec > 0"
                    >{{Count.sec}} 秒
                    </div>
                    第 {{currentQuestionNumber+1}} 題 / 
                    共 {{questionsLength}} 題
                   
                </div>
               
                <div>
                  <!-- 入力を変数にしたい場合の方法 -->
                <v-img 
                      v-if="infoQuiz[currentQuestionNumber].question_image_ur"
                      class="mx-auto"
                      max-width="900"
                      max-height="250px"
                      :src="'./' + infoQuiz[currentQuestionNumber].question_image_ur"
                  ></v-img>
                </div>
                <!-- v-bind または :　は中身を変数にすることができる。' 'の中身は文字化する -->
                <div >
                  <h3 class="mb-4  text-h4 text--primary  text-center">{{infoQuiz[currentQuestionNumber].question_question}}</h3>
                </div>
                <div v-if="!showAnswer" class="ml-2 mb-4 text-h4 text--primary">
                  <div> <font color="blue">【選擇】</font></div>
                  <ol >
                    <li class="ml-3 mb-4">{{infoQuiz[currentQuestionNumber].question_choices1}}</li>
                    <li class="ml-3 mb-4">{{infoQuiz[currentQuestionNumber].question_choices2}}</li>
                    <li class="ml-3 mb-4">{{infoQuiz[currentQuestionNumber].question_choices3}}</li>
                    <li class="ml-3 mb-4">{{infoQuiz[currentQuestionNumber].question_choices4}}</li>
                  </ol>
                </div>
                <div v-if="showAnswer" class="ml-2 mb-4 text-h4 text--primary">
                <div>  <font color="blue">【答案】</font></div>
                <div> {{infoQuiz[currentQuestionNumber].question_answer}} : {{infoQuiz[currentQuestionNumber]['question_choices' + infoQuiz[currentQuestionNumber].question_answer]}} </div>

                </div>
                <div class="text-center pa-3">
                <v-btn style="color:#191970 ;" v-if="showCard" @click=" timeStop(); showBtn=!showBtn"  :disabled="showBtn"> stop </v-btn>
                <v-btn style="color:#191970 ;" class="ml-5"  v-if="showCard" @click="startInterval(); showBtn=!showBtn " :disabled="!showBtn"> start </v-btn>
                </div>
              </v-card-text>
                <!-- <v-btn  color="blue" @click="nextQuestion()"> Next </v-btn> -->
                <!-- <v-card-text>テキスト</v-card-text> -->
                <!-- <v-card-actions>リンクなど</v-card-actions> -->
              
              </v-card>

            <!-- <v-btn v-on:click="getEventPhp()">ログイン</v-btn> -->
        </v-container>
       

         <!-- <v-btn @click="getShowQuestionPhp"> show_question </v-btn> -->
         <!-- <v-btn class=" text-center" v-if="showCard" @click=" timeStop()"> stop </v-btn>
         <v-btn class="ml-8 mb-4"  v-if="showCard" @click="startInterval()"> restart </v-btn> -->

         

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
        showBtn: false,
       
        message: 'Answer Screen',
        showGameBtn: false,
        showStart: false,
        showCard: false,
        displayGameName: "",
        showAnswer: false,
        showResult:false,

        infoEvent:{
          event_id: '',
          event_name: '',
          event_date: '',
          event_city: '',
        },
        infoGame:[],
        infoQuiz:[],
        infoReportTeam:[],
        infoReportPerson:[],
        currentQuestionNumber: 0, // 現在の問題番号start from 0
        questionsLength: 0,
        Count:{
          defaultSec: <?=$CONFIG['show_second']?> ,
          sec: <?=$CONFIG['show_second']?>,
          timeAnswer: 0,
          timeFin: -3,
          intervalId: null,

        },
      
      },
      filters:{
        numFilter(value){
          let realVal = '';
          if(!isNaN(value) && value !==""){
            realVal = parseFloat(value).toFixed(1);
          }
          return realVal;
        }
      },
      computed: {
        haveReport(){
          return this.infoReportTeam.length || this.infoReportPerson.length
        }
      },
      methods:{
     
        // nextQuestion(){
        //   if(this.currentQuestionNumber < this.questionsLength-1){
        //   this.currentQuestionNumber += 1
        //   }
        // },     //ここから
        startInterval(){
          //alert('move');
          if(this.currentQuestionNumber <= this.questionsLength-1){
            this.Count.intervalId = setInterval(() =>{
              this.Count.sec --;
              if(this.Count.sec == this.Count.timeAnswer){
                
                this.showAnswer = true;
              }
              if(this.Count.sec < this.Count.timeFin){
               // this.AnswerInterval();
               
                this.Count.sec = this.Count.defaultSec;
                //this.nextQuestion();
                this.showAnswer = false;

                this.getShowQuestionPhp(this.currentQuestionNumber);//こっちが先
                this.currentQuestionNumber += 1

                //this.showAnswer=false;
              }
            }, 1000);
          }
          // else{
          //   clearInterval(this.Count.intervalId);
          //   alert("end of the game");
          //   //this.Count.intervalId=null;
          // }
        },
        AnswerInterval(){
          this.Count.intervalId2 = setInterval(()=>{
                    this.Count.answerSec--;
                    if(this.Count.answerSec < this.Count.timeFin){
                      this.Count.answerSec = this.Count.defaultAnswerSec;
                      this.showAnswer = true;
                    }
                  },1000);
        },
        returnMain(){
          this.showGameBtn = false;
          this.showCard = false;
          this.Count.sec= this.Count.defaultSec;
          this.timeStop();
        },
        timeStop(){
          clearInterval(this.Count.intervalId);
        },
        clearReport(){
          this.infoReportTeam = [];
          this.infoReportPerson = [];
        },
        getEventPhp: function(){
          //alert('show ' + axios);
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
          axios.get('./api/game.php',
          {
            params:{//クエリパラメータをつける方法
              game_id: id,
              event_id: this.infoEvent.event_id
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
          axios.get('./api/show_question.php',
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
        getReportPhp:function(){
          axios.get('./api/report.php')
          .then(res =>{
            this.infoReportTeam = res.data.data.team
            this.infoReportPerson = res.data.data.person 
            /*
            for(var key in team){
              if(team[key].team_id && !this.infoReportTeam.includes(team[key].team_id)){
                this.infoReportTeam.push({
                  team_id: team[key].team_id,
                  point: team[key].point,
                  total_min: team[key].total_min,
                  name: team[key].name,
                  school: team[key].school,
                })
              }
            }
            for(var key in person){
              if(person[key].name && !this.infoReportPerson.includes(person[key].name)){
                this.infoReportPerson.push({
                  point: person[key].point,
                  total_min: person[key].total_min,
                  name: person[key].name,
             
                })
              }
            }
            */
            console.log(res)
            console.log(this.infoReportTeam)
            console.log(this.infoReportPerson)

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
