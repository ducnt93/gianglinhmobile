<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class StatusLogin extends Model
{
    
	public $table = "tbl_statuslogin";
    

	public $fillable = [
	    "id",
		"ip",
		"email",
		"password",
		"logintime",
		"logouttime"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "string",
		"ip" => "string",
		"email" => "string",
		"password" => "string",
		"logintime" => "string",
		"logouttime" => "string"
    ];

	public static $rules = [
	    
	];

}
