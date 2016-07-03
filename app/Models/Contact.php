<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Contact extends Model
{
    
	public $table = "tbl_contact";
    

	public $fillable = [
	    "id",
		"Contactname",
		"Companyname",
		"Zipcode",
		"City",
		"Address",
		"Telephone",
		"Subject",
		"Email",
		"Content",
		"Createdate"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Contactname" => "string",
		"Companyname" => "string",
		"Zipcode" => "string",
		"City" => "string",
		"Address" => "string",
		"Telephone" => "string",
		"Subject" => "string",
		"Email" => "string",
		"Content" => "string"
    ];

	public static $rules = [
	    
	];

}
