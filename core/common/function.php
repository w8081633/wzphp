<?php
function p ($var){
    if(is_bool($var)){
        var_dump($var);
    }else if(is_null($var)){
        var_dump(null);
    }else{
        echo "<pre style='posision:relative;z-index:1000;padding: 10px;border-radius:5px;background: deeppink;border: 1px solid greenyellow;font-size:14px;line-height: 18px;opacity: 0.9; '>".print_r($var,true)."</pre>";
    }

}
