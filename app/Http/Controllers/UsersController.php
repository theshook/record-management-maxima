<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('director', ['only' => ['destroy', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('last_name', 'asc')->paginate(5);
        return view('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            "position" => $request->position,
            "last_name" => $request->last_name,
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "name_extension" => $request->name_extension,
            "street" => $request->street,
            "barangay" => $request->barangay,
            "municipality" => $request->municipality,
            "district" => $request->district,
            "province" => $request->province,
            "region" => $request->region,
            "zipcode" => $request->zipcode,
            "sex" => $request->sex,
            "civil_status" => $request->civil_status,
            "tel" => $request->tel,
            "mobile" => $request->mobile,
            "birthdate" => $request->birthdate,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "guardian" => $request->guardian,
            "occupation" => $request->occupation,
            "address" => $request->address
        ]);
        session()->flash('success', 'User successfully created.');
        $users = User::orderBy('last_name', 'asc')->paginate(5);
        return view('users.index')->withUsers($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (empty($request->password)) {
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }
        $user->update([
            "position" => $request->position,
            "last_name" => $request->last_name,
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "name_extension" => $request->name_extension,
            "street" => $request->street,
            "barangay" => $request->barangay,
            "municipality" => $request->municipality,
            "district" => $request->district,
            "province" => $request->province,
            "region" => $request->region,
            "zipcode" => $request->zipcode,
            "sex" => $request->sex,
            "civil_status" => $request->civil_status,
            "tel" => $request->tel,
            "mobile" => $request->mobile,
            "birthdate" => $request->birthdate,
            "email" => $request->email,
            "password" => $password,
            "guardian" => $request->guardian,
            "occupation" => $request->occupation,
            "address" => $request->address
        ]);

        session()->flash('success', 'User has been updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User has been removed successfully.');

        return redirect(route('users.index'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $users = User::where('last_name', 'LIKE', $q . '%')
                ->orWhere('email', 'LIKE', $q . '%')
                ->orderBy('last_name', 'desc')
                ->paginate(5)->setPath('');
            $pagination = $users->appends(array(
                'q' => $request->q
            ));
            if (count($users) > 0)
                return view('users.index')->withUsers($users)->withQuery($q);
        }
        $users = User::orderBy('last_name', 'asc')->paginate(5);
        return view('users.index')->withUsers($users);
    }
}
