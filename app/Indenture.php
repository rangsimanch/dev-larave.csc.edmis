<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indenture extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'indentures';

    public static $searchable = [
        'name',
        'code',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'code',
        'start_dk',
        'created_at',
        'updated_at',
        'deleted_at',
        'destination_dk',
    ];

    public function indentureFileManagers()
    {
        return $this->belongsToMany(FileManager::class);
    }

    public function indentureTasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function indentureUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function indentureRfas()
    {
        return $this->belongsToMany(Rfa::class);
    }
}
