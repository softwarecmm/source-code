import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue')
  },
  {
    path: '/administrador/login',
    name: 'LoginAdministrador',
    component: () => import('../views/administrador/Login.vue')
  },
  {
    path: '/maestros/login',
    name: 'LoginMaestros',
    component: () => import('../views/maestro/Login.vue')
  },
  {
    path: '/personal/login',
    name: 'LoginPersonal',
    component: () => import('../views/personal/Login.vue')
  },
  {
    path: '/maestro',
    name: 'Maestro',
    component: () => import('../views/maestro/Inicio.vue'),
    meta: {
      auth: true
    },
    children: [
      {
        path: 'materias',
        component: () => import('../views/maestro/Materias.vue'),
        props: true
      },
      {
        path: 'informacion',
        component: () => import('../views/maestro/Informacion.vue')
      },
      {
        path: 'materia/',
        name: 'materia',
        component: () => import('../views/maestro/Materia.vue'),
        props: true
      }
    ]
  },
  {
    path: '/personal',
    name: 'Personal',
    component: () => import('../views/personal/Inicio.vue'),
    meta: {
      auth: true
    },
    children: [
      {
        path: 'ingresos',
        component: () => import('../views/personal/Ingresos.vue')
      },
      {
        path: 'pagos',
        component: () => import('../views/personal/Pagos.vue')
      }
    ]
  },
  {
    path: '/administrador',
    name: 'Administrador',
    meta: {
      auth: true
    },
    component: () => import('../views/administrador/Inicio.vue'),
    children: [
      {
        path: 'dashboard',
        component: () => import('../views/administrador/Dashboard.vue')
      },
      {
        path: 'administrarmaestros',
        component: () => import('../views/administrador/AdministrarMaestros.vue')
      },
      {
        path: 'administrarpersonal',
        component: () => import('../views/administrador/AdministrarPersonal.vue')
      }
    ]
  }
]

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {

  if(to.name=='Home' || to.name=='LoginAdministrador' || to.name=='LoginMaestros' || to.name=='LoginPersonal'){
      store.commit('activarmenu')
  }else{
      store.commit('desactivarmenu')
  }


  if (to.matched.some(record => record.meta.auth)) {
    if (store.state.auth) {
      next()
    } else {
      next('/')
    }
  } else {
    next()
  }

})



export default router
