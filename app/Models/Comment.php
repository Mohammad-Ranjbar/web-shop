<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property int product_id
 * @property string content
 */
class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
