<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use Notifiable;

    protected $fillable = [
        'title', 'description', 'image', 'category_id'
    ];

    /**
     * Delete news image from storage
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function routeNotificationForSemaphore($notification)
    {
        return $this->mobile;
    }
}
