<?php
    $load=false;    
    if(file_exists($lc->datepicker_file)){
        $load=true;    
    }                    
?>
            @if($load)
                    @include($lc->datepicker_template)
            @endif