<?php namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model as Model;

class Accessory extends Model
{
    use Sluggable;

    public $table = "tbl_accessory";

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'Accessoryname'
            ]
        ];
    }

    public $fillable = [
        "id",
        "Accessoryname",
        "Image",
        "Price",
        "idUnitPrice",
        "IDtypeaccessory",
        "Content",
        "iStatus",
        "iOrder"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "Accessoryname" => "string",
        "Image" => "string",
        "Price" => "string",
        "idUnitPrice" => "boolean",
        "IDtypeaccessory" => "boolean",
        "Content" => "string",
        "iStatus" => "integer",
        "iOrder" => "integer"
    ];

    public static $rules = [

    ];

}
