<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'status',
        'samples',
        'pricel',
        'importance',
        'contact',
        'company',
        'town',
        'area',
        'tel',
        'mobile',
        'email',
        'web',
        'brands',
        'comments',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ClientStatus::class, 'status_id');
    }
}
