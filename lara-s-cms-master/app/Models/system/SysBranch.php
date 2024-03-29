<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SysBranch extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sys_branches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'division_id', 'name', 'hr_branch_id', 'location', 'gmaps', 'phone', 'cbs_branch_code', 'parent_id', 'status', 'ordinal', 'created_at', 'updated_at', 'deleted_at'
    ];
}


