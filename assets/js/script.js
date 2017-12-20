/**
* Datatable
* Adds Datatable woth table id 'mytable'
*/
$(document).ready(function(){
    $('#mytable').DataTable({
    });
});

/**
* CSRF
* Includes and regenerates csrf token on each ajax request
*/
$(function() {
    $.ajaxSetup({
       data: csfrData
    });
});