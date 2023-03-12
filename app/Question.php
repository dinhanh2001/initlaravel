<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Question extends Model
{
    protected $table = 'tblquestions';
    
    protected $fillable = [
        'question_content','question_status', 'question_user_id'
    ];
    protected $primaryKey = 'question_id';

    public function getIdAttribute(){
        return $this->attributes['question_id'];
    }

    public function auth(){
    	return $this->belongsTo(User::class, 'question_user_id');
    }

    public function answer(){
    	return $this->hasMany(Answer::class, 'answer_question_id');
    }

    public function Owned(){
    	return $this->question_user_id == Auth::id();
    }
}
