<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Petty;
use Auth;
use App\ActivityImage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Activity;
use App\Road;
use GuzzleHttp\Client;
use App\Approver;
use App\County;
use App\Receipt;
use App\Allowance;
use App\Ticket;
use App\Mail\SendForApproval;
use Illuminate\Support\Facades\DB;

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
        //Permission::create(['name'=>'view management']);
        $role = Role::findById(1);
        $perm = Permission::findById(1);
        $role->givePermissionTo($perm);
        $petty = Petty::all();
        $allowance = Allowance::all();
        $activities = DB::select('SELECT T0.*, T1.name AS supervisor, T2.name AS technician from activities T0 inner join users T1 ON T0.supervisor = T1.id INNER JOIN users T2 ON T0.technician = T2.id');
        return view('home', compact('activities', 'petty', 'allowance'));
    }

    public function users()
    {
        $roles = Role::pluck('name','name')->all();
        $client = new Client();
            $res = $client->get('http://localhost:44337/api/users');
            $res->getStatusCode();
            $userdata = json_decode($res->getBody())->customers;


        $users = User::all();
        return view('users.index', compact('users', 'userdata', 'roles'));
    }

    public function activities()
    {
        $client = new Client();
        $res = $client->get('http://localhost:44337/api/deliveries');
        $res->getStatusCode();
        $deliveries = json_decode($res->getBody())->deliveries;

        $supervisors = User::all();
        $counties = County::all();
        $technicians = User::all();
        $managers = User::all();
        $activities = DB::select('SELECT T0.*, T1.name AS supervisor, T2.name AS technician from activities T0 inner join users T1 ON T0.supervisor = T1.id INNER JOIN users T2 ON T0.technician = T2.id');
        return view('activities.index', compact('activities', 'supervisors', 'technicians', 'managers', 'counties', 'deliveries'));
    }

    public function petty()
    {
        $requests = DB::table('pettys')
                 ->join('users', 'pettys.user_id', '=', 'users.id')
                 ->select('pettys.*', 'users.name')
                 ->get();
                 
        return view('petty.index', compact('requests'));
    }

    public function approve_petty($id)
    {
        $approver = Approver::find(1);
        $userId = Auth::User()->id;
        if($userId == $approver->app1)
        {
            $data = Petty::find($id);
            $data->status = "1";
            $data->approval1 = "1";
            $data->update();
        }else if($userId == $approver->app2){
            $data = Petty::find($id);
            $data->status = "1";
            $data->approval2 = "1";
            $data->update();
        }else if($userId == $approver->app3){
            $data = Petty::find($id);
            $data->status = "1";
            $data->approval3 = "1";
            $data->update();
        }else{
            session()->flash('noPermission', 'Event has been added successful');
            return redirect()->back();
        }


        session()->flash('pettyApproved', 'Event has been added successful');
        return redirect()->back();
    }

    public function deliveries()
    {
        $client = new Client();
        $res = $client->get('http://localhost:44337/api/deliveries');
        $res->getStatusCode();
        $deliveries = json_decode($res->getBody())->deliveries;

        $supervisors = User::all();
        $counties = County::all();
        $technicians = User::all();
        $managers = User::all();

        return view('delivery.index', compact('deliveries', 'supervisors', 'counties', 'technicians', 'managers'));
    }

    public function acknowledge_petty($id)
    {
        $data = Petty::find($id);
        $data->status = "2";
        $data->update();
        session()->flash('pettyAccounted', 'Event has been added successful');
        return redirect()->back();

    }

    public function approve_allowance($id)
    {
        $approver = Approver::find(1);
        $userId = Auth::User()->id;
        if($userId == $approver->app1)
        {
            $data = Allowance::find($id);
            $data->approval1 = "1";
            $data->status = "1";
            $data->update();
        }else if($userId == $approver->app2)
        {
            $data = Allowance::find($id);
            $data->approval2 = "1";
            $data->status = "1";
            $data->update();
        }else if($userId == $approver->app3)
        {
            $data = Allowance::find($id);
            $data->approval3 = "1";
            $data->status = "1";
            $data->update();
        }else{
            session()->flash('noPermission', 'Event has been added successful');
            return redirect()->back();
        }

        session()->flash('approveAllowance', 'Event has been added successful');
        return redirect()->back();
    }

    public function settings()
    {
        $counties = County::all();
        $managers = User::all();
        $roads = DB::select("SELECT T0.name AS roadName, T1.name AS countyName From roads T0 inner join counties T1 ON T0.county_id = T1.id");
        return view('settings.index', compact('managers', 'counties', 'roads'));
    }

    public function tickets()
    {
        $tickets = DB::select("SELECT T0.*, T1.name AS username from tickets T0 inner join users T1 ON T0.user_id = T1.id");
        return view('tickets.index', compact('tickets'));
    }

    public function view_activity($id)
    {
        $activity_get = DB::select("SELECT T0.*, T1.name AS supervisor, T2.name AS technician from activities T0 inner join users T1 ON T0.supervisor = T1.id INNER JOIN users T2 ON T0.technician = T2.id Where T0.id=".$id.' LIMIT 1');
        $images = ActivityImage::where('activity_id', $id)->get();
        $activity = $activity_get[0];

        if(count($images)==0){
            session()->flash('noupdate', 'Event has been added successful');
            return redirect()->back();
        }else{
            return view('activities.details', compact('activity', 'images'));
        }
        
    }

    public function allowance()
    {
        $requests = DB::table('allowances')
                 ->join('activities', 'allowances.activity_id', '=', 'activities.id')
                 ->join('users', 'allowances.user_id', '=', 'users.id')
                 ->select('activities.*', 'allowances.*', 'users.name')
                 ->get();

        $requestsNoAct = DB::table('allowances')
                 ->join('users', 'allowances.user_id', '=', 'users.id')
                 ->select('allowances.*', 'users.name')
                 ->get();

        return view('allowance.index', compact('requests', 'requestsNoAct'));
    }

    public function save_user(Request $request)
    {
        $data =  new User([
            'name'=>$request->get('name'),
            'phone'=>$request->get('phone'),
            'email'=>$request->get('email'),
            'permission_id'=>$request->get('roles'),
            'password' => Hash::make($request['password']),
            'CardCode'=>$request->get('sapCode'),
        ]);

        $data->assignRole($request->get('roles'));
        
        session()->flash('notif', 'Event has been added successful');
        $data->save();

        return redirect()->route('users');
    }

    public function save_action(Request $request)
    {
        $data = new Activity([
            'user_id'=>Auth::User()->id,
            'supervisor'=>$request->get('supervisor'),
            'technician'=>$request->get('technician'),
            'activity_type'=>$request->get('activity_type'),
            'region'=>$request->get('region'),
            'county'=>$request->get('county'),
            'road'=>$request->get('road'),
            'site'=>$request->get('site'),
            'start_date'=>$request->get('start_date'),
            'end_date'=>$request->get('end_date'),
            'remarks'=>$request->get('comments'),
            'status'=>$request->get('status'),
            'reason_status'=>$request->get('reason')
        ]);

        $data->save();
        session()->flash('created', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_petty(Request $request)
    {
        $data = new Petty([
            'item'=>$request->get('item'),
            'project'=>$request->get('project'),
            'department'=>$request->get('department'),
            'amount'=>$request->get('amount'),
            'narration'=>$request->get('narration'),
            'payee'=>$request->get('payee'),
            'payeePhone'=>$request->get('payeePhone'),
            'user_id'=>Auth::User()->id
        ]);

        $data ->save();

        if($request->hasFile('images'))
        {
            $names = [];
            foreach($request->file('images') as $image)
            {
                $status  = new Receipt();
                $status->pettyId = $data->id;
                $status->amount =  "N/A";
                $status->user_id = Auth::User()->id;
                $destinationPath = 'uploads/';
                $filename = $image->getClientOriginalName();
                $status->fileName = $filename;
                $image->move($destinationPath, $filename);
                array_push($names, $filename);     
                $status->save();     
            }
        }

       // \Mail::to(Auth::User()->email)->send(new SendForApproval(Auth::User()->name, "Petty Cash"));
        session()->flash('savedPetty', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_allowance(Request $request)
    {
        $data = new Allowance([
            'amount' =>$request->get('amount'),
            'department' =>$request->get('department'),
            'activity_id' =>$request->get('id'),
            'reason'=>$request->get('reason'),
            'user_id'=>Auth::User()->id
        ]);

        $data->save();
        \Mail::to(Auth::User()->email)->send(new SendForApproval(Auth::User()->name, "allowance request"));
        session()->flash('savedAllowance', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_ticket(Request $request)
    {
        $data = new Ticket([
            'businessPartner'=>Auth::User()->CardCode,
            'subject'=>$request->get('subject'),
            'user_id'=>Auth::User()->id,
            'priority'=>$request->get('priority'),
            'description'=>$request->get('description'),
            'problemType'=>$request->get('probType'),
        ]);

        $data->Save();

        session()->flash('created', 'Event has been added successful');
        return redirect()->back();
        
    }

    public function save_status_activity(Request $request)
    {
        $actId = $request->get('id');
        $activity = Activity::find($actId);
        $activity->status = $request->get('status');
        $activity->update();


        if($request->hasFile('images'))
        {
            $names = [];
            foreach($request->file('images') as $image)
            {
                $status  = new ActivityImage();
                $status->activity_id = $actId;
                $status->user_id = Auth::User()->id;
                $status->status = $request->get('status');
                $destinationPath = 'uploads/';
                $filename = $image->getClientOriginalName();
                $status->file = $filename;
                $image->move($destinationPath, $filename);
                array_push($names, $filename);     
                $status->save();     
            }
        }
        session()->flash('activityUpdated', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_approvers(Request $request)
    {
        $ap = Approver::where('id', 1)->first();

        if(empty($ap))
        {
            $data = new Approver([
                'app1'=>$request->get('app1'),
                'app2'=>$request->get('app2'),
                'app3'=>$request->get('app3')
            ]);
    
            $data->save();
        }else{
            $ap->app1=$request->get('app1');
            $ap->app2=$request->get('app2');
            $ap->app3=$request->get('app3');

            $ap->update();
        }

        session()->flash('savedApprover', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_county(Request $request)
    {
        $data = new County([
            'name'=>$request->get('county')
        ]);

        $data->save();

        session()->flash('savedCounty', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_road(Request $request)
    {
        $data = new Road([
            'name'=>$request->get('road'),
            'county_id'=>$request->get('countyId')
        ]);

        $data->save();

        session()->flash('savedRoad', 'Event has been added successful');
        return redirect()->back();
    }

    public function get_roads($id)
    {
        $roads =Road::where('county_id', $id)->get();;
        return $roads;
    }

    public function update_petty_amount(Request $request)
    {
        $approver = Approver::find(1);
        $userId = Auth::User()->id;
        if($userId != $approver->app1)
        {
            session()->flash('noPermission', 'Event has been added successful');
            return redirect()->back();
        }else{
            $data = Petty::find($request->get('id'));
            $data->edited = $request->get('amount');
            $data->editedReason = $request->get('reason');
            $data->status = "1";
            $data->approval1 = "1";
            $data->update();
    
            session()->flash('pettyApproved', 'Event has been added successful');
            return redirect()->back();
        }
    }

    public function update_petty_rejected(Request $request)
    {
        $data = Petty::find($request->get('id'));
        $data->rejectReason = $request->get('rejectReason');
        $data->status = "3";
        $data->update();

        session()->flash('pettyApproved', 'Event has been added successful');
        return redirect()->back();
    }

    public function view_more_petty($id)
    {
        $data = DB::table('pettys')
            ->join('users', 'pettys.user_id', '=', 'users.id')
            ->where('pettys.id', $id)
            ->select('pettys.*', 'users.name')
            ->first();
        
        $receipts =Receipt::where('pettyId', $id)->get();
        
        return view('petty.single', compact('data', 'receipts'));
    }

    public function disburse($id)
    {
        $client = new Client();
        $petty = Petty::find($id);

        if($petty->approval3 == "0"){
            session()->flash('approvalPending', 'Event has been added successful');
            return redirect()->back();
        }
        $cardcode = User::find($petty->user_id)->CardCode;
        if($petty->edited != null)
        {
            $sendAmount = $petty->edited;
        }else{
            $sendAmount = $petty->amount;
        }

        $clientt = new Client([
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json' ]
        ]);
        $response = $clientt->request('POST', 'http://localhost:44337/api/petty',
            ['body' => json_encode([
                    'CardCode' => $cardcode,
                    'Amount' => $sendAmount,
            ]
        )]);

        $code = json_decode($response->getBody());
        if($code->ResCode == "00")
        {
            $data = Petty::find($id);
            $data->status = "4";
            $data->update();
            session()->flash('pettyDisbersedSynced', 'Event has been added successful');
            return redirect()->back();
        }else{
            session()->flash('pettyApprovedError', 'Event has been added successful');
            return redirect()->back();
        }
    }

    public function save_petty_receipts(Request $request)
    {
        $actId = $request->get('id');
        $activity = Petty::find($actId);
        $activity->receipts = "1";
        $activity->update();

        if($request->hasFile('images'))
        {
            $names = [];
            foreach($request->file('images') as $image)
            {
                $status  = new Receipt();
                $status->pettyId = $actId;
                $status->amount =$request->get('amount');
                $status->user_id = Auth::User()->id;
                $destinationPath = 'uploads/';
                $filename = $image->getClientOriginalName();
                $status->fileName = $filename;
                $image->move($destinationPath, $filename);
                array_push($names, $filename);     
                $status->save();     
            }
        }
        session()->flash('pettyApproved', 'Event has been added successful');
        return redirect()->back();
    }

    public function save_allowance_new(Request $request)
    {
        $data = new Allowance([
            'item'=>$request->get('itemName'),
            'department'=>$request->get('department'),
            'amount'=>$request->get('amount'),
            'payee'=>$request->get('payee'),
            'payeePhone'=>$request->get('phone'),
            'reason'=>$request->get('narration'),
            'user_id'=>Auth::User()->id
        ]);

        $data->save();

        session()->flash('approvedAll', 'Event has been added successful');
        return redirect()->back();
    }

    public function view_more_allowance($id)
    {
        $data = Allowance::find($id);
        $user = User::where('id', $data->user_id)->first();
        return view('allowance.more', compact('data', 'user'));
    }
}
