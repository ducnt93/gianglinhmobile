<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class News extends Model
{
    
	public $table = "tbl_news";
    

	public $fillable = [
	    "id",
		"Title",
		"Image",
		"Summary",
		"datepost",
		"Content",
		"Type",
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
		"Title" => "string",
		"Image" => "string",
		"Summary" => "string",
		"Content" => "string",
		"Type" => "integer",
		"iOrder" => "boolean",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
