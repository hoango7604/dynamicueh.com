jQuery( document ).ready( function ($) {
    "use strict";

    // Get URL
    var getURL  = window.location.href,
        baseURL = getURL.substring(0, getURL.indexOf('/wp-admin') + 9);

    // Install and Activate
    $( '#magazineart-demo-content-inst' ).on( 'click', function() {

            $('#magazineart-demo-content-inst').html( 'Installing Import Plugin...' );

            var data = {
                action: 'magazineart_plugin_auto_activation'
            };

            wp.updates.installPlugin({
                slug: 'one-click-demo-import',
                success: function(){
                    $.post(ajaxurl, data, function(response) {
                        $('#magazineart-demo-content-inst').html( 'Redirecting...' );
                        window.location.replace( baseURL + '/themes.php?page=pt-one-click-demo-import' );
                    })
                }
            });

        }
    );

    // Activate
    $( '#magazineart-demo-content-act' ).on( 'click', function() {

            $('#magazineart-demo-content-act').html( 'Installing Import Plugin...' );

            var data = {
                action: 'magazineart_plugin_auto_activation'
            };

            $.post(ajaxurl, data, function(response) {
                $('#magazineart-demo-content-act').html( 'Redirecting...' );
                window.location.replace( baseURL + '/themes.php?page=pt-one-click-demo-import' );
            })

        }
    );

});
