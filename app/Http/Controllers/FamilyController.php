<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'tree_id' => 'required',
            'name' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:Laki-Laki,Perempuan',
            'address' => 'string|max:60',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        FamilyMember::create([
            'tree_id' => $request->tree_id,
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'address' => $request->address,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
