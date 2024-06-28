import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';
import 'jquery';

// import Jquery
import $ from 'jquery';
window.$ = window.jQuery = $;

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import 'select2';
import 'select2/dist/css/select2.min.css';

import 'bootstrap/dist/css/bootstrap.min.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

import './scripts/select2.js';
import './scripts/eleves/checkbox.js';
import './scripts/eleves/color.js';
import './scripts/eleves/deleteDoc.js';
import './scripts/eleves/format_number.js';
import './scripts/eleves/handicap.js';
import './scripts/eleves/lieuNaissance.js';
import './scripts/eleves/reglement_scolarite.js';
import './scripts/eleves/sante.js';
import './scripts/eleves/scolarite1.js';

import './scripts/meres/mersTelephone.js';
import './scripts/peres/pereTelephone.js';
import './scripts/clickTable.js';
