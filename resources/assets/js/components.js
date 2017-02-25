import Vue from 'vue';
//noinspection JSUnresolvedVariable
import VueResource from 'vue-resource';

Vue.use(VueResource);
//noinspection JSUnresolvedVariable
import Module from './components/VueModule.vue';
//noinspection JSUnresolvedVariable
import Modal from './components/VueModal.vue';

import Errors from './classes/Errors';
window.Errors = Errors;

import Form from './classes/Form';
window.Form = Form;

import Alert from './classes/Alert.js';
window.Alert = Alert;

import Helpers from './classes/Helpers.js';
window.Helpers = Helpers;

import ModalHelper from './classes/ModalHelper.js';
window.ModalHelper = ModalHelper;

window.module = Vue.component('module', Module);
window.modal = Vue.component('modal', Modal);