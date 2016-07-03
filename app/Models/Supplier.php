<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Supplier extends Model
{
    
	public $table = "tbl_supplier";
    

	public $fillable = [
	    "id",
		"Suppliername",
		"Image",
		"iOrder",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Suppliername" => "string",
		"Image" => "string",
		"iOrder" => "boolean",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
