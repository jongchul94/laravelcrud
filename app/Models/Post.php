<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'posts';
    protected $fillable = ['title', 'content'];

    public function images(){
        return $this->hasMany(PostImage::class, 'post_id');
    }

    public function routeNotificationForSlack(): string
    {
        return config('services.slack.notifications.slack_webhook_url');
    }
}
