<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Order extends Model
{
    
	public $table = "tbl_order";
    

	public $fillable = [
	    "id",
		"Sex",
		"firstname",
		"Companyname",
		"Address1",
		"phone",
		"City",
		"Zipcode",
		"Email",
		"Receiptaddress",
		"Receiptname",
		"Receiptemail",
		"Receiptphone",
		"Receiptcity",
		"Datedelivery",
		"Payment",
		"Total",
		"Content",
		"Orderdate",
		"Orderstatus",
		"iStatus",
		"lastname",
		"address2",
		"typecustomer"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "string",
		"Sex" => "integer",
		"firstname" => "string",
		"Companyname" => "string",
		"Address1" => "string",
		"phone" => "string",
		"City" => "string",
		"Zipcode" => "string",
		"Email" => "string",
		"Receiptaddress" => "string",
		"Receiptname" => "string",
		"Receiptemail" => "string",
		"Receiptphone" => "string",
		"Receiptcity" => "string",
		"Payment" => "string",
		"Total" => "float",
		"Content" => "string",
		"Orderstatus" => "integer",
		"iStatus" => "integer",
		"lastname" => "string",
		"address2" => "string",
		"typecustomer" => "integer"
    ];

	public static $rules = [
	    
	];

}
