<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Category extends Model
{
    
	public $table = "tbl_category";
    

	public $fillable = [
	    "id",
		"Categoryname",
		"Parent_id",
		"Image",
		"Content",
		"iOrder",
		"Createdate",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Categoryname" => "string",
		"Parent_id" => "boolean",
		"Image" => "string",
		"Content" => "string",
		"iOrder" => "integer",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
