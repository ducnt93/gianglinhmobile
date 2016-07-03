<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class SimCard extends Model
{
    
	public $table = "tbl_simso";
    

	public $fillable = [
	    "id",
		"Numphone",
		"price",
		"Account",
		"IDsupplier",
		"idUnitPrice",
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
		"Numphone" => "string",
		"price" => "string",
		"Account" => "string",
		"IDsupplier" => "boolean",
		"idUnitPrice" => "boolean",
		"iOrder" => "boolean",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
