<?php

namespace App\Http\Controllers;

use sms_net_bd\SMS;
use App\Models\User;
use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login_store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:2',
        ]);

        if (auth()->check()) {
            $user = auth()->user();
            if ($user->status === 'blocked') {
                auth()->logout();
                return redirect()->route('login')->with('error', 'Your account has been blocked. Please contact the administrator.');
            }
        }
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
            } elseif ($user->role === 'seller') {
                return redirect()->route('seller.dashboard')->with('success', 'Welcome Seller!');
            } else {
                return redirect()->route('dashboard')->with('success', 'Welcome Customer!');
            }
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }








    public function getSubDistricts(Request $request)
    {
        $subDistricts = SubDistrict::where('district_id', $request->district_id)->get();
        return response()->json($subDistricts);
    }

    public function register()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'seller') {
                return redirect()->route('seller.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }
        $districts  = District::all();
        return view('auth.components.register', compact('districts'));
    }


    public function register_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $otp = rand(100000, 999999);
        $coordinates = $this->getDivisionCoordinates($request->division);

        // $phone = $request->phone;
        // if (substr($phone, 0, 1) == '0') {
        //     $phone = '+88' . $phone;
        // } elseif (substr($phone, 0, 3) != '+88') {
        //     $phone = '+88' . $phone;
        // }


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->division = $request->division;
        $user->district_id = $request->district_id;
        $user->sub_district_id = $request->sub_district_id;
        $user->latitude = $coordinates['latitude'];
        $user->longitude = $coordinates['longitude'];
        $user->password = Hash::make($request->password);
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(5);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile', $fileName);
            $user->image = $fileName;
        }

        $user->save();

        //  $sms = new SMS();
        // try {
        //     $message = "Your ZamanShop verification OTP code is: $otp";
        //     $response = $sms->sendSMS(
        //         $message,
        //         $phone
        //     );

        // } catch (Exception $e) {

        //     logger()->error('SMS Error: ' . $e->getMessage());
        // }

        Session::put('user_id', $user->id);
        return redirect()->route('verify.phone')->with('success', 'OTP sent to your phone.');


    }



    private function getDivisionCoordinates($division)
    {
        $divisions = [
            'ঢাকা' => ['latitude' => '23.8103', 'longitude' => '90.4125'],
            'চট্টগ্রাম' => ['latitude' => '22.3569', 'longitude' => '91.7832'],
            'রাজশাহী' => ['latitude' => '24.3745', 'longitude' => '88.6042'],
            'খুলনা' => ['latitude' => '22.8456', 'longitude' => '89.5403'],
            'বরিশাল' => ['latitude' => '22.7010', 'longitude' => '90.3535'],
            'সিলেট' => ['latitude' => '24.8949', 'longitude' => '91.8687'],
            'রংপুর' => ['latitude' => '25.7439', 'longitude' => '89.2752'],
            'ময়মনসিংহ' => ['latitude' => '24.7471', 'longitude' => '90.4203'],
        ];

        return $divisions[$division] ?? ['latitude' => null, 'longitude' => null];
    }


    public function verify_phone()
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return redirect()->route('customer.register')->with('error', 'Please sign up first.');
        }

        return view('auth.components.verify_phone');
    }



    public function verify_phone_store(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $userId = Session::get('user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('customer.register')->with('error', 'Session expired. Please register again.');
        }

        if ($user->otp_expires_at < Carbon::now()) {
            return redirect()->back()->with('error', 'OTP has expired. Please request a new one.');
        }

        if ($user->otp != $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP.');
        }

        $user->is_verified = true;
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        Session::forget('user_id');
        return redirect()->route('dashboard')->with('success', 'Phone verification successful.');
    }



    public function resend_otp()
    {
        $userId = Session::get('user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('sign_up')->with('error', 'Session expired. Please register again.');
        }

        $user->otp = rand(100000, 999999);
        $user->otp_expires_at = Carbon::now()->addMinutes(5);
        $user->save();

        // $sms = new SMS();
        // try {
        //     $message = "Your ZamanShop verification OTP code is: $user->otp";
        //     $response = $sms->sendSMS(
        //         $message,
        //         $user->phone
        //     );

        // } catch (Exception $e) {

        //     logger()->error('SMS Error: ' . $e->getMessage());
        // }

        return redirect()->back()->with('success', 'A new OTP has been sent.');
    }



}
