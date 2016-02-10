<?php

namespace App\Http\Controllers;

use App\User;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RegistrationFormRequest;
use App\Role;
use App\Permission;


class AuthenticationController extends Controller
{
    //
    public function getRegister(){
        return view('auth.register');
    }

    public function postRegisterUser(RegistrationFormRequest $request){

        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $role = Input::get('role');


   /*     User::create([
            'email' => $name,
            'name' => $email,
            'password' => bcrypt($password),
        ]);*/


/*        $user = User::where('name', '=', $name)->first();
// role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id
// or eloquent's original technique
        $user->roles()->attach($admin->id); // id only*/

        $rolen = Role::where('name', '=', 'mod')->first();
        return dd($rolen);

    }

    public function setFirstUserRolePermission(){

        try{
            User::create([
                'email' => 'admin@admin.com',
                'name' => 'admin',
                'password' => bcrypt('123456'),
            ]);

            $admin = new Role();
            $admin->name         = 'admin';
            $admin->display_name = 'User Administrator'; // optional
            $admin->description  = 'User is allowed to manage and edit other users'; // optional
            $admin->save();

            $mod = new Role();
            $mod->name         = 'mod';
            $mod->display_name = 'Moderator'; // optional
            $mod->description  = 'User is allowed to manage other users, except User Administrator profiles'; // optional
            $mod->save();


            $visitor = new Role();
            $visitor->name         = 'visitor';
            $visitor->display_name = 'Visitor'; // optional
            $visitor->description  = 'User is not allowed to manage anything'; // optional
            $visitor->save();

            $user = User::where('name', '=', 'admin')->first();
            //$admin  = Role::where ('name', '=', 'admin')->first();

            $user->attachRole($admin); // parameter can be an Role object, array, or id

            //dd($admin->id);
            //$user->roles()->attach($admin->id); // id only

            $editUser = new Permission();
            $editUser->name         = 'edit-user';
            $editUser->display_name = 'Edit Users'; // optional
            $editUser->description  = 'edit existing users'; // optional
            $editUser->save();

            $admin  = Role::where ('name', '=', 'admin')->first();
            $admin->attachPermission($editUser);

            return redirect('/')->withMessage('First user installed correctly!');
        } catch (\Exception $e) {
                return redirect('/')->withError('Sorry something went worng. Contact administrator!');
        }

    }
}
