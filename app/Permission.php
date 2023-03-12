<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'tblpermissions';
    protected $primaryKey = 'permission_id';

    public function getIdAttribute(){
        return $this->attributes['permission_id'];
    }
}
