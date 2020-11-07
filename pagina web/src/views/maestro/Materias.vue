<template>

    <v-container fluid>

        <v-row>
          <v-col cols="12">
                <v-sheet height="10%" class="primary--text font-weight-bold">
                  <h2> Tus materias</h2>
                </v-sheet>
          </v-col>
        </v-row>

        <v-row>

          <v-col cols="3" style="background-color: white;" v-for="(materia,i) in materias" :key="i">

                <v-card>
                    <v-img class="white--text align-end" height="160px" :src="materia.url"> </v-img>

                    <v-card-title>{{ materia.nombre }}</v-card-title>

                    <v-card-text class="text--primary">
                        <div>Grupo: {{ materia.grupo}}</div>

                        <div>{{ $store.state.user.nombre}}</div>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn color="primary" text @click="cargarmateria(materia)"> Ingresar</v-btn>
                    </v-card-actions>
                </v-card>

            </v-col>

        </v-row>

    </v-container>

</template>
<script>
import axios from 'axios';

export default {
  name: 'Clases',
  async created() {
      let id=this.$store.state.user.id
      try {
        const response = await axios.post(this.host+'materias/maestro',id);
        this.materias=response.data
      } catch (error) {
        console.error(error);
      }
  },
  data: () => ({
    materias: []
  

  }),
  methods: {
    cargarmateria(item){
      this.$router.push(
          { name: 'materia', params: {  materia: item } }
      )

    }
  
  },
  computed: {
    host: function (){
      return this.$store.state.host;
    }
  }

}
</script>
