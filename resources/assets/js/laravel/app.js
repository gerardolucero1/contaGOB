/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueFuse from 'vue-fuse';

Vue.use(VueFuse);

import DataTable from 'laravel-vue-datatable';

Vue.use(DataTable);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('guests-component', require('./components/client/GuestsComponent.vue').default);
Vue.component('companion-component', require('./components/system/CompanionComponent.vue').default);
Vue.component('my-list-component', require('./components/client/MyListComponent.vue').default);
Vue.component('tables-component', require('./components/client/TablesComponent.vue').default);
Vue.component('clients-online-component', require('./components/system/ClientsOnlineComponent.vue').default);
Vue.component('my-block-list-component', require('./components/client/MyBlockListComponent.vue').default);
Vue.component('my-task-component', require('./components/client/MyTaskComponent.vue').default);
Vue.component('block-component', require('./components/system/BlockComponent.vue').default);
Vue.component('list-component', require('./components/system/ListComponent.vue').default);
Vue.component('task-component', require('./components/system/TaskComponent.vue').default);
Vue.component('quotation-component', require('./components/system/QuotationComponent.vue').default);
Vue.component('calendar-component', require('./components/system/CalendarComponent.vue').default);
Vue.component('statistic-component', require('./components/system/StatisticComponent.vue').default);
Vue.component('beneficiaries-component', require('./components/system/BeneficiariesComponent.vue').default);
Vue.component('provider-component', require('./components/system/ProviderComponent.vue').default);
Vue.component('bankaccount-component', require('./components/system/BankAccountComponent.vue').default);
Vue.component('accountingmoment-component', require('./components/system/AccountingMomentComponent.vue').default);
Vue.component('accounttype-component', require('./components/system/AccountTypeComponent.vue').default);
Vue.component('internaladminclasification-component', require('./components/system/InternalAdminClassificationComponent.vue').default);
Vue.component('accountplanconac-component', require('./components/system/AccountPlanCONACComponent.vue').default);
Vue.component('adminconac-component', require('./components/system/AdminClassificationCONACComponent.vue').default);
Vue.component('classifierbyexpendinture-component', require('./components/system/ClassifierByExpenditureComponent.vue').default);
Vue.component('classifierrevenuecategory-component', require('./components/system/ClassifierRevenueCategoryComponent.vue').default);
Vue.component('functionalcassification-component', require('./components/system/FunctionalClassificationComponent.vue').default);
Vue.component('policies-component', require('./components/system/PoliciesComponent.vue').default);
Vue.component('issuanceexpenses-component', require('./components/system/IssuanceExpensesComponent.vue').default);

//Web Components
Vue.component('app-component', require('./components/web/AppComponent.vue').default);
Vue.component('navbar-component', require('./components/web/NavbarComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './routes'

const app = new Vue({
    el: '#app',
    router,
});