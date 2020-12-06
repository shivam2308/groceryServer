<?php


namespace App\TimePbModule;


use App\Interfaces\ISearcher;

class TimeSeacher implements ISearcher
{

    public function search($pb)
    {
        $pbArray = array();

        if ($pb->getStartMilliseconds() > 0 && $pb->getEndMilliseconds() > 0) {
            $pbArray[TimeIndexers::getSTART_MILLIS()] = $pb->getStartMilliseconds();
            $pbArray[TimeIndexers::getEND_MILLIS()] = $pb->getEndMilliseconds();
        }
        return $pbArray;
    }
}
