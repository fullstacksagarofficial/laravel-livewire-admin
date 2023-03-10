<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {

            return redirect('/admin/dashboard');
        } else {
            session()->flash('error', 'Access Denied');
            return view('admin.login');
        }
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {

        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {

                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                $request->session()->put('ADMIN_EMAIL', $result->email);
                return redirect('admin/dashboard');
            } else {
                session()->flash('error', 'Please Enter Valid Credentials');
                return redirect('admin');
            }
        } else {
            session()->flash('error', 'Email not Exist');
            return redirect('admin');
        }





        // $result = Admin::where(['email' => $email, 'password' => $password])->get();

        // if (isset($result['0']->id)) {
        //     $request->session()->put('ADMIN_LOGIN', true);
        //     $request->session()->put('ADMIN_ID', $result['0']->id);
        //     return redirect('/admin/dashboard');
        // } else {
        //     session()->flash('error', 'please enter valid login details');
        //     return redirect('/admin');
        // }
    }

    // public function updatepassword()
    // {
    //    $r=Admin::find(1);
    //     $r->password = Hash::make('admin@gmail.com');
    //    $r->save();
    // }
















    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}