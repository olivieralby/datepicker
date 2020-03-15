/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
import Vue from 'vue'
import Datepicker from './Datepicker'
import Planning from './Planning'
import Edit from './Edit';
import Show from './Show';

new Vue({
    components: {
        Datepicker
    }
}).$mount('#app')
new Vue({
    components: {
        Planning
    }
}).$mount('#planning')




//appel de la class Edit permettant d'afficher la pop-up edition
new Edit(document.querySelector('.filter'))

//appel de la class Show permettant de voir la pop-up avec le planning
new Show(document.querySelector('#planning'))