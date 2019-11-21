<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Rfa extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'rfas';

    protected $appends = [
        'file_upload_1',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'submit_date',
        'receive_date',
    ];

    protected $fillable = [
        'title',
        'note_2',
        'note_1',
        'note_3',
        'type_id',
        'rfa_code',
        'assign_id',
        'updated_at',
        'created_at',
        'deleted_at',
        'issueby_id',
        'submit_date',
        'receive_date',
        'action_by_id',
        'create_by_id',
        'for_status_id',
        'comment_by_id',
        'document_number',
        'information_by_id',
        'comment_status_id',
        'document_status_id',
    ];

    public static function boot()
    {
        parent::boot();

        Rfa::observe(new \App\Observers\RfaActionObserver);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function type()
    {
        return $this->belongsTo(Rfatype::class, 'type_id');
    }

    public function getSubmitDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSubmitDateAttribute($value)
    {
        $this->attributes['submit_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function issueby()
    {
        return $this->belongsTo(User::class, 'issueby_id');
    }

    public function assign()
    {
        return $this->belongsTo(User::class, 'assign_id');
    }

    public function getFileUpload1Attribute()
    {
        return $this->getMedia('file_upload_1');
    }

    public function create_by()
    {
        return $this->belongsTo(User::class, 'create_by_id');
    }

    public function action_by()
    {
        return $this->belongsTo(User::class, 'action_by_id');
    }

    public function comment_by()
    {
        return $this->belongsTo(User::class, 'comment_by_id');
    }

    public function information_by()
    {
        return $this->belongsTo(User::class, 'information_by_id');
    }

    public function getReceiveDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReceiveDateAttribute($value)
    {
        $this->attributes['receive_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function comment_status()
    {
        return $this->belongsTo(RfaCommentStatus::class, 'comment_status_id');
    }

    public function for_status()
    {
        return $this->belongsTo(RfaCommentStatus::class, 'for_status_id');
    }

    public function document_status()
    {
        return $this->belongsTo(RfaDocumentStatus::class, 'document_status_id');
    }
}
