<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Comment extends Model
{
    protected $table = 'tblcomments';
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'comment_content','comment_customer_id', 'comment_recipes_id'
    ];
    public function getIdAttribute(){
        return $this->attributes['customer_id'];
    }
    public function author(){
        return $this->belongsTo(Customer::class, 'comment_customer_id');
    }

    public function recipes(){
        return $this->belongsTo(Recipe::class, 'comment_recipes_id');
    }

    public function isMine(){
        if(!Auth::guard('customer')->check()){
            return false;
        }
    	$user = Auth::guard('customer')->user();
    	if($user->id == $this->comment_customer_id){
    		return true;
    	}
    	return false;
    }
}
