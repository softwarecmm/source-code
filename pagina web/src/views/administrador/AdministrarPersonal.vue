<template>
    <v-container fluid>

        <v-row>
          <v-col cols="12">
                <v-sheet height="10%" class="primary--text font-weight-bold">
                  <h2> Lista de personal </h2>
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
                      <v-toolbar-title>Personal</v-toolbar-title>
                      <v-spacer></v-spacer>

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
                          >
                            Nuevo personal
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
                                    v-model="editedItem.cargo"
                                    label="Cargo"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.telefono"
                                    label="telefono"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.correo"
                                    label="correo"
                                  ></v-text-field>
                                </v-col>
                                <v-col
                                  cols="12"
                                >
                                  <v-text-field
                                    v-model="editedItem.contraseña"
                                    label="contraseña"
                                  ></v-text-field>
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
  data: () => ({
    dialog: false,
    headers: [
      { text: 'Nombre', value: 'nombre' },
      { text: 'Cargi', value: 'cargo' },
      { text: 'Telefono', value: 'telefono' },
      { text: 'Correo', value: 'correo' },
      { text: 'Contraseña', value: 'contraseña' },
      { text: 'Acciones', value: 'actions', sortable: false }
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      nombre: '',
      cargo: '',
      telefono: '',
      correo: '',
      contraseña: ''
    },
    defaultItem: {
      nombre: '',
      cargo: '',
      telefono: '',
      correo: '',
      contraseña: ''
    }
  }),
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'Registrar nuevo personal' : 'Editar datos de personal'
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
    try {
        const response = await axios.get(this.host+'personal');
        if(response.data!=0){
          this.desserts= response.data
        
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
    },

    deleteItem (item) {
      const index = this.desserts.indexOf(item)
      this.desserts.splice(index, 1)
          
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
          try {

              Object.assign(this.desserts[this.editedIndex], this.editedItem)
              let datos=this.desserts[this.editedIndex]
              const response = await axios.post(this.host+'personal/update',JSON.stringify([datos]));
                
          } catch (error) {
                console.error(error);
          }
        
      } else {
        try {
                const response = await axios.post(this.host+'personal/create',JSON.stringify([this.editedItem]));
                this.desserts.push(this.editedItem)
        } catch (error) {
                console.error(error);
        }
      }
      this.close()
    }
  }

}
</script>
