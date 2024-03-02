<?php
    include './common.php';
?>
  <div id="app">
    <v-app>
        <v-app-bar
        color="blue"
        dense
        dark
        app
        >        
         <v-toolbar-title style="color: #ffffff;" v-if="">Login Page</v-toolbar-title>
            <v-spacer>
            </v-spacer>
            <v-btn icon>
            <v-icon>mdi-account-circle</v-icon>
            </v-btn>
            {{infoUser.user_name}}
        </v-app-bar>
      <v-main>
        <v-container>
        <v-card width="" class="mx-auto mt-5">
            <v-card-title>
                <h1 class="display-1">Login</h1>
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field prepend-icon="mdi-account-circle" label="email" v-model="queries.email"></v-text-field>
                    <!-- mdi-account-cicle はMaterial Design Iconsからきたアイコン表示。 -をまんなかに -->
                    <!-- https://pictogrammers.com/library/mdi/ -->
                    <v-text-field  prepend-icon="mdi-lock" label="phone" v-model="queries.phone">
                    </v-text-field>
                    <!-- prepend-iconで先頭にアイコン、append-iconで後ろに表示 -->
                    <!-- ?によりshowPasswordプロパティによって属性typeがtextとpasswordに切り替わる -->
                    <v-card-actions>
                        <v-btn class="info" value="Login" v-on:click="getAccount">login</v-btn>
                    </v-card-actions>
           
                </v-form>
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
        
        showPassword: false,
        queries: { //オブジェクト
                email: 'user1_1@asjas.org',
                phone: '0011'
        },
        infoUser:[],
    },
    methods:{
        getAccount:function(queries){
            axios.get('./api/account.php', 
          {
            params:
            {
              email: this.queries.email,
              phone: this.queries.phone 

            }
          })
          .then(res =>{
            this.infoUser = res.data.data;
            console.log(this.infoUser)
            console.log(res)
          })
        }

    },

    })
  </script>
</body>
</html>
