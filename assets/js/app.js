const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

require('../css/app.scss');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

const axios = require('axios');

axios.get('/build/manifest.json')
    .then(function(response) {
        console.log(response.data);
    })
    .catch(function (error) {
        console.error(error);
    });
