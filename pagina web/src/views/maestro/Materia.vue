<template>
    <v-container fluid>

        <v-row>
          <v-col cols="12">
                <v-sheet height="10%" class="primary--text font-weight-bold">
                  <h2> Materia: {{ materia.nombre }}</h2>
                </v-sheet>
          </v-col>

            <v-col cols="12" style="background-color: white;">

                <v-data-table
                  :headers="headers"
                  :items="desserts"
                  class="elevation-1"
                  hide-default-footer
                >
                  <template v-slot:top>
                    <v-toolbar
                      flat
                    >
                      <v-toolbar-title>Lista de alumnos - Grupo {{ materia.grupo }}</v-toolbar-title>
                      <v-spacer></v-spacer>
                      <v-sheet class="mr-5">
                        <v-select
                                label="Bloque"
                                :items="bloques"
                                outlined
                                dense
                                style="height: 45px; padding:0px;margin: 0px;"
                                v-model="bloque"
                                @change="cargarcalificacion()"
    
                        ></v-select>
                      </v-sheet>

                      <v-dialog
                        v-model="dialog"
                        max-width="500px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                           <v-btn
                            color="primary"
                            dark
                            class="mb-2 mr-2"
                            v-bind="attrs"
                            v-on="on"
                            @click="inputcalificacion=false"
                            
                          >
                            Nuevo alumno
                          </v-btn>
                        </template>
                        <v-card>
                          <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                          </v-card-title>

                          <v-card-text>
                            <v-container>
                              <v-row no-gutters>
                                
                                <v-col
                                  cols="12"
                                  v-if="inputcalificacion"
                                >
                                  <v-text-field
                                    v-model="editedItem.calificacion"
                                    label="Calificacion"
                                  ></v-text-field>
                                </v-col>

                                
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.nombre"
                                    label="Nombre Completo"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.tutor"
                                    label="Nombre del tutor"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.telefono"
                                    label="Telefono"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.edad"
                                    label="Edad"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                    <v-select
                                      label="Sexo"
                                      :items="['niño','niña']"
                                      v-model="editedItem.sexo"
                                    ></v-select>
                                </v-col>
                              </v-row>
                            </v-container>
                          </v-card-text>

                          <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                              color="blue darken-1"
                              text
                              @click="close"
                            >
                              Cancelar
                            </v-btn>
                            <v-btn
                              color="blue darken-1"
                              text
                              @click="save"
                            >
                              Guardar
                            </v-btn>
                          </v-card-actions>
                        </v-card>
                      </v-dialog>
                    </v-toolbar>
                  </template>

                  <template v-slot:item.actions="{ item }">
                    <v-icon
                      small
                      class="mr-2"
                      @click="editItem(item)"
                    >
                      mdi-pencil
                    </v-icon>
                    <v-icon
                      small
                      @click="deleteItem(item)"
                    >
                      mdi-delete
                    </v-icon>
                  </template>
                </v-data-table>
            </v-col>
        </v-row>

    </v-container>
</template>
<script>
import axios from 'axios';

export default {
  name: 'Materia',
  props: ['materia'],
  data: () => ({
    dialog: false,
    headers: [
      { text: 'Nombre', value: 'nombre' },
      { text: 'Tutor', value: 'tutor' },
      { text: 'Telefono', value: 'telefono' },
      { text: 'Edad', value: 'edad' },
      { text: 'Sexo', value: 'sexo' },
      { text: 'Calificacion', value: 'calificacion' },
      { text: 'Acciones', value: 'actions', sortable: false }
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      nombre: '',
      tutor: '',
      telefono: '',
      edad: '',
      sexo: '',
      calificacion: ''
    },
    defaultItem: {
      nombre: '',
      tutor: '',
      telefono: '',
      edad: '',
      sexo: '',
      calificacion: ''
    },
    inputcalificacion: false,
    bloques: [],
    bloque: ''
  }),
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'Registrar nuevo alumno' : 'Editar datos de alumno'
    },
    host: function (){
        return this.$store.state.host;
    }
  },

  watch: {
    dialog (val) {
      val || this.close()
    }
  },
  async created () {

    let tamaño= parseInt(this.materia.bloques)
    for (let index = 1; index <= tamaño; index++) { this.bloques.push(index) }

    try {
        const response = await axios.post(this.host+'grupo/alumnos',this.materia.grupo);
        if(response.data!=0){
                this.desserts=response.data
        }else{
                this.desserts=[]
        }
    } catch (error) {
                console.error(error);
    }


  
  },
  methods: {
    editItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
      this.inputcalificacion= true
    },

    async deleteItem (item) {
      const index = this.desserts.indexOf(item)
      this.desserts.splice(index, 1)
      try {
        const response = await axios.post(this.host+'alumnos/delete',JSON.stringify([item]));
        
      } catch (error) {
        console.error(error);
      }
        
    },

    close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },
    async save () {
      if (this.editedIndex > -1) {

        Object.assign(this.desserts[this.editedIndex], this.editedItem)
      
        try {
          let datos= {
            calificacion: this.desserts[this.editedIndex].calificacion,
            grupo: this.materia.grupo,
            bloque: this.bloque,
            materia: this.materia.nombre,
            id_alumno: this.desserts[this.editedIndex].id
          }
          const response = await axios.post(this.host+'calificaciones/create',JSON.stringify([datos]));
          if(response.status==200){
            
          }

        } catch (error) {
          console.error(error);
        }
        

      } else {
        
        try {
          let datos = {
            grupo: this.materia.grupo,
            alumnos: [{
              nombre: this.editedItem.nombre ,
              tutor: this.editedItem.tutor,
              telefono: this.editedItem.telefono,
              edad: this.editedItem.edad,
              sexo: this.editedItem.sexo}]}
          const response = await axios.post(this.host+'alumnos/create',JSON.stringify(datos));
          if(response.status==200){
            this.desserts.push(this.editedItem)
          }
        } catch (error) {
          console.error(error);
        }
        
       
      }
      this.close()
    },
    async cargarcalificacion(){

      try {
        let datos= {
          grupo: this.materia.grupo,
          materia: this.materia.nombre,
          bloque: this.bloque
        }

        const response = await axios.post(this.host+'calificaciones',JSON.stringify(datos));
        this.desserts.forEach(element => {
             element.calificacion= ''    
        });
        
        if(response.data!=0){
          response.data.forEach(item => {
            let index=this.desserts.findIndex(alumno => alumno.id == item.id_alumno)
            this.desserts[index].calificacion = item.calificacion
          });

        }
        
     
      } catch (error) {
        console.error(error);
      }
      

    }
  }

}
</script>
