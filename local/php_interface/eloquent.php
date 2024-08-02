<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class User extends Model {
    protected $table = 'b_user';
}

class IBlock extends Model {
    
    protected $table = 'b_iblock';
    
    public function elements()
    {
        return $this->hasMany(ElementIBlock::class, 'IBLOCK_ID', 'ID');
    }

    public function scopeFilterByCode(Builder $query, $codes)
    {
        if (is_array($codes)) {
            return $query->whereIn('CODE', $codes);
        }

        return $query->where('CODE', $codes);
    }
    
}

class ElementIBlock extends Model {
    
    protected $table = 'b_iblock_element';

    public function iblock()
    {
        return $this->belongsTo(IBlock::class,  'IBLOCK_ID', "ID" );
    }

    public function createdBy()
    {
        return $this->hasOne(User::class,  "ID", 'CREATED_BY',  );
    }

}

class UserGroup extends Model {
    protected $table = 'b_user_group';
}
