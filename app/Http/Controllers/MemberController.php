<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMember;
use App\Http\Requests\UpdateMember;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->get('search');
        $members = Member::paginate(2);
        if ($search) {
            $members = Member::where('name', 'like', '%' . $search . '%')->paginate(2);
        }
        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMember $request)
    {
        if (request()->hasFile('image')) {
            $imageupload = request()->file('image');
            $imagepath = config('file.members.file_path');
            $image = Storage::put($imagepath, $imageupload);
            $image = str_replace('public', 'storage', $image);
            Member::create([
                'image' => $image,
                'name' => $request['name'],
                'email' => $request['email'],
                'age' => $request['age'],
                'gender' => $request['gender'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'role' => $request['role'],
                'password' => Hash::make($request['password']),
            ]);
        }
        return redirect()->route('members.index')->with('success', __('messages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', ['members' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateMember  $request, $id)
    {
        $data = $request->all();
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        if ($request->has('image')) {
            $storageFile = Storage::put('public/images/', $request->image);
            $data['image'] = basename($storageFile);
            Storage::delete('public/images/' . auth()->user()->image);
        }
        $data = Member::findOrFail($id)->update($data);
        return redirect()->route('members.index')->with('success', ('messages.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', __('messages.destroy'));
    }
}
