<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class InfoType extends Model
{
    
	public $table = "tbl_typeinfos";
    

	public $fillable = [
	    "id",
		"iStatus",
		"typename"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"iStatus" => "integer",
		"typename" => "string"
    ];

	public static $rules = [
	    
	];

}
