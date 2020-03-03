/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';

import VueRouter from 'vue-router';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter);
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar,{
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '10px'
});

import Vuetable from 'vuetable-2'
Vue.use(Vuetable);
window.Vuetable = Vuetable;
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination';
window.VuetablePagination = VuetablePagination;

import Swal from 'sweetalert2';
window.Swal = Swal;
  
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  window.Toast = Toast;

//Vue.use(DatatableFactory);

// import vSelect from 'vue-select';
// Vue.use(vSelect);

import VueEvents from 'vue-events'
Vue.use(VueEvents)

import carousel from 'vue-owl-carousel';
Vue.use(carousel);
window.carousel = carousel;



Vue.filter('getAge',function(dob){
    var currentYear = new Date();
    var n = currentYear.getFullYear();
    var yearBirth = new Date(dob);
    var y = yearBirth.getFullYear();
    return n-y;
})

Vue.filter('getYear',function(){
    var year = new Date();
    return year.getFullYear();
})



const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/job', component: require('./components/Jobs.vue').default },
    { path: '/bride', component: require('./components/bride.vue').default },
    { path: '/groom', component: require('./components/groom.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/addFamily', component: require('./components/family/AddNewMember.vue').default },
  //  { path: '/editmember/:userid',name:'editmember' , component: require('./components/family/EditMember.vue').default },
    { path: '/editmember',name:'editmember',component: require('./components/family/EditMember.vue').default },
    { path: '/family',component:require ('./components/family/familymemberlist.vue').default },
    { path: '/addjob',component:require ('./components/addjob.vue').default },
    { path: '/applyjob',component:require('./components/applyjob.vue').default},
    { path: '/addjobcategory',component:require('./components/jobcategory.vue').default},
    { path: '/jobdashboard',component:require('./components/jobs/jobdashboard.vue').default},
    { path: '/directory',component:require('./components/showdirectory.vue').default},
    { path: '/insertnews',component:require('./components/insertnews.vue').default},
    { path: '/addtodirectory',component:require('./components/admin/directory.vue').default},
    { path: '/directory',component:require('./components/showdirectory.vue').default},
    { path: '/applicants',component:require('./components//applicants.vue').default},
    { path: '/myapplications',component:require('./components/myapplication.vue').default},
    { path: '/events',component:require('./components/event/getEvents.vue').default},
    { path: '/editEvents',component:require('./components/admin/editEvents.vue').default},
    { path: '/addEvents',component:require('./components/admin/addEvents.vue').default},
    { path: '/myJobs',component:require('./components/addjob1.vue').default},
    { path: '/settings',component:require('./components/admin/settings.vue').default},
    { path: '*',component:require('./components/admin/404.vue').default},
]

const router = new VueRouter({
    mode:'history',
    routes
})




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

const app = new Vue({
    el: '#app',
    router
});
