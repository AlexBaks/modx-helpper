    $( "body" ).on( "focus", 'input.last' ,function() {
        
        var val = $( this ).val();
        $( this ).removeClass('last');
        if ( val == '') {
            $( this ).after( '<input type="text" class="Width100 link last" value="" />' );
        }
    
    });
    
    $( "body" ).on( "focusout", 'input.link' ,function() {
        var val = $( this ).val();
        
        if ($( this ).hasClass('last')){
        }else{               
            if ( val == '') {
                $( this ).remove();
            }
        }
        var rez = '';
        $( "input.link" ).each(function( index ) {
            if ($( this ).hasClass('last')){
            }else{
                rez = rez + $( this ).val() + ';';
            }
        });
        $( "#links" ).val(rez);        
    });
