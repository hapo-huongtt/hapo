<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMember;
use App\Http\Requests\UpdateMember;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
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
            $imagename = time() . '.' . $imageupload->getClientOriginalExtension();
            $imagepath = public_path('storage/images/');
            $imageupload->move($imagepath, $imagename);
            Member::create([
                'image' => 'storage/images/' .$imagename,
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
        $imageName = uniqid() . '.' . request()->image->getClientOriginalExtension();
        request()->image->storeAs('public/images', $imageName);
        $imageName = 'storage/images/' . $imageName;
        $member = [
            'image' => $imageName,
            'name' => $data['name'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];
        $member = Member::findOrFail($id)->update($member);
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
