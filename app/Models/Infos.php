<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Infos extends Model
{
    
	public $table = "tbl_infos";
    

	public $fillable = [
	    "id",
		"content",
		"iStatus",
		"idtype"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"content" => "string",
		"iStatus" => "integer",
		"idtype" => "integer"
    ];

	public static $rules = [
	    
	];

}
