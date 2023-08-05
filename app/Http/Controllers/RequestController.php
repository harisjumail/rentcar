<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;


class RequestController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth');



    }

    
    public function index()
    {

        $car = DB::table('cars')->orderBy('c_id', 'asc')->get();
        return view('request',[ 'datetimes' => "",'car' => $car]);
    }

    public function message()
    {

        $output =  DB::table('t_req')

            ->leftjoin('drivers', 't_req.driver_id', '=', 'drivers.d_id')

            ->where('user_id',  Auth::user()->id)

            ->orderBy('id', 'desc')

            ->take(4)

            ->get();

        return $output;
    }


    public function caravaliablity(Request $request){

        $datetimes = $request->input('datetimes');
        $string = explode('-', $request->datetimes);
        $originalDate = str_replace('/', '-', $string[0]);
        $newDate = date("Y-m-d H:i", strtotime($originalDate));
        $datestart = str_replace('/', '-', $newDate);

        $string = explode('-', $request->datetimes);
        $originalDate = str_replace('/', '-', $string[1]);
        $newDate = date("Y-m-d H:i", strtotime($originalDate));
        $dateend = str_replace('/', '-', $newDate);

        $car = DB::select("SELECT * FROM cars 
                   WHERE (last_enddate  <= '".$datestart."' AND ready_status = 'no')
                   OR (ready_status = 'yes')");   
        return response()->json($car);

    }
    public function returncar(){

        $requestt = DB::table('request')

                    ->select('cars.car_id AS name', 'request.*')

                    ->leftJoin("cars", "request.car_id", "=", "cars.c_id")

                    ->orderBy('request.id', 'desc')

                    //  ->groupBy('t_req.req_id')

                    ->where('request.user_id', Auth::user()->id)

                    ->get();     


        return view('return',  ['requestt' => $requestt , 'datetimes' => '']);

    }

    public function ceckpayment(Request $request){

    $payment = DB::table('request')

                    ->select('cars.*', 'request.*')

                    ->leftJoin("cars", "request.car_id", "=", "cars.c_id")

                    ->orderBy('request.id', 'desc')

                    ->where('request.user_id', Auth::user()->id)

                    ->where('request.status','=','1')

                    ->where('cars.car_id','=',$request->carid)

                    ->first();  
                    
            $price =  $payment->price;
            $startdate = $payment->start_date;


        if ($startdate) {
            $tableDate = strtotime($startdate);
            $currentDate = time();
            $oneDayInSeconds = 60 * 60 * 24;
            $differenceInSeconds = abs($currentDate - $tableDate);
            $differenceInDays = floor($differenceInSeconds / $oneDayInSeconds)+1;    
                    
        }
        $totalpayment = $price * $differenceInDays;

        return response()->json(['total' => $totalpayment,'carid' => $request->carid,'transid' => $payment->id]);
    }

    public function processpayment(Request $request){

         DB::table('cars')->where('car_id',$request->carid)->update([
                'ready_status' => 'yes',
            ]);
        DB::table('request')->where('id',$request->transid)->update([
                'status' => '2',
            ]);  
            

    }

    public function addnew()
    {

        $param = "param";

        $car = DB::table('cars')->orderBy('c_id', 'asc')->get();
        $company = DB::table('companies')->orderBy('co_id', 'asc')->get();
        $branch = DB::table('branches')->orderBy('b_id', 'asc')->get();
        $drivers = DB::table('drivers')->orderBy('d_id', 'asc')->get();

        return view('addcar',  [
            'car' => $car, 'company' => $company,
            'branch' => $branch, 'param' => $param, 'drivers' => $drivers
        ]);
    }


    public function main(Request $request)
    {
             
            $string = explode('-', $request->datetimes);
            $originalDate = str_replace('/', '-', $string[0]);
            $newDate = date("Y-m-d H:i", strtotime($originalDate));
            $datestart = str_replace('/', '-', $newDate);

            $string = explode('-', $request->datetimes);
            $originalDate = str_replace('/', '-', $string[1]);
            $newDate = date("Y-m-d H:i", strtotime($originalDate));
            $dateend = str_replace('/', '-', $newDate);

            DB::table('request')->insert([
                'start_date' => $datestart,
                'end_date' => $dateend,
                'user_id' => Auth::user()->id,
                'car_id'=> $request->caravbl,
                'status' =>'1'
            ]);

            DB::table('cars')->where('c_id',$request->caravbl)->update([
                'ready_status' => 'no',
                'last_startdate' => $datestart,
                'last_enddate' => $dateend 
            ]);

            return redirect()->route('carrequest')->with(['success' => 'Request Success']);       
    }


    public function history(){

  


   $requestt = DB::table('request')

            ->select('cars.car_id AS name', 'request.*')

            ->leftJoin("cars", "request.car_id", "=", "cars.c_id")

            ->orderBy('request.id', 'desc')

            //  ->groupBy('t_req.req_id')

            ->where('request.user_id', Auth::user()->id)

            ->paginate(20);     


        return view('history',  ['requestt' => $requestt]);
    }

    public function storenew(Request $request)
    {

        $roles = [
            'carid' => 'required',
            'carname' => 'required',
            'company' => 'required',
            'branch' => 'required',
            'kilometer' => 'required|numeric'
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
            'car_name' => $request->carname,
            'odometer' => $request->kilometer,
            'branch' => $request->branch,
            'company' => $request->company,
            'driver' => $request->driver,
            'stnk' => $request->stnk
        ]);

        return redirect()->route('cars')->with(['success' => 'Simpan data berhasil']);
    }


}
