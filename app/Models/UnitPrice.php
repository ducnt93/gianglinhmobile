<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UnitPrice extends Model
{
    
	public $table = "tbl_unitprice";
    

	public $fillable = [
	    "id",
		"UnitPriceName",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "boolean",
		"UnitPriceName" => "string",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
