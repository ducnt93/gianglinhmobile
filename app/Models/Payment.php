<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Payment extends Model
{
    
	public $table = "tbl_payment";
    

	public $fillable = [
	    "id",
		"PaymentName",
		"AccountID",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "boolean",
		"PaymentName" => "string",
		"AccountID" => "string",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
