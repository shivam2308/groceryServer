<?php

namespace App\ItemPbModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class ItemRequestHandler extends RequestHandler{

    public function __construct(){
        parent::__construct(new ItemService(),new ItemPbDefaultProvider(),new ItemSearchRequestPbDefaultProvider());
    }
}

?>