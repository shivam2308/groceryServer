<?php

namespace App\Interfaces;

Interface IEnumProvider {
    public function getEnum($value);
    public function getValue($enum);
 }

?>