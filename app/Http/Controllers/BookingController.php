<?php

namespace App\Http\Controllers;

use DateTime;
use App\Booking;
use App\Cost;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
     $user = Auth::user();
        if ($user->hasRole('Admin')) {

            $bookings = Booking::all();
            return view('admin')->with('bookings', $bookings);

        } elseif ($user->hasRole('Staff')) {
            $bookings = Booking::all();
            
            return view('Staff')->with('bookings', $bookings);

        } else {

        //    $costs = Cost::all();
           $user = Auth::user();
        
      
    return view('user-booking.index')->with('user',$user);
        }
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                return view('booking.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
         $this->validate($request, [
            // 'user_id'         => 'required|numeric',
            'phone'           => 'required|string|max:255',
            'gender'          => 'required|string|max:255',
            'age'              => 'required|string|max:255',
            'check_in'        => 'required|date',
            'check_out'       => 'required|date',
            'nationality'      => 'required|string|max:255'

        ]);

                    $costs = Cost::all();
                    $booking  = new Booking();
                    $booking->user_id = Auth::User()->id;

        foreach ( $costs as $cost)
                { 
                    $date3=date_create($request->input('check_in'));
                    
                    $date2=date_create($request->input('check_out'));
                    $diff=date_diff($date3,$date2);
                    
                    $days = substr($diff->format("%R%a "),1);

                
                    
                    $date3=date_create($request->input('check_in'));
                    $date2=date_create($request->input('check_out'));
                    $diff=date_diff($date3,$date2);
                    $day = substr($diff->format("%R%a "),1);
                  
                    $booking ->phone =$request->input('phone');
                    $booking ->gender =$request->input('gender');
                    $booking ->age =$request->input('age');
                    $booking ->check_in=$request->input('check_in');
                    $booking ->check_out=$request->input('check_out');
                    $booking ->nationality =$request->input('nationality');
                    $booking-> Duration = $day;
                
                     if($request->input('nationality')==='foreigner' || $request->input('age') < 18)
                        {
                            $booking->pay = ((int)$day * (int)($cost ->children));
                                    }
                                    else
                            $booking->pay = ((int)$day * (int)($cost->foreigner));
 
                        if($request->input('nationality')==='local'|| $request->input('age') < 18)
                        {
                        
                            $booking->pay  = ((int)$day * (int)($cost ->children));
                        }
                        else
                        {
                            $booking->pay = ((int)$day * (int)($cost->local));
                        }
                    }
                  
                      $booking->save();
        //  $this->sendMessage( 'Welcome to Big life Zoo Foundation your booking was
        //    successful!! we are glad to have you as our visitor..your visit will last'.' '.$days.' 
        //    '.'days at a cost of '.' '.$sum.' '.'ksh',$request->phone);
         return redirect()->route(('bookings.show'),$booking->id)->with('flash_message','ticket created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        
           $booking = Booking::findOrFail($id);

        return view('user-booking.edit', compact('booking'));
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
        $costs = Cost::all();
        $booking = Booking::where('id', $id)->first(); 
        $this->validate($request, [
            'phone'           => 'required|string|max:255',
            'age'          => 'required|string|max:255',
            'check_in'        => 'required|date',
            'nationality'        => 'required|string|max:255',
            'check_out'       => 'required|date',
        ]);
        $booking->phone = $request->input('phone');
        $booking->age = $request->input('age');
        $booking->check_in = $request->input('check_in');
        $booking->nationality = $request->input('nationality');
        $booking->check_out = $request->input('check_out');
        $date3=date_create($request->input('check_in'));
        $date2=date_create($request->input('check_out'));
        $diff=date_diff($date3,$date2);
        $day = substr($diff->format("%R%a "),1);
        $booking->Duration =  $day;
         foreach ( $costs as $cost){
        if($request->input('nationality')==='foreigner'){
         if($request->input('age') < 18){
            $sum = ((int)$day * (int)($cost ->children));
                    }else{
                    $sum = ((int)$day * (int)($cost->foreigner));
                    }
                }  
         if($request->input('nationality')==='local'){
            if($request->input('age') < 18){
            $sum = ((int)$day * (int)($cost ->children));
         }else{
             $sum = ((int)$day * (int)($cost->local));
         }
        }           
        
        $booking->pay=$sum;        
        $booking->save();
        // $this->sendMessage( 'your booking information  of ticket number '.' '.$id.' '.'has
        //  been edited..your visit will last for '.' '.$day.' '.'days at a cost of '.' '.$sum.' '.'ksh' .' '.'you 
        //  can pay via mpesa this is our the till number 345786',$request->phone);

        return redirect()->route('bookings.index')->with('flash_message','booking successfully updated.');
    
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 

          $booking = Booking::findOrFail($id);
        $booking->delete();

       

        return redirect()->route('bookings.index')
            ->with('flash_message',
             'ticket successfully deleted.');
    }

    private function dateDiff($start, $end){
        $date3=date_create($start);
        $date2=date_create($end);
        $diff=date_diff($date3,$date2);
        $days = substr($diff->format("%R%a "),1);
        return $days;
    }
public function sendCustomMessage(Request $request)
    {
        $validatedData = $request->validate([
            'users' => 'required|array',
            'body' => 'required',
        ]);
        $recipients = $validatedData["users"];
        // iterate over the array of recipients and send a twilio request for each
        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "A text message for booking approval has been sent to your phone "]);
    }
    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients Number of recipient
     */
    private function sendMessage($message, $recipients)
    {
        $booking = Booking::all();
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }
    


}
