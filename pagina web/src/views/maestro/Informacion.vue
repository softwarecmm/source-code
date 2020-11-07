<template>
<v-container fluid>

    <v-row>
        <v-col cols="12">
        <v-card
        >
    <v-img
      height="250"
      src="https://www.teahub.io/photos/full/160-1609765_sobre-la-educacion.jpg"
    ></v-img>

    <v-card-title>{{ $store.state.user.nombre }}</v-card-title>

    <v-card-text>

      <div class="my-4 subtitle-1">
        {{ $store.state.user.carrera }}
      </div>
    </v-card-text>

    <v-divider class="mx-4"></v-divider>

    <v-card-title>Datos</v-card-title>

    <v-card-text>
      <v-chip-group
        active-class="deep-purple accent-4 white--text"
        column
      >
        <v-chip>Telefono: {{ $store.state.user.telefono }} </v-chip>

        <v-chip>Correo: {{ $store.state.user.correo }} </v-chip>

      </v-chip-group>
    </v-card-text>

    <v-card-actions>
      <v-btn
        color="deep-purple lighten-2"
        text
        link
        to="/"
      >
        Cerrar sesion
      </v-btn>
    </v-card-actions>
  </v-card>
          </v-col>
        </v-row>
</v-container>

</template>
