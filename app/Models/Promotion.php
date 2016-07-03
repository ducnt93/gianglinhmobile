<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Promotion extends Model
{
    
	public $table = "tbl_promotion";
    

	public $fillable = [
	    "id",
		"Proname",
		"Image",
		"Price",
		"idUnitPrice",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Proname" => "string",
		"Image" => "string",
		"Price" => "float",
		"idUnitPrice" => "boolean",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
