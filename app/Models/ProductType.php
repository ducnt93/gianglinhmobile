<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ProductType extends Model
{
    
	public $table = "tbl_typeproduct";
    

	public $fillable = [
	    "id",
		"typeName",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "boolean",
		"typeName" => "string",
		"iStatus" => "boolean"
    ];

	public static $rules = [
	    
	];

}
