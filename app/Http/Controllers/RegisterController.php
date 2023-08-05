<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class RegisterController extends Controller
{
    //

    public function index()
    {

        // die('test');

        // $company = DB::table('companies')->orderBy('co_id', 'asc')->get();
        // $branch = DB::table('branches')->orderBy('b_id', 'asc')->get();
        // $div = DB::table('division')->orderBy('d_id', 'asc')->get();

        // return view('register',  [
        //     'div' => $div, 'company' => $company,
        //     'branch' => $branch
        // ]);
        return view('register');
    }


    public function storenew(Request $request)
    {


        // die('');

        $roles = [
            'name' => 'required',
            'address' => 'required',
            'contactno' => 'required',
            'lisenseno' => 'required',
            'username' => 'required',
            'password' => 'require'
        ];


        $validator = Validator::make($request->all(), $roles);


        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->with('eror', true)
        //         ->withInput();
        // }

        if ($request->password != $request->retypepassword) {
            return redirect()->back()->with(['warning' => 'Password that you write is Not Equal'])->withInput();
        }

        $len = strlen($request->password);

        if ($len < 6) {

            return redirect()->back()->with(['warning' => 'Password Is Too Short!! '])->withInput();
        }

        $emails = DB::table('users')

            ->select("id")

            ->where('users.username', $request->username)

            ->count();

        if ($emails > 0) {

            return redirect()->back()->with(['warning' => 'That username Has been registered,use another username'])->withInput();
        }


        DB::table('users')->insert([
            'name' => $request->name,
            'role' => 'user',
            'contactno' => $request->contactno,
            'licence' => $request->licence,
            'address' => $request->address,
            'user_status' => '1',
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register')->with(['success' => 'Register was succesfully, Plese login']);
    }


    public function forgetpassword()
    {

        return view('forgetpassword');
    }

    public function sendemail(Request $request)
    {

        //  echo $request->email; die();


        $randomstring = $this->generateRandomString(50);

        $this->sendemailsend($request->email, $randomstring);
        //$table = DB:table('users')->()
        DB::table('users')->where('email', $request->email)->update([
            'remember_token' => $randomstring,
            'is_change' => '0'
        ],);

        echo "Silahkan periksa kotak masuk email anda";
    }


    public function sendemailsend($email, $url)
    {

        $details = [
            'title' => 'Pemberitahuan approval mobil',
            'url' => $url
        ];

        Mail::to($email)->send(new \App\Mail\Forgetpassword($details));

        //  Mail::to($email)->send(new \App\Mail\Approvalmail($details));
    }


    public function feedbacksendmail($url)
    {


        $count = DB::table('users')->where('remember_token', '=', $url)->where('is_change', '=', '0')->count();

        if ($count != 0) {

            return view('changepwd', ['url' => $url]);
        } else {

            die('link sudah kadalwarsa!!');
        }
    }

    public function actionchangepassword(Request $request)
    {

        //echo  $request->url; die();

        //  $request->password;
        if ($request->password != $request->retypepassword) {
            return redirect()->back()->with(['warning' => 'Password that you write is Not Equal'])->withInput();
        }

        $len = strlen($request->password);

        if ($len < 6) {

            return redirect()->back()->with(['warning' => 'Password Is Too Short!! '])->withInput();
        }

        DB::table('users')->where('remember_token', $request->url)->update(
            [
                'password' => Hash::make($request->password),
                'is_change' => '1'
            ]
        );


        return redirect('')
            ->with(['success' => ' Change Password successfully, Please Re-login with your new password'])
            ->withInput();

        // DB:table('users')->where('url','=',$request->url)

        //'password' => Hash::make($request->password),  


    }

    function generateRandomString($length = 50)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
