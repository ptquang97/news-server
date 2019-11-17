<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 05-11-2019
 * Time: 00:01
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * @var string table name
     */
    protected $table = 'news';
    protected $casts = [
        'tags_id' => 'array'
    ];
    /**
     * @var array collumn of table
     */
    public $fillable = ['id', 'title', 'short_intro', 'content', 'user_id', 'category_id', 'tags_id', 'image'];

}
