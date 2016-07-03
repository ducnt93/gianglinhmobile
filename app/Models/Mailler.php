<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Mailler extends Model
{
    
	public $table = "tbl_mailler";
    

	public $fillable = [
	    "id",
		"MailName"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "boolean",
		"MailName" => "string"
    ];

	public static $rules = [
	    
	];

}
