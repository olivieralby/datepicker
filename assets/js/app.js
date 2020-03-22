/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';
import Vue from 'vue'
import Datepicker from './Datepicker'
import Planning from './Planning'
import Autogrow from './Autogrow';

new Autogrow()
new Vue({
    components: {
        Datepicker
    }
}).$mount('#calendar')
new Vue({
    components: {
        Planning
    }
}).$mount('#planning')




/**
 * Mise en place d'un code pour l'animation du champ de saisie
 */
$(document).ready(function(){
    //Formation
    let div3 = $('.form-format')
    div3.hide()
    $('.formation_formulaire h4').click(function(){
        let saisie = $('.app')
        if(div3.is(':hidden')){
            div3.slideDown()
            $('.formation_formulaire h4 span').css({
                'transform':'rotate(180deg)',
            })
        }else{
            div3.slideUp()
            
            $('.formation_formulaire h4 span').css({
                'transform':'rotate(0deg)',
            })
        }
    })    
    //commentaire
    let div = $('.date_comment')
    div.hide()
    $('.commentaire h4').click(function(){
        if(div.is(':hidden')){
            div.slideDown()
            $('.commentaire h4 span').css({
                'transform':'rotate(180deg)',
            })
        }else{
            div.slideUp()
            $('.commentaire h4 span').css({
                'transform':'rotate(0deg)',
            })
        }
    })

    //élève
    let div1 = $('.form_study')
    div1.hide()
    $('.study h4').click(function(){
        if(div1.is(':hidden')){
            div1.slideDown()
            $('.study h4 span').css({
                'transform':'rotate(180deg)',
            })
        }else{
            div1.slideUp()
            $('.study h4 span').css({
                'transform':'rotate(0deg)',
            })
        }
    })
    //planning
    let div2 = $('.form-planning')
    div2.hide()
    $('.planning_formulaire h4').click(function(){
        if(div2.is(':hidden')){
            div2.slideDown()
            $('.planning_formulaire h4 span').css({
                'transform':'rotate(180deg)',
            })
        }else{
            div2.slideUp()
            $('.planning_formulaire h4 span').css({
                'transform':'rotate(0deg)',
            })
        }
    })
    
})
