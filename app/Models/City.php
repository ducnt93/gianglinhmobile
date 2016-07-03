<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class City extends Model
{
    
	public $table = "tbl_city";
    

	public $fillable = [
	    "id",
		"citycode",
		"cityname",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"citycode" => "string",
		"cityname" => "string",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
