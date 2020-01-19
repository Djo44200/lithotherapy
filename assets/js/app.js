/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from 'vue'
import App from './App'

new Vue({
    el: '#app',
    template: '<App/>',
    components: { App }
})

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

// require the JavaScript
require('bootstrap-star-rating');
// require 2 CSS files needed
require('bootstrap-star-rating/css/star-rating.css');
require('bootstrap-star-rating/themes/krajee-svg/theme.css');

//Afficher les infos bulles
$(function()
{
    $(".tooltip-link").tooltip();
});

//Ajax recherches

$("#rechercheDeVille").keyup(function () {
    let recherche = $('#rechercher').val();
    var path = $("#path_adrVille").attr("data-path");
    $.ajax({
        url: path, // La ressource ciblée
        type: 'GET', // Le type de la requête HTTP.
        data: 'recherche=' + recherche,
        success: function (response) {
            $('#resultat').html($('.table-responsive-xl',response));
        },

    });
});


$("#rechercheDeSite").keyup(function () {
    let recherche = $('#rechercher').val();
    var path = $("#path_adrSite").attr("data-path");
    $.ajax({
        url: path, // La ressource ciblée
        type: 'GET', // Le type de la requête HTTP.
        data: 'recherche=' + recherche,
        success: function (response) {
            $('#resultat').html($('.table-responsive-xl',response));
        },

    });
});

$("#rechercheDeUser").keyup(function () {
    let recherche = $('#rechercher').val();
    var path = $("#path_adrSite").attr("data-path");
    $.ajax({
        url: path, // La ressource ciblée
        type: 'GET', // Le type de la requête HTTP.
        data: 'recherche=' + recherche,
        success: function (response) {
            $('#resultat').html($('.table-responsive-xl',response));
        },

    });
});


