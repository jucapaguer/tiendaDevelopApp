import './bootstrap'
import './swipper'
import * as bootstrap from 'bootstrap'

import 'laravel-datatables-vite';

import Swiper from "swiper";


$(document).ready(function() {

    if($('#categoriesTable').length > 0){

        console.log('.');

        $('#categoriesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
            ],
            "columns": [
                null,
                null,
                null,
                { "width": "20%" },
            ]
        } );
    }
    if($('#shippingzone').length > 0){
        console.log('..');
        $('#shippingzone').DataTable({
            dom: 'Bfrtip',
            buttons: [
            ],
            "columns": [
                null,
                null,
                null,
                { "width": "20%" },
            ]
        } );
    }
    if($('#productsTable').length > 0){
        console.log('...');
        $('#productsTable').DataTable({
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: [
            ],
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                { "width": "20%" },
            ]
        } );
    }
    if($('#ordersTable').length > 0){
        console.log('....');
        $('#ordersTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
            ],
            "columns": [
                null,
                null,
                null,
                null,
                { "width": "20%" },
            ]
        } );
    }
    
});
