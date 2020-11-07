<template>

    <v-container fluid>

        <v-row>
          <v-col cols="12">
                <v-sheet height="10%" class="primary--text font-weight-bold">
                  <h2> Informacion importante</h2>
                </v-sheet>
          </v-col>
        </v-row>

        <v-row style="height:330px;">

            <v-col cols="2">
                    <v-card height="100%">
                        <v-card-title> Pagos realizados</v-card-title>
                        <v-card-text class="text--primary d-flex justify-center">
                            <v-progress-circular
                                    rotate="360"
                                    size="220"
                                    width="20"
                                    value="70"
                                    color="teal"
                                    >
                                    70%
                            </v-progress-circular>
                        </v-card-text>
                    </v-card>
            </v-col>

            <v-col cols="4">
                <v-card height="100%">
                    <v-card-title>Ganancias este mes</v-card-title>
                    <v-card-text class="text--primary">
                         <v-sparkline
                            :value="[10,8,8,10]"
                            :labels="['semana 1', 'semana 2','semana 3','semana 4']"
                            color="black"
                            height="100%"
                            padding="20"
                            stroke-linecap="round"
                            smooth
                            >
                                <template v-slot:label="item">
                                    ${{ item.value }}
                                </template>
                            </v-sparkline>
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col cols="4" style="background-color: white;" >
                    <v-card
                        class="mx-auto text-center"
                        color="white"
                        height="100%"
                    >
                        <v-card-title> Esta semana</v-card-title>

                        <v-card-text>
                            <v-sparkline
                            :value="[10,10,9,10,10]"
                            :labels="['Lun','Mar','Mier','Jue','Vier']"
                            color="black"
                            height="100%"
                            padding="24"
                            stroke-linecap="round"
                            smooth
                            >
                                <template v-slot:label="item">
                                    {{ item.value }}
                                </template>
                            </v-sparkline>

                        </v-card-text>

                    </v-card>
            </v-col>

            <v-col cols="2" style="background-color: white;">
                    <v-sheet class="d-flex justify-center align-center flex-column select" height="100%" elevation="2" @click="nuevopago()">
                        <v-btn class="mx-2" fab dark color="indigo">
                            <v-icon dark>mdi-plus</v-icon>
                        </v-btn>
                        <br>
                        <h3 class="text-center">Registrar <br> nuevo pago</h3>

                    </v-sheet>
            </v-col>
        </v-row>

        <v-row style="height:100px;">
                <v-col cols="12" style="background-color: white;" >
                                    <v-card
                                        class="mx-auto text-center"
                                        color="white"
                                        height="100%"
                                    >
                                        <v-card-title> Ganancias este año</v-card-title>

                                        <v-card-text>
                                            <v-sparkline
                                            :value="ganancias"
                                            :labels="['ene','feb','mar','may','jun','jul','ago','oct','nov','dic']"
                                            color="black"
                                            height="70%"
                                            label-size="3"
                                            line-width="2"
                                            padding="24"
                                            stroke-linecap="round"
                                            smooth
                                            >
                                                <template v-slot:label="item">
                                                    {{ item.value }}
                                                </template>
                                            </v-sparkline>

                                        </v-card-text>

                                    </v-card>
                </v-col>
        </v-row>

    </v-container>

</template>
<script>

export default {
  name: 'Ingresos',
  data: () => ({
    value: [423, 446, 675, 510, 590, 610, 760, 499],
    ganancias: [423, 446, 675, 510, 590, 610, 760, 499, 675, 510]

  }),
  methods: {

      nuevopago(){
          this.$router.push("/personal/pagos")
      }

  },
  computed: {

  }

}
</script>
