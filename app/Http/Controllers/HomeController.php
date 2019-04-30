<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function index()
    {
        $data = DB::table('routes')
        ->select('routes.tourDate','routes.from','routes.to','routes.nightStop','cities.cityName','a.cityName as toCity')
        ->join('cities', 'routes.from', '=', 'cities.id')
        ->join('cities as a', 'routes.to', '=', 'a.id')
        ->get();
        $logs = DB::table('tours')->get();
        return view('home',['logs'=>$logs,'data'=>$data]);

    }

    public function tours(){
        $vehiclenos = DB::table('vehicles')->get();
        $logsheets = DB::table('tours')->get();
        $drivers = DB::table('drivers')->get();
        $froms = DB::table('cities')->get();
        $tos = DB::table('cities')->get();

        return view('pages.tours',['vehiclenos'=>$vehiclenos, 'logsheets'=>$logsheets, 'drivers'=>$drivers, 'froms'=>$froms, 'tos'=>$tos]);
    }

    public function newTours(Request $request){
        $date = $request->input('enter_date');
        $log_num = $request->input('log_sheet_no');

        $date = (isset($date) && !empty($date)) ? $date : date('Y-m-d');
        $log_num = (isset($log_num)) ? $log_num : 0;
    
        DB::table('tours')->InsertGetID([
            'enteringDate'=>$date,
            'logSheetNo'=>$log_num
        ]);

        $data = "test"; 

        return back(['data'=>$data]);
    }

    public function newRoute(Request $request){
        $vehicleno = $request->input('vehicle_no');
        $logsheet = $request->input('logSheet_no');
        $driver = $request->input('driver');
        $date = $request->input('tour_date');
        $from = $request->input('from');
        $to = $request->input('to');
        $nightstop = $request->input('night_stop');

        $current_timestamp = Carbon::now()->timestamp;

        DB::table('routes')->InsertGetID([
            'vehicleNo'=>$vehicleno,
            'logSheetNo'=>$logsheet,
            'Dname'=>$driver,
            'tourDate'=>$date,
            'from'=>$from,
            'to'=>$to,
            'nightStop'=>$nightstop,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
    }

    public function expence(Request $request){
        $logsheets = DB::table('tours')->get();

        return view('pages.ExpDepo',['logsheets'=>$logsheets]);
    }

    public function newExpence(Request $request){
        $logsheet = $request->input('logSheet_no');
        $bata = $request->input('bata');
        $parking = $request->input('parking');
        $expences = $request->input('expences');
        $depoAmount = $request->input('deposit');
        $depoDate = $request->input('depo_date');

        DB::table('transactions')->InsertGetID([
            'logSheetNo'=> $logsheet,
            'bata'=>$bata,
            'parking'=>$parking,
            'expences'=>$expences,
            'depositedAmount'=>$depoAmount,
            'depositedDate'=>$depoDate

        ]);
        return back();
    }

    public function fuel(Request $request){
        $logsheets = DB::table('tours')->get();

        return view('pages.ExpDepo',['logsheets'=>$logsheets]);
    }
    
    public function newfuel(Request $request){
        $logsheet = $request->input('logSheet_no');
        $vehicleNo = $request->input('vehicle');
        $startMeter = $request->input('start');
        $endMeter = $request->input('end');
        $totalKM = $request->input('totalKM');
        $litres = $request->input('litres');
        $priceL = $request->input('litrePrice');
        $FuelCost = $request->input('totFuelCost');

        DB::table('fuels')->InsertGetID([
            'logSheetNo'=> $logsheet,
            'vehicleNo'=> $vehicleNo,
            'start'=> $startMeter,
            'end'=> $endMeter,
            'totalkm'=> $totalKM,
            'totlitre'=> $litres,
            'litreprice'=> $priceL,
            'totalcost'=> $FuelCost
        ]);

        return back();
    }

    public function get_vehicle(Request $request){
            $log = $request->input('lg');

            $vehicle = DB::table('routes as h')
                        ->leftjoin('vehicles as a','h.vehicleNo','=','a.id')
                        ->where('h.logSheetNo',$log)
                        ->first();

            return ['vehicle'=>$vehicle]; 
    } 

   
    public function vehicles(Request $request){
        $vehicle_no = $request->input('vehicle_no');
        $vehicle_type = $request->input('vehicle_type');
        $kml = $request->input('kml');

        $vehicle_no = preg_replace('/\s+/', '', $vehicle_no);
        $vehicle_no = strtoupper($vehicle_no);

        DB::table('vehicles')->InsertGetID([
            'vehicleNo'=>$vehicle_no,
            'vechicleType'=>$vehicle_type,
            'kml'=>$kml
        ]);

        return back();
    }

    public function getVehicle(Request $request){
        $data = DB::table('vehicles')->get();

        return view('pages.additems.addVehicle',['data'=>$data]);
    }

    public function driver(Request $request){
        $driver_name = $request->input('driverName');
        $d_phone = $request->input('phone');

        DB::table('drivers')->InsertGetID([
            'Dname'=>$driver_name,
            'phoneNo'=>$d_phone
        ]);

        return back();
        /*$data = DB::table('drivers')->get();
        return view('pages.additems.addDriver',['data'=>$data]);*/
    }

    public function cities(Request $request){
        $location = $request->input('location');

        DB::table('cities')->InsertGetID([
            'cityName'=>$location
        ]);

        // return back();
        return view('pages.additems.addLocations');
    }

    public function getDriver(Request $request){

        $data = DB::table('drivers')->get();

        return view('pages.additems.addDriver',['data'=>$data]);
    }

    

    public function rowRoute(Request $request){

        $log_id = $request->input('log');

        
        $data = DB::table('routes')
        ->select('routes.tourDate','routes.from','routes.to','routes.nightStop','cities.cityName','a.cityName as toCity')
        ->join('cities', 'routes.from', '=', 'cities.id')
        ->join('cities as a', 'routes.to', '=', 'a.id')
        ->where('logSheetNo',$log_id)
        ->get();
        $logs_id = DB::table('tours')->get();
        // return view('home',['logs'=>$logs_id,'data'=>$data]);
        return [$data];

    }

    public function viewTours(Request $request){

        $data = DB::table('routes')
        ->select('routes.tourDate','routes.from','routes.to','routes.nightStop','cities.cityName','a.cityName as toCity')
        ->join('cities', 'routes.from', '=', 'cities.id')
        ->join('cities as a', 'routes.to', '=', 'a.id')
        ->get();
        $logs = DB::table('tours')->get();
        return view('home',['logs'=>$logs,'data'=>$data]);
    }


    
    /*public function getroutes(Request $request){

        $vehicleno = $request->input('vehicle_no');
        $logsheet = $request->input('logSheet_no');
        $driver = $request->input('driver');
        $date = $request->input('tour_date');
        $from = $request->input('from');
        $to = $request->input('to');
        $nightstop = $request->input('night_stop');

        $vehicleno = DB::table('vehicles')->get('vehicleNo');

        return view('pages.tours',['vehicleno' => $vehicleno]);
    }*/
}
