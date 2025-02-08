<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyTree extends Model
{
    use HasFactory;

    protected $table = 'family_tree';

    protected $fillable = ['tree_name', 'description'];

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

}
