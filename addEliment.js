    $( "body" ).on( "focus", 'input.last' ,function() {
        
        /*
        $( "body" ).on( "input.link" ).each(function( index ) {
          console.log( index + ": " + $( this ).attr('value') );
        });
        */
        var val = $( this ).val();
        $( this ).removeClass('last');
        if ( val == '') {
            $( this ).after( '<input type="text" class="Width100 link last" value="" />' );
        }
    
    });
    
    $( "body" ).on( "focusout", 'input.link' ,function() {
        var val = $( this ).val();
        var cla =  
        console.log( cla );
        if ($( this ).hasClass('last')){
        }else{               
            if ( val == '') {
                $( this ).remove();
            }
        }
    });
