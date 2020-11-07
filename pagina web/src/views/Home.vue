<template>
              <v-sheet height="100%">

                <v-row style="height:45%;">
                  <v-col cols="12">
                    <v-sheet height="100%" class="d-flex align-center justify-center flex-column">
                            <img src="@/assets/cmm.png" width="20%">
                            <br>
                            <v-sheet width="80%">
                                  <div class="text-center text-body-1">Sistema para el control de alumnos y gestion de pagos</div>
                            </v-sheet>
                    </v-sheet>
                  </v-col>
                </v-row>

                <v-row style="height:45%;">
                  <v-col cols="6" style="height:100%;">
                          <v-sheet height="100%" elevation="3" class="pr-5">
                              <v-sheet height="15%" class="d-flex align-center">
                                <div class="text-h6 ml-4"> Anuncios </div>
                              </v-sheet>
                              <v-sheet height="80%" class="primary--text font-weight-bold pa-5 overflow-y-auto">
                                      <v-alert border="left" 
                                        colored-border 
                                        color="primary" 
                                        class="text-body-1"
                                        elevation="1"
                                        v-for="(item, i) in anuncios" :key="i">
                                          {{item.mensaje}}
                                      </v-alert>                                  
                              </v-sheet>
                          </v-sheet>
                  </v-col>
                  <v-col cols="6" style="height:100%;">
                        <v-carousel cycle height="100%">
                                    <v-carousel-item
                                      v-for="item in imagenes"
                                      :key="item"
                                      :src="item"
                                      reverse-transition="fade-transition"
                                      transition="fade-transition"
                                    ></v-carousel-item>
                        </v-carousel>

                  </v-col>
                </v-row>

                <v-row style="height:10%;">
                  <v-col cols="12">
                    <v-sheet class="d-flex justify-center align-center primary--text" height="100%">
                                    {{ new Date().getFullYear() }} — <strong>Colegio Multidisciplinario de Morelos</strong>
                    </v-sheet>
                  </v-col>       
                </v-row>

              </v-sheet>
</template>

<style>

.select:hover{
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.05);
}

</style>

<script>
import axios from 'axios';

export default {
  name: 'Home',
  created: function () {
    this.getbanner()
    this.getanuncios()
  },
  data: () => ({
    imagenes: [],
    anuncios: []
  }),
  methods: {
    async getbanner() {
      try {
        const response = await axios.get(this.host+'banner');
        if(response.data!=0){
          this.imagenes= response.data 
        }
               
      } catch (error) {
        console.error(error);
      }
    },
    async getanuncios() {
      try {
        const response = await axios.get(this.host+'anuncios');
        if(response.data!=0){
          this.anuncios=response.data.filter(item => item.destinatario=='todos')
        }
        
      } catch (error) {
        console.error(error);
      }
    }

  },
  computed: {
    host: function (){
      return this.$store.state.host;
    }
  }
}
</script>
