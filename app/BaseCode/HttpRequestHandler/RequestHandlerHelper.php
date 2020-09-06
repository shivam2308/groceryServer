<?php

class RequestHandlerHelper {

    function isSearchReq($req){
        if (strpos($req, '{') !== false) {
            return true;
        }else{
            return false;
        }

    }

}

?>