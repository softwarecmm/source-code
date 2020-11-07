<template>
  <v-row style="height:100%;">
        <v-col cols="12" md="8">
            <v-card height="100%" flat class="ml-sm-10 mr-sm-10">

                <v-sheet height="15%" width="100%" class="d-flex align-center">
                    <v-card-title class="primary--text  text-h5 font-weight-bold">Inicio de sesion para administrador</v-card-title>
                </v-sheet>

                <v-sheet height="85%" width="100%" class="d-flex justify-center align-center" elevation="3">

                  <v-sheet height="80%" width="85%">
                      <v-sheet height="90%" width="100%">
                          <v-form
                            height="10%"
                            width="100%"
                            lazy-validation
                            v-model="valid"
                            ref="form"
                            >
                            <v-text-field
                              label="Correo"
                              required
                              v-model="user.correo"
                              :rules="rules.email"
                            ></v-text-field>
                                                    <br>

                            <v-text-field
                              label="Contraseña"
                              required
                              v-model="user.contraseña"
                              :rules="rules.pass"
                            ></v-text-field>

                            <v-alert
                                dense
                                border="left"
                                type="error"
                                v-if="alert"
                            >
                                El correo o contraseña son incorrectos
                            </v-alert>
                            <br>
                            <v-btn
                              color="primary"
                              @click="onSubmit()"
                              :disabled="!valid"

                            >
                              Aceptar
                            </v-btn>
                          </v-form>
                      </v-sheet>
                    <!--
                      <v-sheet height="10%" width="100%">
                          <p>¿Olvidaste tu contraseña?</p>
                      </v-sheet>
                    -->
                  </v-sheet>

                </v-sheet>

            </v-card>
        </v-col>

        <v-col md="4">
            <v-card flat height="100%" class="d-md-flex d-none justify-center align-center">
                    <img src="@/assets/administrador.png" height="30%">
            </v-card>
        </v-col>
    </v-row>
</template>
<script>
import axios from 'axios';

export default {
  name: 'LoginAdministrador',
  created: function () {

  },
  data: () => ({
    user: {
      correo: '',
      contraseña: ''
    },
    valid: true,
    rules:{
      pass: [
        v => !!v || 'Ingresa tu contraseña'
      ],
      email: [
        v => !!v || 'Ingresa el correo',
        v => /.+@.+\..+/.test(v) || 'Correo invalido',
      ]
    },
    alert: false

  }),
  methods: {
    async onSubmit () {
     try {

        let validate=  this.$refs.form.validate()
        if(validate){

          const response = await axios.post(this.host+'administrador/login', JSON.stringify(this.user));

          if(response.data){
            await this.$store.dispatch('doLogin',response.data)
            this.$router.push('/administrador/dashboard')
          }else{
            this.alert=true
            setTimeout(() => {
              this.alert=false
            }, 4000);
          }
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
