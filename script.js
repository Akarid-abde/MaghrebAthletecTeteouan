$(document).ready(function() {
    // AJAX request to fetch content from page.php
    $.ajax({
        url: 'getentraineur.php',
        type: 'GET',
        success: function(response) {
            // Display the fetched content in the 'selectedList' div
            $('#entraineur').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $.ajax({
        url: 'getCategories.php',
        type: 'GET',
        success: function(response) {
            // Display the fetched content in the 'selectedList' div
            $('#Categories').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $.ajax({
        url: 'getSéances.php',
        type: 'GET',
        success: function(response) {
            // Display the fetched content in the 'selectedList' div
            $('#Séances').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $.ajax({
        url: 'getterain.php',
        type: 'GET',
        success: function(response) {
            $('#Terains').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $.ajax({
        url: 'getTypePayment.php',
        type: 'GET',
        success: function(response) {
            // Display the fetched content in the 'selectedList' div
            $('#payement').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    

});

