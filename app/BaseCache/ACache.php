<?php


namespace App\BaseCache;


class ACache extends BasicCache
{
    private $m_service;
    private $m_pb;

    public function __construct($service, $pb)
    {
        parent::__construct($pb);
        $this->m_service = $service;
        $this->m_pb = $pb;
    }

    public function getUnchecked($id)
    {
        $cacheResp = parent::getPb($id);
        if ($cacheResp == null) {
            $pbResp = $this->m_service->get($id);
            parent::putPb($pbResp);
            return $pbResp;
        } else {
            return $cacheResp;
        }
    }

}
