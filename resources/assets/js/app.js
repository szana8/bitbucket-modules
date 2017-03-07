
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

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