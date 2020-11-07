<template>
    <v-navigation-drawer
          permanent
          mini-variant
          app
          color="primary"
          dark  
        >
        <template v-slot:prepend>
          <v-list >
            <v-list-item class="px-2 mt-3">
                <img src="@/assets/white.png" height="48">
            </v-list-item>
          </v-list>
        </template>
      <v-sheet class="d-flex align-center" height="100%" color="rgba(0,0,0,0)" v-if="$store.state.nav">
          <v-list
            nav
            dense
          >
            <v-list-item link to="/">
              <v-list-item-icon>
                <v-icon>mdi-home</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Inicio</v-list-item-title>
            </v-list-item>

            <v-list-item link to="/maestros/login">
              <v-list-item-icon>
                <v-icon>mdi-account-edit</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Maestros</v-list-item-title>
            </v-list-item>

            <v-list-item link to="/personal/login">
              <v-list-item-icon>
                <v-icon>mdi-account-group</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Personal</v-list-item-title>
            </v-list-item>

            <v-list-item link to="/administrador/login">
              <v-list-item-icon>
                <v-icon>mdi-account-lock</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Administrador</v-list-item-title>
            </v-list-item>

          </v-list>
      </v-sheet>
    </v-navigation-drawer>
</template>
<script>

export default {
  name: 'Drawer',
  data: () => ({

  }),
  methods: {

  }
}
</script>
