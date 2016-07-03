<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Setting extends Model
{
    
	public $table = "tbl_setting";
    

	public $fillable = [
	    "id",
		"Titlepage",
		"domainname",
		"Slogan",
		"Footerpage",
		"AddFooter",
		"FileTypes",
		"Filesize",
		"Maxlargeimage",
		"SMTPAuth",
		"SMTPHost",
		"SMTPUser",
		"SMTPPass",
		"Keyword",
		"Description",
		"EmailContact",
		"EmailSale",
		"Maxproduct",
		"Shutdown",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Titlepage" => "string",
		"domainname" => "string",
		"Slogan" => "string",
		"Footerpage" => "string",
		"AddFooter" => "string",
		"FileTypes" => "string",
		"Filesize" => "integer",
		"Maxlargeimage" => "integer",
		"SMTPAuth" => "integer",
		"SMTPHost" => "string",
		"SMTPUser" => "string",
		"SMTPPass" => "string",
		"Keyword" => "string",
		"Description" => "string",
		"EmailContact" => "string",
		"EmailSale" => "string",
		"Maxproduct" => "integer",
		"Shutdown" => "string",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
