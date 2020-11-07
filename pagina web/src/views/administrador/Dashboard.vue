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
                <v-sheet class="primary--text font-weight-bold">
                  <h2> Administrador</h2>
                </v-sheet>
          </v-col>
        </v-row>

        <v-row>

            <!--Registrar maestro-->
            <v-col cols="3">
                <v-card height="150px">
                    <v-bottom-sheet v-model="sheet.maestro" inset>
                        <template v-slot:activator="{ on, attrs }">
                            <v-sheet class="d-flex justify-space-around align-center select" height="100%" v-bind="attrs" v-on="on">
                                <div class="text-center text-body-1">Registrar nuevo maestro</div>
                                <v-btn class="mx-2" fab dark color="indigo">
                                    <v-icon dark>mdi-plus</v-icon>
                                </v-btn>
                            </v-sheet>
                        </template>
                        <v-sheet height="550px">
                                        <v-sheet height="100%" class="d-flex justify-center align-center">

                                            <v-sheet  height="95%" width="95%">
                                              <v-form ref="maestro">
                                                <v-container fluid>
                                                  <v-row no-gutters>
                                                    <v-col cols="12">
                                                      <h2 class="primary--text">Registrar nuevo maestro</h2>
                                                      <br>
                                                    </v-col>
                                                    <v-col cols="12">
                                                      <v-text-field label="Nombre completo" required v-model="maestro.nombre" :rules="rules.requerido"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Carrera" class="pr-10" required v-model="maestro.carrera" :rules="rules.requerido"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Telefono"  required v-model="maestro.telefono" :rules="rules.numerico"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Correo" class="pr-10" required v-model="maestro.correo" :rules="rules.correo"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Contraseña" required v-model="maestro.contraseña" :rules="rules.requerido"></v-text-field>
                                                      <br>
                                                    </v-col>
                                                    
                                                    <v-col cols="12">
                                                      <v-sheet class="d-flex align-center">
                                                        <v-btn color="primary" @click="onSubmitmaestro()">
                                                          Registrar
                                                        </v-btn>
                                                        <a class="ml-5" @click="sheet.maestro = !sheet.maestro">Cancelar</a>
                                                      </v-sheet>
                                                    </v-col>      
                                                  </v-row>
                                                </v-container>
                                                </v-form>
                                          
                                            </v-sheet>

                                          </v-sheet>
                        </v-sheet>
                    </v-bottom-sheet>
                </v-card>
            </v-col>

            <!--Registrar personal-->

            <v-col cols="3">
                <v-card height="150px">
                      <v-bottom-sheet v-model="sheet.personal" inset>
                        <template v-slot:activator="{ on, attrs }">
                                <v-sheet class="d-flex justify-space-around align-center select" height="100%" v-bind="attrs" v-on="on">
                                    <div class="text-center text-body-1">Registrar nuevo personal</div>
                                    <v-btn class="mx-2" fab dark color="indigo">
                                        <v-icon dark>mdi-plus</v-icon>
                                    </v-btn>
                                </v-sheet>
                        </template>
                        <v-sheet height="550px">
                                        <v-sheet height="100%" class="d-flex justify-center align-center">

                                            <v-sheet  height="95%" width="95%">
                                              <v-form ref="personal">
                                                <v-container fluid>
                                                  <v-row no-gutters>
                                                    <v-col cols="12">
                                                      <h2 class="primary--text">Registrar nuevo personal</h2>
                                                      <br>
                                                    </v-col>
                                                    <v-col cols="12">
                                                      <v-text-field label="Nombre completo" required v-model="personal.nombre" :rules="rules.requerido"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Cargo" class="pr-10" required v-model="personal.cargo" :rules="rules.requerido"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Telefono"  required v-model="personal.telefono" :rules="rules.numerico"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Correo" class="pr-10" required v-model="personal.correo" :rules="rules.correo"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-text-field label="Contraseña" required v-model="personal.contraseña" :rules="rules.requerido"></v-text-field>
                                                      <br>
                                                    </v-col>
                                                    <v-col cols="12">
                                                  <v-sheet class="d-flex align-center">
                                                    <v-btn color="primary" @click="onSubmitpersonal()">
                                                      Registrar
                                                    </v-btn>
                                                    <a class="ml-5" @click="sheet.personal = !sheet.personal">Cancelar</a>
                                                  </v-sheet>
                                                    </v-col>      
                                                  </v-row>
                                                </v-container>
                                                </v-form>
                                          
                                            </v-sheet>

                                          </v-sheet>
                        </v-sheet>
                    </v-bottom-sheet>
                </v-card>
            </v-col>
            <!--Adiministrar maestros-->
            <v-col cols="3">
                <v-card height="150px" link to="/administrador/administrarmaestros">
                    <v-sheet class="d-flex justify-space-around align-center select" height="100%">
                        <div class="text-center text-body-1">Administrar maestros</div>
                        <v-btn class="mx-2" fab dark color="indigo">
                            <v-icon dark>mdi-wrench</v-icon>
                        </v-btn>
                    </v-sheet>
                </v-card>
            </v-col>
            <!--Administrar personal-->
            <v-col cols="3">
                <v-card height="150px" link to="/administrador/administrarpersonal">
                    <v-sheet class="d-flex justify-space-around align-center select" height="100%">

                        <div class="text-center text-body-1">Administrar personal</div>

                        <v-btn class="mx-2" fab dark color="indigo">
                            <v-icon dark>mdi-wrench</v-icon>
                        </v-btn>

                    </v-sheet>
                </v-card>
            </v-col>
            <!--Gestionar anuncios-->
            <v-col cols="3">
                <v-card height="150px">
                    <v-bottom-sheet v-model="sheet.anuncios" inset>
                        <template v-slot:activator="{ on, attrs }">
                                <v-sheet class="d-flex justify-space-around align-center select" height="100%" v-bind="attrs" v-on="on" @click="cargaranuncios()">
                                    <div class="text-center text-body-1">Gestionar anuncios</div>
                                    <v-btn class="mx-2" fab dark color="indigo">
                                        <v-icon dark>mdi-bell</v-icon>
                                    </v-btn>
                                </v-sheet>
                        </template>
                        <v-sheet height="650px">
                                        <v-sheet height="100%" class="d-flex justify-center align-center">

                                            <v-sheet  height="95%" width="95%">
                                              <v-form ref="anuncio">
                                                <v-container fluid>
                                                  <v-row no-gutters>
                                                    <v-col cols="12">
                                                      <h2 class="primary--text">Anuncios actuales</h2>
                                                      <br>
                                                    </v-col>
                                           
                                                    <v-col cols="12">

                                                      <v-sheet class="overflow-y-auto" height="240px">
                                                        <v-alert border="left" 
                                                          colored-border 
                                                          color="primary" 
                                                          class="text-body-1"
                                                          elevation="1"
                                                          v-for="(item, i) in anuncios" :key="i">

                                                            <v-row align="center">
                                                              <v-col class="grow">
                                                                   {{item.mensaje}}
                                                              </v-col>
                                                              <v-col class="shrink">
                                                                <v-btn @click="eliminaranuncio(item,i)">Eliminar</v-btn>
                                                              </v-col>
                                                            </v-row>
                                                        </v-alert> 
                                                            
                                                      </v-sheet>
                                                      <br>
                                                    </v-col>
                                                    <v-col cols=12>
                                                      <h2 class="primary--text">Crear nuevo anuncio</h2>
                                                    </v-col>
                                                    <v-col cols="12">
                                                      <v-text-field label="Mensaje" required v-model="anuncio.mensaje" :rules="rules.requerido"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="6">
                                                        <v-select
                                                          :items="['todos','personal','maestros']"
                                                          label="Destinatario"
                                                          v-model="anuncio.destinatario"
                                                          :rules="rules.requerido"
                                                        ></v-select>
                                                    </v-col>
                                                    <v-col cols="6">
                                                      <v-menu
                                                            ref="menu"
                                                            v-model="menu"
                                                            :close-on-content-click="false"
                                                            :return-value.sync="date"
                                                            transition="scale-transition"
                                                            offset-y
                                                            min-width="290px"
                                                        >
                                                            <template v-slot:activator="{ on, attrs }">
                                                            <v-text-field
                                                                v-model="date"
                                                                label="Duracion"
                                                                readonly
                                                                v-bind="attrs"
                                                                v-on="on"
                                                                :rules="rules.requerido"
                                                            ></v-text-field>
                                                            </template>
                                                            <v-date-picker
                                                            v-model="date"
                                                            no-title
                                                            scrollable
                                                            range
                                                            >
                                                                <v-spacer></v-spacer>
                                                                <v-btn
                                                                    text
                                                                    color="primary"
                                                                    @click="menu = false"
                                                                >
                                                                    Cancelar
                                                                </v-btn>
                                                                <v-btn
                                                                    text
                                                                    color="primary"
                                                                    @click="$refs.menu.save(date)"
                                                                >
                                                                    Aceptar
                                                                </v-btn>
                                                            </v-date-picker>
                                                        </v-menu>
                                                    </v-col>
                                                      

                                                    <v-col cols="12">    
                                                        <v-sheet class="d-flex align-center">
                                                            <v-btn color="primary" @click="onSubmitanuncios()">
                                                            Crear
                                                            </v-btn>
                                                            <a class="ml-5" @click="sheet.anuncios = !sheet.anuncios">Cancelar</a>
                                                        </v-sheet>                                        
                                                    </v-col>      
                                                  </v-row>
                                                </v-container>
                                                </v-form>
                                          
                                            </v-sheet>

                                          </v-sheet>
                        </v-sheet>
                    </v-bottom-sheet>
                </v-card>
            </v-col>
            <!--Gestionar imagenes-->

            <v-col cols="3">
                <v-card height="150px">

                    <v-bottom-sheet v-model="sheet.carousel" inset>
                        <template v-slot:activator="{ on, attrs }">
                                <v-sheet class="d-flex justify-space-around align-center select" height="100%" v-bind="attrs" v-on="on" @click="cargarimagenes()">
                                    <div class="text-center text-body-1">Gestionar carousel de imagenes</div>
                                    <v-btn class="mx-2" fab dark color="indigo">
                                        <v-icon dark>mdi-image</v-icon>
                                    </v-btn>
                                </v-sheet>
                        </template>
                        <v-sheet height="680px">
                                        <v-sheet height="100%" class="d-flex justify-center align-center">

                                            <v-sheet  height="95%" width="95%">
                                              <v-form ref="carousel">   
                                                <v-container fluid>
                                                  <v-row>
                                                    <v-col cols="12">
                                                      <h2 class="primary--text">Imagenes en carousel</h2>
                                                      <br>
                                                    </v-col>
                                                  

                                                    <v-col
                                                      v-for="item in imagenes"
                                                      :key="item"
                                                      class="d-flex child-flex"
                                                      cols="3"
                                                    >
                                                     
                                                    <v-hover v-slot="{ hover }">

                                                      <v-img
                                                        :src="item"
                                                        aspect-ratio="1"
                                                        class="grey lighten-2"
                                                        height="150"
                                                      >

                                                      <v-expand-transition>
                                                          <div
                                                            v-if="hover"
                                                            class="d-flex justify-center align-center transition-fast-in-fast-out black"
                                                            style="height: 100%; opacity: .8;"
                                                          >
                                                            <v-btn
                                                                  class="mx-2"
                                                                  fab
                                                                  color="red"
                                                                  @click="eliminarimagen(item)"
                                                                >
                                                                  <v-icon class="white--text">
                                                                    mdi-delete
                                                                  </v-icon>
                                                            </v-btn>
                                                          </div>
                                                      </v-expand-transition>
                                                       
                                                      </v-img>

                                                    </v-hover>

                                                    </v-col>

                                                    <v-col cols="10">
                                                        <v-file-input
                                                            accept="image/png, image/jpeg"
                                                            label="Selecciona imagen para agregar al carousel"
                                                            counter
                                                            show-size
                                                            v-model="selectedimage"
                                                        ></v-file-input>
                                                        
                                                    </v-col>
                                                    <v-col cols="2">
                                                        <v-btn class="ml-5" @click="onSubmitcarousel()">
                                                            Agregar
                                                        </v-btn>
                                                    </v-col>
                                                   
                                                    
                                                    <v-col cols="12">
                                                        <v-btn color="primary" @click="sheet.carousel = !sheet.carousel">
                                                            Salir
                                                        </v-btn>
                                                    </v-col>      
                                                  </v-row>
                                                </v-container>
                                                </v-form>
                                          
                                            </v-sheet>

                                          </v-sheet>
                        </v-sheet>
                    </v-bottom-sheet>
                </v-card>
            </v-col>
            <!--Grupo de alumnos-->
            <v-col cols="3">
                <v-card height="150px">
                                        <v-bottom-sheet v-model="sheet.alumnos" inset>
                        <template v-slot:activator="{ on, attrs }">
                            <v-sheet class="d-flex justify-space-around align-center select" height="100%" v-bind="attrs" v-on="on" @click="cargargrupos()">
                                <div class="text-center text-body-1">Grupos de alumnos</div>
                                <v-btn class="mx-2" fab dark color="indigo">
                                    <v-icon dark>mdi-account-group</v-icon>
                                </v-btn>
                            </v-sheet>
                        </template>
                        <v-sheet height="700px">
                                        <v-sheet height="100%" class="d-flex justify-center align-center">

                                            <v-sheet  height="95%" width="95%">
                                              <v-form>
                                                <v-container fluid>
                                                  <v-row no-gutters>
                                                   
                                                    <v-col cols="12">
                                                        <v-tabs v-model="tabs.grupo">
                                                            <v-tab>Crear nuevo grupo</v-tab>
                                                            <v-tab>Grupos</v-tab>
                                                        </v-tabs>

                                                        <v-tabs-items v-model="tabs.grupo">
                                                            <v-tab-item>
                                                              <v-container>

                                                                <v-row  no-gutters>
                                                                  <v-col cols="12">
                                                                        <v-text-field label="Nombre del grupo" outlined required v-model="nombregrupo" :rules="rules.requerido"></v-text-field>
                                                                  </v-col>
                                                                  <v-col cols="12">
                                                                        <div class="text-body-1 primary--text ">Alumnos del grupo</div>
                                                                  </v-col>
                                                                </v-row>

                                                                <v-sheet height="290px" class="overflow-y-auto">
                                                                  <v-row v-for="(item,i) in alumnos" :key="i" no-gutters>
                                                                          <v-col cols="3">
                                                                            <v-text-field required outlined label="Nombre completo" v-model="item.nombre" :rules="rules.requerido"></v-text-field>
                                                                          </v-col>
                                                                          <v-col cols="3">
                                                                              <v-text-field required outlined label="Nombre del tutor" v-model="item.tutor" class="ml-4" :rules="rules.requerido"></v-text-field>
                                                                          </v-col>

                                                                          <v-col cols="2">
                                                                              <v-text-field required outlined label="Telefono" v-model="item.telefono" class="ml-4" :rules="rules.numerico"></v-text-field>
                                                                          </v-col>                         
                                                                          <v-col cols="2">
                                                                              <v-text-field required outlined label="Edad" v-model="item.edad" class="ml-4" :rules="rules.numerico"></v-text-field>
                                                                          </v-col>
                                                                          <v-col cols="2">
                                                                                <v-select
                                                                                    :items="['Niña','Niño']"
                                                                                    outlined
                                                                                    v-model="item.sexo"
                                                                                    class="ml-4"
                                                                                    label="sexo"
                                                                                ></v-select>
                                                                          </v-col>       
                                                                  </v-row>
                                                                </v-sheet>
                                                                <v-sheet class="d-flex justify-space-between">

                                                                <v-btn color="primary" @click="sheet.alumnos = !sheet.alumnos">
                                                                  Salir
                                                                </v-btn>
                                                                 

                                                                  <div>
                                                                  <v-btn @click="agregarfila()" color="green white--text">
                                                                    Agregar fila
                                                                  </v-btn>
                                                                  <v-btn @click="eliminarfila()" class="ml-4 white--text" color="red">
                                                                    Eliminar fila
                                                                  </v-btn>  


                                                                  <v-btn color="primary" @click="onSubmitalumnos()"  class="ml-4">
                                                                  Registrar
                                                                  </v-btn>
                                                                  </div>    
                                                                </v-sheet>
                                                                 
                                                                 
                                    
                                                              </v-container>

                                                            </v-tab-item>

                                                             <v-tab-item>

                                                              <v-container>
                                                                <br>
                                                               <v-data-table
                                                                :headers="headers"
                                                                :items="grupo.datos"
                                                                class="elevation-1"
                                                                :items-per-page="5"
                                                              >
                                                                <template v-slot:top>
                                                                  <v-toolbar
                                                                    flat
                                                                  >
                                                                    
                                                                    <v-select
                                                                      :items="grupos"
                                                                          outlined
                                                                          label="Seleccionar grupo"
                                                                          v-model="grupo.selected"
                                                                          @change="cargaralumnos()"
                                                                    ></v-select>

                                                                
                                                                  </v-toolbar>
                                                                </template>

                                                                <template v-slot:item.actions="{ item }">
                                                                  <v-icon
                                                                    small
                                                                    @click="deleteItem(item)"
                                                                  >
                                                                    mdi-delete
                                                                  </v-icon>
                                                                </template>
                                                              </v-data-table>
                                                              <br>
                                                              <v-btn color="primary" @click="sheet.alumnos = !sheet.alumnos">
                                                                  Salir
                                                              </v-btn>
                                                              </v-container>
                                                              

                                                            </v-tab-item>

                                                           
                                                        </v-tabs-items>
                                                    </v-col>


                                                    
                                                    
                                                        
                                                  </v-row>
                                                </v-container>
                                                </v-form>
                                          
                                            </v-sheet>

                                          </v-sheet>
                        </v-sheet>
                    </v-bottom-sheet>
                </v-card>
            </v-col>
            <!--Gestionar materas-->
            <v-col cols="3">
                <v-card height="150px">
                                                   <v-bottom-sheet v-model="sheet.materias" inset>
                        <template v-slot:activator="{ on, attrs }">
                            <v-sheet class="d-flex justify-space-around align-center select" height="100%" v-bind="attrs" v-on="on" @click="cargarmaestros()">
                                <div class="text-center text-body-1">Gestionar Materias</div>
                                <v-btn class="mx-2" fab dark color="indigo">
                                    <v-icon dark>mdi-file-document-edit</v-icon>
                                </v-btn>
                            </v-sheet>
                        </template>
                        <v-sheet height="700px">
                                        <v-sheet height="100%" class="d-flex justify-center align-center">

                                            <v-sheet  height="95%" width="95%">
                                              <v-form ref="materia">
                                                <v-container fluid>
                                                  <v-row no-gutters>
                                                    <v-col cols="12">
                                                       <v-tabs v-model="tabs.materias">
                                                            <v-tab>Crear nueva materia</v-tab>
                                                        </v-tabs>

                                                        <v-tabs-items v-model="tabs.materias">
                                                            <v-tab-item>
                                                              <v-container>
                                                                 <v-form ref="materia"> 
                                                                <v-row no-gutters>
                                                                 
                                                                  <v-col cols="6">
                                                                    <v-text-field required label="Nombre de la materia" v-model="materia.nombre" :rules="rules.requerido"></v-text-field>
                                                                  </v-col>

                                                                  <v-col cols="6">
                                                                      <v-select
                                                                        :items="[1,2,3,4,5,6,7,8]"
                                                                        label="Numero de bloques"
                                                                        v-model="materia.bloque"
                                                                        class="ml-5"
                                                                      ></v-select>
                                                                  </v-col>

                                                                  <v-col cols="6">
                                                                     <v-select
                                                                        :items="grupos"
                                                                        label="Selecciona grupo"
                                                                        v-model="materia.grupo"
                                                                      ></v-select>
                                                                  </v-col>
                                                                  <v-col cols="6">
                                                                     <v-select
                                                                        :items="maestros"   
                                                                        label="Selecciona maestro"
                                                                        v-model="materia.maestro"
                                                                        class="ml-5"
                                                                        ></v-select>
                                                                  </v-col>

                                                                  <v-col cols="!2"> 
                                                                    <div>Selecciona una imagen de portada</div>
                                                                    
                                                                    
                                                                        <v-carousel height="250px" v-model="portada">
                                                                                    <v-carousel-item
                                                                                      v-for="item in materiasimagenes"
                                                                                      :key="item"
                                                                                      :src="item"
                                                                                      reverse-transition="fade-transition"
                                                                                      transition="fade-transition"
                                                                                    ></v-carousel-item>
                                                                        </v-carousel>

                                                                     
                                                                  </v-col>
                                                              

                                                                </v-row>
                                                                  </v-form>
                                                                <br>
                                                                 <v-sheet class="d-flex align-center">
                                                                  <v-btn color="primary" @click="onSubmitmaterias()">
                                                                    Registrar
                                                                  </v-btn>
                                                                  <a class="ml-5" @click="sheet.materias = !sheet.materias">Cancelar</a>
                                                                </v-sheet>
                                                              </v-container>

                                                            </v-tab-item>
                                                             
                                                           <!--
                                                            <v-tab-item>
                                                               <v-container>
                                                                <v-row style="height:470px;" class="overflow-y-auto">
                                                                    <v-col cols="4" style="background-color: white;" v-for="(materia,i) in materias" :key="i">
                                                                      <v-card>
                                                                        <div class="d-flex flex-no-wrap justify-space-between">
                                                                                    <div>
                                                                                      <v-card-title
                                                                                        class="headline"
                                                                                        v-text="materia.nombre"
                                                                                      ></v-card-title>

                                                                                      <v-card-subtitle v-text="materia.maestro"></v-card-subtitle>

                                                                                      <v-card-actions>
                                                                                        

                                                                                        
                                                                                      </v-card-actions>
                                                                                    </div>

                                                                                    <v-avatar
                                                                                      class="ma-3"
                                                                                      size="125"
                                                                                      tile
                                                                                    >
                                                                                      <v-img :src="materia.url"></v-img>
                                                                                    </v-avatar>
                                                                                  </div>
                                                                                </v-card>

                                                                    </v-col>
                                                                </v-row>
                                                              </v-container>
                                                            </v-tab-item>
                                                             -->
                                                        </v-tabs-items>

                                                       


                                                    </v-col>
                                              
                                                  </v-row>
                                                </v-container>
                                                </v-form>
                                          
                                            </v-sheet>

                                          </v-sheet>
                        </v-sheet>
                    </v-bottom-sheet>
                </v-card>
            </v-col>

            <v-col cols="2" style="background-color: white;">
                <v-card height="250px">
                    <v-sheet class="d-flex justify-space-around align-center flex-column" height="100%">

                        <v-icon>mdi-lead-pencil</v-icon>
                        <h1> {{ numero.alumnos }}</h1>
                        <span class="text-center">Alumnos</span>

                    </v-sheet>
                </v-card>
            </v-col>

             <v-col cols="2" style="background-color: white;">
                <v-card height="250px">
                    <v-sheet class="d-flex justify-space-around align-center flex-column" height="100%">
                         <v-icon>mdi-account-edit</v-icon>
                        <h1> {{ numero.maestros }}</h1>
                        <div class="text-center text-body-1">Maestros</div>

                    </v-sheet>
                </v-card>
            </v-col>

             <v-col cols="2" style="background-color: white;">
                <v-card height="250px">
                    <v-sheet class="d-flex justify-space-around align-center flex-column" height="100%">
                       <v-icon>mdi-account-group</v-icon>
                        <h1>{{ numero.personal }}</h1>
                        <div class="text-center text-body-1">Personal</div>

                    </v-sheet>
                </v-card>
            </v-col>

            <v-col cols="6">
                <v-card height="250px">
                    <v-card-title>Grupos de alumnos</v-card-title>
                    <v-card-text class="text--primary">
                         <v-sparkline
                            :value="values"
                            :labels="labels"
                            padding="10"
                            height="50"
                            >
             
                            </v-sparkline>
                    </v-card-text>
                </v-card>
            </v-col>

        </v-row>

    </v-container>

    

</template>
<script>
import axios from 'axios';

export default {
  name: 'Ingresos',
  data: () => ({
    values: [],
    labels: [],
    sheet: {
        maestro: false,
        personal: false,
        anuncios: false,
        carousel: false,
        alumnos: false,
        materias: false
    },
    date: new Date().toISOString().substr(0, 10),
    alert: true,
    menu: false,
    tabs: {
      grupo: null,
      materias: null
    },
    maestro: {
      nombre: '',
      carrera: '',
      telefono: '',
      correo: '',
      contraseña: ''
    },
    personal: {
      nombre: '',
      cargo: '',
      telefono: '',
      correo: '',
      contraseña: '',
    },
    anuncio:{
      mensaje: '',
      destinatario: ''
    },
    anuncios:[],
    imagenes:[],
    rules: {
        requerido: [v => !!v || 'Campo obligatorio'],
        correo: [v => /.+@.+\..+/.test(v) || 'Correo invalido'],
        numerico: [ v => /[0-9]+/.test(v) || 'Solo numeros']
    },
    snackbar:{
      show: false,
      texto: '',
      color: ''
    },
    selectedimage: null,
    hover: false,
    alumnos: [
      {
        nombre: '',
        tutor: '',
        telefono: '',
        edad: '',
        sexo: ''
      },
      {
        nombre: '',
        tutor: '',
        telefono: '',
        edad: '',
        sexo: ''
      },
      {
        nombre: '',
        tutor: '',
        telefono: '',
        edad: '',
        sexo: ''
      }
    ],
    nombregrupo: '',
    headers: [
      { text: 'Nombre', value: 'nombre' },
      { text: 'Tutor', value: 'tutor' },
      { text: 'Telefono', value: 'telefono' },
      { text: 'Edad', value: 'edad' },
      { text: 'Sexo', value: 'sexo' },
      { text: 'Acciones', value: 'actions', sortable: false }
    ],
    grupo: {
      selected: '',
      datos: []
    },
    grupos: [],

    materias: [
      {
        nombre: 'español',
        maestro: 'juan',
        grupos: '1a',
        url: 'https://images.pexels.com/photos/256520/pexels-photo-256520.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
      }
    ],
    materia: {
      nombre: '',
      bloque: '',
      grupo: '',
      maestro: ''
    },
    portada: '',
    maestros: [],
    numero: {
      alumnos: 0,
      personal: 0,
      maestros: 0,
    }

  }),
  async created() {
      this.incrementar()
  },
  methods: {
    async onSubmitmaestro () {
      console.log(this.maestro)
      let validate=this.$refs.maestro.validate()
      if(validate){
        const response = await axios.post(this.host+'maestros/create',JSON.stringify([this.maestro]));        
        if(response){
          this.sheet.maestro = !this.sheet.maestro 
          this.snackbar.show=true
          this.snackbar.texto='Maestro registrado exitosamente'
          this.snackbar.color='primary'
          this.incrementar()
        }else{
          this.snackbar.show=true
          this.snackbar.texto='No se puedo registrar maestro'
          this.snackbar.color='red'
        }
       this.$refs.maestro.reset()

      }
    },
    async onSubmitpersonal () {
     let validate=this.$refs.personal.validate()
      if(validate){
        const response = await axios.post(this.host+'personal/create',JSON.stringify([this.personal]));
        console.log(response)
        if(response){
          this.sheet.personal = !this.sheet.personal
          this.snackbar.show=true
          this.snackbar.texto='Personal registrado exitosamente'
          this.snackbar.color='primary'
          this.incrementar()
        }else{
          this.snackbar.show=true
          this.snackbar.texto='No se puedo registrar personal'
          this.snackbar.color='red'
        }
        this.$refs.personal.reset()

      }

    },
    async onSubmitanuncios () {

      let datos={
        mensaje: this.anuncio.mensaje,
        fecha: this.date[0],
        expira: this.date[1],
        destinatario: this.anuncio.destinatario
      }

      let validate=this.$refs.anuncio.validate()
      if(validate){
        const response = await axios.post(this.host+'anuncios/create',JSON.stringify([datos]));
        if(response){
          this.sheet.anuncios = !this.sheet.anuncios
          this.snackbar.show=true
          this.snackbar.texto='Anuncio creado exitosamente'
          this.snackbar.color='primary'
        }else{
          this.snackbar.show=true
          this.snackbar.texto='No se pudo crear anuncio'
          this.snackbar.color='red'
        }
        this.$refs.anuncio.reset()

      }
      

    },
    async onSubmitcarousel () {

      let formData = new FormData();
      formData.append("file", this.selectedimage);
      const response = await axios.post(this.host, formData, {
        headers: {
        "Content-Type": "multipart/form-data"
        }
      });
      if(response.status==200){
          this.cargarimagenes()
          this.$refs.carousel.reset() 
      }


    },
    async onSubmitalumnos () {

      let datos= {
        grupo: this.nombregrupo,
        alumnos: this.alumnos
      }
      try {
        const response = await axios.post(this.host+'alumnos/create',JSON.stringify(datos));
        if(response){
          this.sheet.alumnos = !this.sheet.alumnos 
          this.snackbar.show=true
          this.snackbar.texto='Grupo creado exitosamente'
          this.snackbar.color='primary'
          this.nombregrupo=''
          this.alumnos=[
                  {
                    nombre: '',
                    tutor: '',
                    telefono: '',
                    edad: '',
                    sexo: ''
                  }
                  ]
          this.incrementar()
        
        }else{
          this.snackbar.show=true
          this.snackbar.texto='No se pudo crear grupo'
          this.snackbar.color='red'
        }
      } catch (error) {
        console.error(error);
      }

    },
    async onSubmitmaterias () {
      let datos= {
        nombre: this.materia.nombre,
        bloques: this.materia.bloque,
        url: this.materiasimagenes[this.portada],
        grupo: this.materia.grupo,
        maestro: this.materia.maestro
      }
      try {
          const response = await axios.post(this.host+'materias/create', JSON.stringify([datos]));
           if(response){
          this.snackbar.show=true
          this.snackbar.texto='Materia creada exitosamente'
          this.snackbar.color='primary'
          this.sheet.materias = !this.sheet.materias 
          this.$refs.materia.reset()
          }else{
            this.snackbar.show=true
            this.snackbar.texto='No se pudo crear materia'
            this.snackbar.color='red'
          }
              
      } catch (error) {
          
      }
    },
    async cargaranuncios () {
      try {
        const response = await axios.get(this.host+'anuncios');
        this.anuncios=response.data
        this.$refs.anuncio.reset()

      } catch (error) {
        console.error(error);
      }
    },
    async eliminaranuncio (item,i) {
      console.log(item)
      this.anuncios.splice( i, 1 );
      try {
        const response = await axios.post(this.host+'anuncios/delete',JSON.stringify([item]));
      } catch (error) {
        console.error(error);
      }

    },
    async cargarimagenes() {
      try {
        const response = await axios.get(this.host+'banner');
        this.imagenes=response.data
      } catch (error) {
        console.error(error);
      }
    },
    async eliminarimagen(item) {
      try {
        let index=item.indexOf('img')
        let data= {
          url: item,
          name: item.substring(index)
        }
        const response = await axios.post(this.host+'banner/delete', JSON.stringify(data));
        this.cargarimagenes()
        
      } catch (error) {
        console.error(error);
      }
    },

    agregarfila(){
      this.alumnos.push(
      {
        nombre: '',
        tutor: '',
        telefono: '',
        edad: '',
        sexo: ''
      }

      )
    },
    eliminarfila(){
      this.alumnos.pop()
    },
    async deleteItem (item) {
      const index = this.grupo.datos.indexOf(item)
      this.grupo.datos.splice(index, 1)  
       try {
          const response = await axios.post(this.host+'alumnos/delete',JSON.stringify([item]));
        
        } catch (error) {
                console.error(error);
        }

    },
    async cargargrupos(){
        try {
              const response = await axios.get(this.host+'grupos');
              if(response.data!=0){
                this.grupos= response.data.filter(item => item!='')
              }
             
             
        } catch (error) {
                console.error(error);
         }
    },
    async cargaralumnos(){
       try {
              const response = await axios.post(this.host+'grupo/alumnos',this.grupo.selected);
              if(response.data!=0){
                this.grupo.datos=response.data
              }else{
                this.grupo.datos=[]
              }
        } catch (error) {
                console.error(error);
         }
    },
    async cargarmaestros() {
        this.cargargrupos()
        try {
              const response = await axios.post(this.host+'maestros', this.grupo.selected);
              if(response.data!=0){
                this.maestros=[]
                response.data.forEach(element => {
                   this.maestros.push(element.nombre)
                });                
              }else{
                
              }
        } catch (error) {
                console.error(error);
         }
    },
    async incrementar(){

      this.labels=[]
      this.values=[]
      this.numero.personal=0
      this.numero.maestros=0
      this.numero.alumnos=0


      try {

        let response = await axios.get(this.host+'grupos');
        if(response.data!=0){
          this.labels=response.data
        }

        response = await axios.get(this.host+'alumnos');
        if(response.data!=0){
           this.numero.alumnos=response.data.length 

            for (let i = 0; i < this.labels.length; i++) {
              let contador = response.data.filter(item => item.grupo == this.labels[i]).length
              this.values.push(contador)
            }
        }
        
        response = await axios.get(this.host+'personal');
        if(response.data!=0){
            this.numero.personal=response.data.length
        }

        response = await axios.get(this.host+'maestros');
        if(response.data!=0){
            this.numero.maestros=response.data.length
        }

        

        
      
      } catch (error) {
          console.error(error);
      }
    }



     

  },
  computed: {
    host: function (){
          return this.$store.state.host;
    },
    materiasimagenes(){
          return this.$store.state.materiasimagenes;
    }
  }

}
</script>
