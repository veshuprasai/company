<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['company'];

    public function files()
    {
    	return $this->hasMany(File::class);
    }
}
