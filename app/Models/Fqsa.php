<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Fqsa extends Model
{
    
	public $table = "tbl_fqas";
    

	public $fillable = [
	    "IDfqa",
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
        "IDfqa" => "integer",
		"Fullname" => "string",
		"Title" => "string",
		"Content" => "string"
    ];

	public static $rules = [
	    
	];

}
