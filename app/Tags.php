<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 04-11-2019
 * Time: 22:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    /**
     * @var string table name
     */
    protected $table = 'tags';
    /**
     * @var array collumn of table
     */
    public $fillable = ['id', 'tag_name'];
}
