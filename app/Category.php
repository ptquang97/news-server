<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 04-11-2019
 * Time: 23:15
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var string table name
     */
    protected $table = 'category';
    /**
     * @var array collumn of table
     */
    public $fillable = ['id', 'category_name'];
}
