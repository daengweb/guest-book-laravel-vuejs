<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = ['name', 'email', 'body', 'flagget_at'];

    public function scopeIgnoreFlagged($query)
    {
    	return $query->where('flagged_at', null);
    }

    public function getAvatarAttribute()
    {
    	return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5($this->email));
    }
    
    public function flag()
	{
	    return $this->update(['flagged_at' => \Carbon\Carbon::now()]);
	}
}
