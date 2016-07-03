<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class OrderDetail extends Model
{
    
	public $table = "tbl_orderdetail";
    

	public $fillable = [
	    "id",
		"IDProduct",
		"Quantity",
		"Price"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "string",
		"Quantity" => "integer",
		"Price" => "float"
    ];

	public static $rules = [
	    
	];

}
