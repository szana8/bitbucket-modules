import Vue from 'vue';
//noinspection JSUnresolvedVariable
import VueResource from 'vue-resource';

Vue.use(VueResource);
//noinspection JSUnresolvedVariable
import Module from './components/VueModule.vue';
//noinspection JSUnresolvedVariable
import Modal from './components/VueModal.vue';

window.module = Vue.component('module', Module);
window.modal = Vue.component('modal', Modal);