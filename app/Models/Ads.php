<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Ads extends Model
{
    
	public $table = "tbl_ads";
    

	public $fillable = [
	    "id",
		"Adsname",
		"Image",
		"UrlAds",
		"TypeAds",
		"iOrder",
		"iStatus"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"Adsname" => "string",
		"Image" => "string",
		"UrlAds" => "string",
		"TypeAds" => "integer",
		"iOrder" => "integer",
		"iStatus" => "integer"
    ];

	public static $rules = [
	    
	];

}
