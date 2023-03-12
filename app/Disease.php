<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'tbldiseases';
    protected $primaryKey = 'disease_id';

    public function getIdAttribute(){
        return $this->attributes['disease_id'];
    }
}
