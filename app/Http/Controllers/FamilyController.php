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

    public function edit($id) {
        $member = FamilyMember::findOrFail($id);
        return view('family_members.edit', compact('member'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:Laki-Laki,Perempuan',
            'address' => 'nullable|string|max:100',
        ]);
    
        $member = FamilyMember::findOrFail($id);
        $member->update([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'address' => $request->address,
            'parent_id' => $request->parent_id,
        ]);
    
        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id) {
        $member = FamilyMember::findOrFail($id);
        $member->delete();
    
        return redirect()->back()->with('success', 'Anggota keluarga berhasil dihapus!');
    }
}
