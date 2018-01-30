<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Hash;
use App\Comment;
use Response;
use DB;
use Image; 
use App\Package;
use App\Prices;
use App\Schedule;
use App\Booking;

class AdventurerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new User;

        return $client::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Adventurer.editprofile', ['title' => 'Edit Profile']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = User::findorFail($id);

        $client->user_fullname = $request->input('name');
        $client->email = $request->input('email');
        $client->birthdate = $request->input('birthdate');
        $client->gender = $request->input('gender');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->userabout = $request->input('describe');

        $client->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request, $id)
    {

        $client = User::findorFail($id);

        $oldpassword = $client->password;
        $uopi = $request->input('oldpassword');
        
        if(Hash::check($uopi,$oldpassword)) {
            $client->password = Hash::make($request->input('newpassword'));
            $client->save();
            return response()->json([
                'changepassword' => true,
            ]);
        } else {
            return response()->json([
                'changepassword' => false,
            ]);
        }
        
    }


    public function comment($pid,$userid,Request $request)
    {
        $c = new Comment;
        $id = $userid;

        $validate = $request->validate([
          'comment' => 'required',
        ]);

        $c->user_id = $id;
        $c->package_id = $pid;
        $c->comment = $request->comment;

        $saved = $c->save();

        if($saved) {
            return response()->json([
                'success' => $saved,
            ]);
        }

    }


    public function editcomment($pid,$cid)
    {
        $c = App\Comment::find($cid);
        $id = Auth::id();

        $c->user_id = $id;
        $c->package_id = $pid;
        $c->comment = $request->comment;

        $c->save();

        //return

    }


    public function updateAvatar(Request $request)
    {

        $validator = Validator::make(
        $request->all(), [
        'user-avatar' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
            ]
        );

        if ($validator->fails()) {
            return Response::json(array('success' => false));
        } else {

            if($request->hasFile('user-avatar')){
            $fileNameExt = $request->file('user-avatar')->getClientOriginalName();
            $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
            $ext = $request->file('user-avatar')->getClientOriginalExtension();
            $storedFileName = $filename.'_'.time().'.'.$ext;

            $path = $request->file('user-avatar')->storeAs('public/user_avatars', $storedFileName);

            $u = User::find(Auth::guard('user')->user()->id);

            $u->avatar = $storedFileName;

            $saved = $u->save();

            return Response::json(array('success' => $saved,'avatar' => $u->avatar));  

            }

        }
        
    }


    public function showProfile($id)
    {
        $u = User::find($id);

        return view('Adventurer.myprofile')->with('data',$u);
    }

    public function editprofileView()
    {
         $u = User::find(Auth::guard('user')->id());

         return view('Adventurer.editprofile')->with('user',$u);
    }

    public function showUserBookings()
     {
        $title = 'My Adventures';
        $bookings = DB::table('bookings')->selectRaw('bookings.schedule_id,bookings.package_id,bookings.num_guest,bookings.id,packages.thumb_img,packages.name,schedules.date , packages.id as pid, schedules.id as sid')
                                         ->join('schedules', 'schedules.id' ,'=','bookings.schedule_id')
                                         ->join('packages' ,'packages.id','=','bookings.package_id')             
                                         ->where(['client' => Auth::guard('user')->user()->id])
                                         ->where('schedules.date', '>=', Carbon::now())
                                         ->whereNotIn('status', ['cancelled'])
                                         ->get();

        $prevbookings = DB::table('bookings')->selectRaw('bookings.schedule_id,bookings.package_id,bookings.num_guest,bookings.id,packages.thumb_img,packages.name,schedules.date , packages.id as pid, schedules.id as sid')
                                         ->join('schedules', 'schedules.id' ,'=','bookings.schedule_id')
                                         ->join('packages' ,'packages.id','=','bookings.package_id')             
                                         ->where(['client' => Auth::guard('user')->user()->id])
                                         ->where('schedules.date', '<', Carbon::now())
                                         ->whereNotIn('status', ['cancelled'])
                                         ->get();

        $data = array(
            'bookings' => $bookings,
            'title' => $title,
            'prevbookings' => $prevbookings,
            'now' => Carbon::now()
        );

        return view('Adventurer.trips')->with('pagedata',$data);
     }

    public function showPackageSchedules($id,$bid)
    {
        $schedules = Package::find($id)->schedules;
        $prices = Package::find($id)->prices;
        

        $data = array(
            'schedules'   => $schedules,
            'prices' =>  $prices,
            'cbi' => $bid,
        );

        return Response::json(view('Adventurer.renders.renderschedules')->with('pagedata',$data)->render() );
    }

    public function changebookingSchedule($bid,$sid)
    {

        $sf = Schedule::find($sid);

        if($sf->schedule_status !== 1) {

            $b = Booking::find($bid);

            $s = Schedule::find((int)$b->schedule_id);

            $s->schedule_status = '0';

            $saved2 = $s->save();

            $ss = Schedule::find((int)$sid);

            $ss->schedule_status = '1';

            $saved3 = $ss->save();

            $b->schedule_id = $sid;

            $saved = $b->save();

            if($saved && $saved2 && $saved3) {
                 return Response::json(array('success' => $saved));  
            }
        } else {
            return Response::json(array('success' => false));
        }
        
    }

}
