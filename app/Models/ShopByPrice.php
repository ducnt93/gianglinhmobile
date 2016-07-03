<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ShopByPrice extends Model
{
    
	public $table = "tbl_shopbyprice";
    

	public $fillable = [
	    "id",
		"name",
		"fromprice",
		"toprice",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"name" => "string",
		"fromprice" => "float",
		"toprice" => "float",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
