<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Task extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait, Auditable;

    public $table = 'tasks';

    protected $appends = [
        'attachment',
    ];

    protected $dates = [
        'due_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'team_id',
        'due_date',
        'end_date',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function tags()
    {
        return $this->belongsToMany(TaskTag::class);
    }

    public function getDueDateAttribute($value)
    {
<<<<<<< HEAD
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
<<<<<<< HEAD

        //return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
=======
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
>>>>>>> parent of 9634a6b... sprint1
=======
        //return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
>>>>>>> parent of 507f806... Indenture
    }

    public function setDueDateAttribute($value)
    {
<<<<<<< HEAD
<<<<<<< HEAD
      //  $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

=======
       // $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d H:i:s') : null;
>>>>>>> parent of 507f806... Indenture
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;

=======
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
>>>>>>> parent of 9634a6b... sprint1
    }

    public function getEndDateAttribute($value)
    {
<<<<<<< HEAD
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;

<<<<<<< HEAD
       // return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
=======
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
>>>>>>> parent of 9634a6b... sprint1
=======
//        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
>>>>>>> parent of 507f806... Indenture
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment')->last();
    }

<<<<<<< HEAD
    public function user_create()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
<<<<<<< HEAD

    public function indentures()
    {
        return $this->belongsToMany(Indenture::class);
    }

=======
>>>>>>> parent of 9634a6b... sprint1
=======
    
>>>>>>> parent of 507f806... Indenture
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
