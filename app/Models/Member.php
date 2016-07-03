<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Member extends Model
{
    
	public $table = "tbl_member";
    

	public $fillable = [
	    "id",
		"Email",
		"Username",
		"Password",
		"Sex",
		"Firstname",
		"Lastname",
		"Address1",
		"Address2",
		"Telephone",
		"Companyname",
		"IDCity",
		"Zipcode",
		"iSame",
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
		"Email" => "string",
		"Username" => "string",
		"Password" => "string",
		"Sex" => "integer",
		"Firstname" => "string",
		"Lastname" => "string",
		"Address1" => "string",
		"Address2" => "string",
		"Telephone" => "string",
		"Companyname" => "string",
		"IDCity" => "string",
		"Zipcode" => "string",
		"iSame" => "boolean",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
