<?php

namespace App\Interfaces;

Interface IServices {
    public function get($id);
    public function create($pb);
    public function update($id,$pb);
    public function search($pb);
 }

?>