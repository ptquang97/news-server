<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 04-11-2019
 * Time: 23:51
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var string table name
     */
    protected $table = 'comment';
    /**
     * @var array collumn of table
     */
    public $fillable = ['id', 'comment', 'user_id', 'news_id'];
}
