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
    protected $table = 'comment';
    /**
     * @var array collumn of table
     */
    public $fillable = ['id', 'title', 'short_intro', 'content', 'related_articles', 'user_id', 'category_id', 'tags_id', 'image'];

}
