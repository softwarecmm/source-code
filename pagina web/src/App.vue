<template>
<v-app >
  <Drawer></Drawer>
  <v-main>
    <v-container fluid v-resize="onResize" id="container">
        <router-view></router-view>
    </v-container>
  </v-main>
</v-app>
</template>

<script>
import Drawer from '@/components/Drawer.vue'

export default {
  name: 'App',
  components: {
    Drawer
  },
  data: () => ({
 
  }),
  methods: {
    onResize () {
      document.getElementById('container').style.height=window.innerHeight+'px'
    }
  }
}
</script>
