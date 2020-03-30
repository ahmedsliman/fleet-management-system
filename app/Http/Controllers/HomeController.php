<?php

namespace App\Http\Controllers;

use App\User;
use App\Reservation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\ReservationResource as ReservationResource;

class HomeController extends Controller
{
    protected $maxSeats = 25;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getToken(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'email' => ['The provided credentials are incorrect.'],
            ], 404);
        }

        return $user->createToken('my-token')->plainTextToken;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function checkAvailablity($request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'departure' => 'required|min:1|max:10',
            'distination' => 'required|min:1|max:10|gt:departure',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            // Check availablity
            $reservationsResult = Reservation::where('from', '<=', $request->get('departure'))->where('to', '>=', $request->get('distination'));
            $availableSeats = array_diff(
                range(1, $this->maxSeats),
                array_column($reservationsResult->get()->toArray(), 'seat')
            );
            if (count($availableSeats)) {
                return [
                    'seats' => $availableSeats
                ];
            } else {
                return [
                    'seats' => [],
                    'msg' => 'No seats available!'
                ];
            }
        }
    }

    public function checkMySeat(Request $request)
    {
        // Check availablity
        return response()->json($this->checkAvailablity($request));
    }

    public function bookMySeat(Request $request)
    {
        // Check availablity
        $availableSeats = $this->checkAvailablity($request);
        // Check if seats exists
        if (count($availableSeats['seats'])) {
            // Pick a random seat from available pool
            $randomSeat = Arr::random($availableSeats['seats']);
            // Reserve the seat
            Reservation::create([
                'from' => $request->get('departure'),
                'to' => $request->get('distination'),
                'seat' => $randomSeat
            ]);
            return response()->json(['seats' => $randomSeat]);
        }
        return response()->json($availableSeats);
    }
}