<?php

namespace App\BaseCache;


use App\BaseCode\JsonConvertor\JsonConvertor;
use App\BaseCode\Strings;

class BasicCache
{

    private $lifetime = 600;
    private $memcache;
    private $cache;
    private $pb_Instance;

    public function __construct($pbInstance)
    {
       // $this->memcache = new Memcache();
       // $this->cache = new MemcacheCache();
        $this->memcache->connect('localhost', 11211);
        $this->cache->setMemcache($this->memcache);
        $this->pb_Instance = $pbInstance;
    }

    public function putPb($pb)
    {
        $data = JsonConvertor::json($pb);
        $this->saveInMemCached($pb->getDbInfo()->getId(), $data);
    }

    public function getPb($id)
    {
        $result = $this->cache->fetch($id);
        if (Strings::isEmpty($result)) {
            return null;
        } else {
            return JsonConvertor::protobuff($this->cache->fetch($id), $this->pb_Instance);
        }
    }

    public function deletePb($id)
    {
        $this->cache->delete($id);
    }

    private function saveInMemCached($id, $data)
    {
        $this->cache->save($id, $data, $this->lifetime);
    }

}

?>
