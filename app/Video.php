<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $appends = [ 'date_formatted' ];
    protected $hidden = ['created_at', 'updated_at', 'id'];

    public static function boot()
    {
        parent::boot();

        self::deleted(function(Video $video) {
            \File::delete(public_path('/videos/' . $video->slug . '.jpg'));
        });
    }

    public function getTitleAttribute ()
    {
        if (config()->get('locale') === 'pl') {
            return $this->title_pl;
        } else {
            return $this->title_en;
        }
    }

    public function getDescriptionAttribute ()
    {
        if (config()->get('locale') === 'pl') {
            return $this->description_pl;
        } else {
            return $this->description_en;
        }
    }

    public function getPhotoAttribute ()
    {
        return asset('videos/' . $this->slug . '.jpg');
    }

    public function getDateFormattedAttribute ()
    {
        return date('Y-m-d, H:m', strtotime($this->created_at));
    }
}
