<template>
    <v-container fluid>
      
        <v-snackbar v-model="snackbar.show" top color="primary">
          {{ snackbar.texto }}
            <template v-slot:action="{ attrs }">
              <v-btn
                :color="snackbar.color"
                text
                v-bind="attrs"
                @click="snackbar = false"
              >
                Ok
              </v-btn>
            </template>
        </v-snackbar>

        <v-row>
          <v-col cols="12">
                <v-sheet height="10%" class="primary--text font-weight-bold">
                  <h2> Gestión de pagos</h2>
                </v-sheet>
          </v-col>

          <v-col cols="4">
              <v-select
                  label="Grupo"
                  :items="items.grupo"
                  outlined
                  dense
                  @change="cargaralumnos"
              ></v-select>
          </v-col>

          <v-col cols="8">
              <v-select
                  label="Alumno"
                  :items="items.alumnos"
                  v-model="alumno"
                  outlined
                  dense
                  @change="cargarpagos"
              ></v-select>
          </v-col>
          
          <v-col cols="12">
                  <div class="text-body-1 font-weight-bold">Calendario de pagos</div>
                  <v-date-picker
                    v-model="date"
                    full-width
                    class="mt-4"
                    range
                    elevation="3"
                    landscape
                    style="height:350px;"
                    locale="es"
                    @change="activarsheet"
                    @mouseover:date="hoverdia"
                    :events="events"
                    event-color="blue"
                  ></v-date-picker> 
            </v-col>

            <v-col cols="12">
                  <v-alert border="left" 
                          colored-border 
                          color="primary" 
                          class="text-body-1"
                          elevation="1"
                          v-if="alert.show"
                          >
                          Pago realizado por la cantidad de: {{alert.mensaje}}
                  </v-alert>
            </v-col>

            <v-bottom-sheet v-model="sheet" inset>      
              <v-sheet height="400px">
                <v-form ref="pago">  
                  <v-container fluid>
                    <v-row>
                      
                      <v-col cols="12">
                        <div class="text-h5 font-weight-bold primary--text">Datos del pago</div>
                      </v-col>
                      <v-col cols="12">
                          <v-text-field
                            label="Cantidad"
                            required
                            outlined
                            v-model="pago.cantidad"
                          ></v-text-field>
                          <div>Periodo</div>
                      </v-col>

                      
                      <v-col cols="6">
                          <v-text-field
                            label="Inicio"
                            required
                            outlined
                            v-model="pago.inicio"
                          ></v-text-field>
                      </v-col>

                     <v-col cols="6">
                          <v-text-field
                            label="Fin"
                            required
                            outlined
                            v-model="pago.fin"
                          ></v-text-field>
                      </v-col>

                      <v-col cols="12">
                          <v-btn color="primary" @click="guardarpago">Guardar</v-btn>
                      </v-col>

                    </v-row>
                  </v-container>
                </v-form>


                    
              </v-sheet>
            </v-bottom-sheet>
            

                
        </v-row>

    </v-container>
</template>
<script>
import axios from 'axios';

export default {
  name: 'Pagos',
  data: () => ({
    date: [],
    alert: {
      show: false,
      mensaje: ''
    },
    items: {
      grupo: [],
      alumnos: []
    },
    snackbar:{
      show: false,
      texto: '',
      color: ''
    },
    alumnos: [],
    alumno: '',
    sheet: false,
    pago: {
      cantidad: '',
      inicio: '',
      fin: ''
    },
    pagos: [],
    events: []

  }),
  computed: {
    host: function (){
        return this.$store.state.host;
    }
  },

  watch: {

  },
  async created () {

    try {
        const response = await axios.get(this.host+'grupos');
        if(response.data!=0){
          this.items.grupo=response.data
        }else{
        }
    } catch (error) {
        console.error(error);
    }
    
  },
  methods: {

    async cargaralumnos(grupo){
        
    try {
        this.items.alumnos=[]
        
        const response = await axios.post(this.host+'grupo/alumnos',grupo);

        if(response.data!=0){
          this.alumnos=response.data
           response.data.forEach( item => {

             this.items.alumnos.push(item.nombre)
             
           });

        }else{

        }

    } catch (error) {
        console.error(error);
    }

    },
    async cargarpagos(alumno){

      try { 

        this.events=[]

        let id= this.alumnos.filter( item => item.nombre == alumno)[0].id
        const response = await axios.get(this.host+'pagos');
        if(response.data!=0){
          this.pagos=response.data
          
          response.data.forEach( item => {

            if(item.id_alumno==id){
                var fechaInicio = new Date(item.inicio);
                var fechaFin    = new Date(item.fin);

                while(fechaFin.getTime() >= fechaInicio.getTime()){
                    this.events.push(fechaInicio.toISOString().substr(0, 10))
                    fechaInicio.setDate(fechaInicio.getDate() + 1);
                }
            }

      
          });
 
        }else{

        }

    }catch (error) {
        console.error(error);
    }


    },
    activarsheet(date){
      this.sheet=true
      this.pago.inicio= date[0]
      this.pago.fin= date[1]
    },
    hoverdia (fecha) {

     if(this.alumno!=''){

       
      let id= this.alumnos.filter( item => item.nombre == this.alumno)[0].id

      this.pagos.forEach(item => {

        if(item.id_alumno==id){

            if(Date.parse(item.fin) >= Date.parse(fecha) && Date.parse(item.inicio) <= Date.parse(fecha)){

               this.alert.show=true
               this.alert.mensaje= item.cantidad

               setTimeout(() => {
                 this.alert.show=false
                 
               }, 3000);

            }

        }
        
      });

     }
    
    },
    async guardarpago(){
      try {
        let datos= {
            cantidad: this.pago.cantidad,
            inicio: this.pago.inicio,
            fin: this.pago.fin,
            alumno: this.alumno
        }
        const response = await axios.post(this.host+'pagos/create',JSON.stringify([datos]));
        if(response.status==200){
          this.sheet = !this.sheet
          this.snackbar.show=true
          this.snackbar.texto='Pago registrado'
          this.snackbar.color='primary'
          this.$refs.pago.reset()
          this.date=[]

            var fechaInicio = new Date(datos.inicio);
            var fechaFin    = new Date(datos.fin);

            while(fechaFin.getTime() >= fechaInicio.getTime()){
                    this.events.push(fechaInicio.toISOString().substr(0, 10))
                    fechaInicio.setDate(fechaInicio.getDate() + 1);
            }


        }else{

        }
        
      } catch (error) {
          console.error(error);
      }
    }



  }

}
</script>
