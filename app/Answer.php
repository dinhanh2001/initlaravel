<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'tblanswers';

    protected $primaryKey = 'answer_id';
	public function isTrue(){
		return 1;
	}
    public function getIdAttribute(){
        return $this->attributes['answer_id'];
    }
}
