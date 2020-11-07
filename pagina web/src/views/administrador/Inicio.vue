<template>
    <div>
      <v-app-bar app color="white">
            <v-tabs align-with-title >
                <v-tab link to="/administrador/dashboard">Inicio</v-tab>
                <v-tab link to="/administrador/administrarmaestros">Maestros</v-tab>
                <v-tab link to="/administrador/administrarpersonal">Personal</v-tab>
            </v-tabs>
           
              <v-menu offset-y left offset-overflow>
                <template v-slot:activator="{ on, attrs }">
                   <v-btn icon v-bind="attrs" v-on="on">
                      <v-icon>mdi-bell</v-icon>
                  </v-btn>
                </template>
                <v-sheet height="250" width="400" class="d-flex justify-center align-center">
                  <v-sheet height="90%" width="95%">
                    
                    <v-sheet height="10%">
                      <div class="text-body-1 font-weight-bold">Anuncios</div>
                    </v-sheet>
                    <v-sheet height="90%" class="overflow-y-auto">
                        <v-alert border="left" 
                          colored-border 
                          color="primary" 
                          class="text-body-1"
                          elevation="1"
                          v-for="(item, i) in anuncios" :key="i"
                          >
                          {{item.mensaje}}
                        </v-alert> 
                    </v-sheet>
                    
   
                  </v-sheet>
                </v-sheet>
               
              </v-menu>
            <v-btn icon @click="onLogout">
                <v-icon>mdi-exit-to-app</v-icon>
            </v-btn>
      </v-app-bar>
      <router-view></router-view>

    </div>
</template>
<script>
import axios from 'axios';


export default {
  name: 'Maestros',
  data: () => ({
    anuncios: []
  }),
  async created() {
      try {
        const response = await axios.get(this.host+'anuncios');
        if(response.data!=0){
          this.anuncios=response.data.filter(item => item.destinatario=='administrador' || item.destinatario=='todos')
        }
      } catch (error) {
        console.error(error);
      }
  },
  methods: {
    onLogout: function () {
      this.$store.dispatch('doLogout')
      this.$router.push('/')
    }
  },
  computed: {
    host: function (){
        return this.$store.state.host;
    }
  }
}
</script>
