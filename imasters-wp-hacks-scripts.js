( function($) {

    $( function() {
        AWH.init();
        AWH.iwph_uninstall_button();
    })

    AWH = {
        init : function() {
           $('#ah-frm-navigation').submit( function() {
               var dashboard_redir = $('#imasters_hacks_dashboard_redir').val();
              
               if ( dashboard_redir == '' || dashboard_redir == 'http://' ) {
                   $('label[for="imasters_hacks_dashboard_redir"]').html( imasters_hacks_dashboard_redir_message );
                   return false;
               } else {
                   return true;
               }
               
           })
        },

        iwph_uninstall_button : function() {
                    var button = $('input[name="do"]');
                    var checkbox = $('#uninstall_iwph_yes');
                    button.hide();
                    checkbox.attr( 'checked', '' ).click(function() {
                        var is_checked = checkbox.attr( 'checked' );
                        if ( is_checked )
                            button.fadeIn();
                        else
                            button.fadeOut();
                    })
                }

    }

})(jQuery);


