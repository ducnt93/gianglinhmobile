<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class AccessoryType extends Model
{
    
	public $table = "tbl_accessory_type";
    

	public $fillable = [
	    "id",
		"Typename",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Typename" => "string",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
