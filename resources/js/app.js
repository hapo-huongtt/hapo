require('./bootstrap');
require('admin-lte/dist/js/adminlte.min');
require('bootstrap-select/dist/js/bootstrap-select.min');
require('select2');

$(document).ready(function() {
    $('.select2-multiple').select2();
});

$(function () {
$('#datetimepicker').datetimepicker();
});