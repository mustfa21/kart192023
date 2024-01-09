<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;
use Toastr;
use Yoeunes\Toastr\Toastr as ToastrToastr;

class UserController extends Controller
{
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('dashboard.module_user', 1);
        $this->route = 'admin.user';
        $this->view = 'admin.user';
        $this->path = 'user';
    }

    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['rows'] = User::orderBy('id', 'desc')->get();

        return view($this->view.'.index', $data);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',

        ]);


         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'password' => Hash::make($request->password),
        ]);


        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));

        return redirect()->back();

    }
    public function destroy(User $user)
    {
        // Delete Data
        $user->delete();

        Toastr::success(__('dashboard.deleted_successfully'), __('dashboard.success'));

        return redirect()->back();
    }
}
