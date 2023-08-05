<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{
    //

    public function __construct(){

        $this->middleware('auth');
      //  $this->middleware('admin');

    }

    public function index(){

        $param = "param";
        $brand = DB::table('carbrand')->orderBy('cb_id', 'asc')->get();
        $model = DB::table('carmodel')->orderBy('cm_id', 'asc')->get();
        $car = DB::table('cars')
                ->select('cars.*', 'carbrand.*', 'carmodel.*')
                ->leftJoin("carbrand", "cars.brand", "=", "carbrand.cb_id")
                ->leftJoin("carmodel", "cars.model", "=", "carmodel.cm_id")
                ->paginate(10);
        return view('car',  ['car' => $car,'p' => $car,'model' =>$model, 'brand' =>$brand]);

    }



    public function addnew(){

        $param = "param";

        $car = DB::table('cars')->orderBy('c_id', 'asc')->get();
        $brand = DB::table('carbrand')->orderBy('cb_id', 'asc')->get();
        $model = DB::table('carmodel')->orderBy('cm_id', 'asc')->get();

        return view('addcar',  ['car' => $car,'brand' => $brand, 'model' => $model]);
   

    }

    public function storenew(Request $request){


        $roles = [
            'carid' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric'
        ];

       
        $validator = Validator::make($request->all(), $roles);

    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('eror', true)
                ->withInput();
        }

            
            DB::table('cars')->insert([
                'car_id' => $request->carid, 
                'brand' => $request->brand,
                'model' => $request->model, 
                'price' => $request->price,              
            ]);

            return redirect()->route('cars')->with(['success' => 'Simpan data berhasil']);
    }


 

       public function edit($id)
       {
    
        $car = DB::table('cars')->where('c_id', $id)->first();
        $brand = DB::table('carbrand')->orderBy('cb_id', 'asc')->get();
        $model = DB::table('carmodel')->orderBy('cm_id', 'asc')->get();

        return view('editcar',  ['car' => $car,'brand' => $brand,'model' => $model]);

       }


       public function storeedit(Request $request){

        $roles = [
            'carid' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric'
        ];

       
        $validator = Validator::make($request->all(), $roles);

    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('eror', true)
                ->withInput();
        }
            
            DB::table('cars')->where('c_id',$request->c_id)->update([
                'car_id' => $request->carid, 
                'brand' => $request->brand,
                'model' => $request->model, 
                'price' => $request->price,               
            ]);

            return redirect()->route('cars')->with(['success' => 'Ubah data berhasil']);
    }

    public function search(Request $request)
    {

            $typeofsearch = $request->input('search_option');
            $modelinput = $request->input('model');
            $brandinput = $request->input('brand');
            $readystatus = $request->input('ready_status');
            
            $brand = DB::table('carbrand')->orderBy('cb_id', 'asc')->get();
            $model = DB::table('carmodel')->orderBy('cm_id', 'asc')->get();

            $query = DB::table('cars')
                ->select('cars.*', 'carbrand.*', 'carmodel.*')
                ->leftJoin("carbrand", "cars.brand", "=", "carbrand.cb_id")
                ->leftJoin("carmodel", "cars.model", "=", "carmodel.cm_id");

            if ($modelinput && $brandinput && $readystatus) {
                $query->where('cars.model', '=', $modelinput)
                    ->where('cars.brand', '=', $brandinput)
                    ->where('cars.ready_status', '=', $readystatus);
            } elseif ($modelinput && $brandinput) {
                $query->where('cars.model', '=', $modelinput)
                    ->where('cars.brand', '=', $brandinput);
            } elseif ($modelinput && $readystatus) {
                $query->where('cars.model', '=', $modelinput)
                    ->where('cars.ready_status', '=', $readystatus);
            } elseif ($brandinput && $readystatus) {
                $query->where('cars.brand', '=', $brandinput)
                    ->where('cars.ready_status', '=', $readystatus);
            } elseif ($modelinput) {
                $query->where('cars.model', '=', $modelinput);
            } elseif ($brandinput) {
                $query->where('cars.brand', '=', $brandinput);
            } elseif ($readystatus) {
                $query->where('cars.ready_status', '=', $readystatus);
            }

            $car = $query->paginate(10);

            return view('car', ['car' => $car, 'p' => $car, 'brand' => $brand, 'model' => $model]);


    }

}
