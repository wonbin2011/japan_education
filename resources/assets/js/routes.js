/*
 |-------------------------------------------------------------------------------
 | routes.js
 |-------------------------------------------------------------------------------
 | Contains all of the routes for the application
 */

/**
 * Imports Vue and VueRouter to extend with the routes.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * Extends Vue to use Vue Router
 */
Vue.use( VueRouter )

/**
 * Makes a new VueRouter that we will use to run all of the routes for the app.
 */
export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Vue.component( 'Home', require( './pages/Home.vue' ) )
        },
        // {
        //     path: '/bind',
        //     name: 'bind',
        //     component: Vue.component( 'Cafes', require( './pages/Bind.vue' ) )
        // },
        // {
        //     path: '/list',
        //     name: 'list',
        //     component: Vue.component( 'NewCafe', require( './pages/List.vue' ) )
        // },
        // {
        //     path: '/info/:id',
        //     name: 'userinfo',
        //     component: Vue.component( 'Cafe', require( './pages/Info.vue' ) )
        // }
    ]
});