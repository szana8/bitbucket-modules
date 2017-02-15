import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource)
;
import Module from './components/VueModule.vue';
import Modal from './components/VueModal.vue';

window.module = Vue.component('module', Module);
window.modal = Vue.component('modal', Modal);