<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class FQAs extends Model
{
    
	public $table = "tbl_fqas";
    

	public $fillable = [
	    "id",
		"Fullname",
		"Title",
		"Content"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Fullname" => "string",
		"Title" => "string",
		"Content" => "string"
    ];

	public static $rules = [
	    
	];

}
