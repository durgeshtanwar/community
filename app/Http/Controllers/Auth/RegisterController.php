<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Family;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender'=>['required','string'],
            'email' => ['string', 'email', 'max:255', 'nullable'],
            'mobile'=>['required','string','max:255'],
            'family_cast'=>['required','string','max:255'],
            'family_head'=>['required','string','max:255'],
            'gotra' => ['required','string','max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'code'=>['required','string','exists:users,code']
        ]);

       return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $family = New Family();
        $family->family_cast = $data['family_cast'];
        $family->gotra = $data['gotra'];
        $family->family_head = $data['family_head'];
        $family->save();
        $familyId = $family->id;

        $kuldevi = explode('|',$data['gotra'],2);
        User::where('code',$data['code'])
         ->update(['code'=>rand(pow(10, 5-1), pow(10, 5)-1)]);

        $data = User::create([
            'username'=>'SHA'.rand(pow(10, 6-1), pow(10, 6)-1),
            'name' => $data['name'],
            'email' => $data['email'],
            'gender'=>$data['gender'],
            'password' => Hash::make($data['password']),
            'mobile'=>$data['mobile'],
            'family_cast'=>$data['family_cast'],
            'family_head'=>$data['family_head'],
            'gotra'=>$kuldevi[0],
            'kuldevi'=>$kuldevi[1],
            'pur'=>$data['pur'],
            'active'=>'active',
            'usertype'=>'family',
            'family_id'=>$familyId,
            'code'=>rand(pow(10, 5-1), pow(10, 5)-1),
            'madeFor'=>'self'
        ]);

        $api_key = '55EE848A1E208D';
        $contacts = $data->mobile;
        $from = 'SMSMSG';
        $sms_text = urlencode("Hello $data->name your username is $data->username");
        $api_url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=9951&routeid=7&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
       // dd($data->mobile);
        file_get_contents($api_url);
        
        return $data;
    }
}
