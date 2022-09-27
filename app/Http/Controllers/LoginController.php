<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    // Start Registeration //
    public function register(){
        return view('back.registeration');
    }

    public function signup(RegisterRequest $request){

        // return $request;

        try{
            $user = Admin::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => $request->password,
            ]);

                return redirect()->route('taske.register')->with(['تم الحفظ بنجاح']);
            } catch (\Exception $ex){
                return redirect()->route('taske.register')->with(['حدث خطأ']);
            }

        }
    // End Registeration //

    // Start Edit //
        public function edit($id){

            try{
            $users = Admin::Selection()->find($id);
            if(!$users)
                return redirect()->route('taske.dash')->with('NO Record');

                return view('back.edit', compact('users'));
            } catch (\Exception $ex){
                return redirect()->route('taske.dash')->with('error');
            }
        }
    // End Edit //

    // Start Update //
        public function update($id, Request $request){

            try{
            $updated = Admin::Selection()->find($id);
            if(!$updated)
                return redirect()->route('taske.dash')->with('هذا الحقل غير موجود');

            DB::beginTransaction();

            $data = $request->except('_token', 'id', 'password');

            if($request->has('password') && !is_null($request->password)){
                $data['password'] = $request->password;
            }

            Admin::where('id', $id)
             ->update(
                $data
             );

             DB::commit();
                return redirect()->route('taske.dash')->with('تم التحديث بنجاح');
            } catch (\Exception $ex){
            DB::rollback();
                return redirect()->route('taske.dash')->with('حدث خطأ');
            }
        }
    // End Update //

    // Start Destroy //
        public function destroy($id){

            try{
            $dele = Admin::find($id);
            if(!$dele)
                return redirect()->route('taske.dash');

            $dele->delete();
            return redirect()->route('taske.dash')->with('Success Deleted');
            } catch (\Exception $ex){
                return redirect()->route('taske.dahs')->with('Error');
            }
        }
    // End Destroy //


    // Start Login //
    public function login(){
        return view('back.login');
    }
    // End Login //

    // Start Check //
    public function checked(Request $request)
    {
        // return $request;

        // $remember_me = $request->has('member') ? true : false;

        // return $request;
        // if(Auth()->guard('admins')->attempt($request->only('email', 'password'))){
        //     return redirect('/back/dashboard');
        // }
        //     return back()->with('Error');
        if(auth()->guard('admins')->attempt([
            'email' => $request->input("email"),
            'password' => $request->input("password")
        ])){
            return redirect()->route('taske.dash');
        }
        return redirect()->back()->with('err');
    }
    // End Check //

    // Start Dashboard //
    public function show()
    {
        $users = Admin::selection()->get();
        return view('back.dashboard', compact('users'));
    }
    // End Dashboard //

}
