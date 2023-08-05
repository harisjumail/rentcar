<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsermanagementController extends Controller
{
    //

        public function __construct(){

        $this->middleware('auth');
      //  $this->middleware('admin');

        }

        public function index(){

                $usr = DB::table('users')
                
                ->leftjoin("branches", "users.branch", "=", "branches.b_id")

                ->leftjoin("companies", "users.company", "=", "companies.co_id")
                
                ->orderBy('users.id', 'DESC')->paginate(20);

                 $app1 = DB::table('users')

                ->leftjoin("branches", "users.branch", "=", "branches.b_id")

                ->leftjoin("companies", "users.company", "=", "companies.co_id")
                
                ->where("role","=","manager")->get();

                $app2 = DB::table('users')

                ->leftjoin("branches", "users.branch", "=", "branches.b_id")

                ->leftjoin("companies", "users.company", "=", "companies.co_id")

                ->where("role","=","ga")->get();

                return view('usr',  ['usr' => $usr,'p' => $usr,'app1' => $app1,'app2' => $app2]);

            }


            public function bulk(Request $request){

                    $checklist = $request->pick ;

                   // $app1 = $request->okok ;

                  

                    if($checklist != "" or !empty($checklist)){


                        foreach($checklist as $key =>$value)

                            {       

                                if($request->bulkbutton == "approve"){

                                    DB::table('users')->where('id',$value)->update([
                                        'user_status' => "1"             
                                    ]);  

                                    $msg = "Aktifkan user berhasil";

                                }

                                elseif($request->bulkbutton == "cancel"){

                                    DB::table('users')->where('id',$value)->update([
                                        'user_status' => "0"             
                                    ]);

                                    $msg = "Nonaktifkan user berhasil";

                                }

                                elseif($request->bulkbutton == "delete"){

                                    DB::table('users')->where('id',$value)->delete();

                                    $msg = "Hapus user berhasil";

                                }
                            

                            }
                        
                            return back()->with(['success' => $msg ]);
            
                        }

                    else{

                        return back()->with(['error' => 'Pick One or more Please.']);
                    }

                }        
                
                
                public function search(Request $request)
                {

                    $search =  $request->input('cari');

                    $usr = DB::table('users')
                    
                    ->leftjoin("branches", "users.branch", "=", "branches.b_id")

                    ->leftjoin("companies", "users.company", "=", "companies.co_id")

                    ->where("name","like","%".$search."%")
                    
                    ->orderBy('users.id', 'DESC')->paginate(20);

                $app1 = DB::table('users')

                ->leftjoin("branches", "users.branch", "=", "branches.b_id")

                ->leftjoin("companies", "users.company", "=", "companies.co_id")
                
                ->where("role","=","manager")->get();

                $app2 = DB::table('users')

                ->leftjoin("branches", "users.branch", "=", "branches.b_id")

                ->leftjoin("companies", "users.company", "=", "companies.co_id")

                ->where("role","=","ga")->get();

                    return view('usr',  ['usr' => $usr,'p' => $usr,'app1' => $app1,'app2' => $app2]);


                }

            public function approval1(Request $request){


                        DB::table('users')->where('id',$request->id)->update([
                                        'approval1' => $request->val             
                                    ]);  


                }


            public function approval2(Request $request){


                        DB::table('users')->where('id',$request->id)->update([
                                        'approval2' => $request->val             
                                    ]);  


                }                


}
