<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules=[
            'email'=>'required',
            'password'=>'required',
        ];
        $message=[
            'email.required'=>'Email tiddak boleh kosong',
            'password.required'=>'Password tidak boleh kosong'
        ];
        $validator=Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            $respon=[
                'status'=>'error',
                'msg'=>'Validation Error',
                'erors'=>$validator->errors(),
                'content'=>null
            ];
            return response()->json($respon,200);
        } else {
            $credentials=request(['email','password']);
            $credentials=Arr::add($credentials,'status_account',2);
            if (!Auth::attempt($credentials)) {
                $respon=[
                    'status'=>'error',
                    'msg'=>'Unathorized',
                    'data'=>$credentials,
                    'erros'=>null,
                    'content'=>null
                ];
                return response()->json($respon,401);
            }
            $user=User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password,[])) {
                throw new \Exception('Error in login');
            }
            $tokenResult=$user->createToken('token-auth')->plainTextToken;
            $respon=[
                'status'=>'success',
                'msg'=>'Login Successfully',
                'errors'=>null,
                'content'=>[
                    'status'=>200,
                    'access_token'=>$tokenResult,
                    'token_type'=>'Bearer'
                ]
            ];
            return response()->json($respon,200);
        }
    }
    public function logout(Request $request)
    {
        $user=$request->user();
        $user->Route::currentAccessToken()->delete();
        $respon=[
            'status'=>'success',
            'msg'=>'Logout Success',
            'errors'=>null,
            'content'=>null
        ];
        return response()->json($respon,200);
    }
    public function logoutall(Request $request)
    {
        $user=$request->user();
        $user->tokens()->delete();
        $respon=[
            'status'=>'success',
            'msg'=>'Logout Successfully',
            'errors'=>null,
            'content'=>null
        ];
        return response()->json($respon,200);
    }
    public function formLogin(Request $request)
    {
        $rules=[
            'email'=>'required',
            'password'=>'required',
        ];
        $message=[
            'email.required'=>'Email tidak boleh kosong',
            'password.required'=>'Password tidak boleh kosong'
        ];
        $validator=Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            $respon=[
                'status'=>'validationerror',
                'msg'=>'Validation Error',
                'erors'=>$validator->errors(),
                'content'=>null
            ];
            return response()->json($respon,200);
        } else {
           $credentials=$request->only('email','password');
           if (Auth::attempt($credentials)) {
               $user=User::join('skpds','users.id_skpd','=','skpds.id')->where('email',$request->email)->select('users.name','users.email','users.id','users.role','users.status_account','skpds.skpd_name','users.id_skpd')->first();
               Session::put(['data'=>$user,'id_field'=>1]);
            $respon=[
                'status'=>'success',
                'msg'=>'success',
                'erors'=>null,
                'data'=>Session::get('data'),
                'content'=>null,
            ];
            return response()->json($respon,200);
           } else {
            $respon=[
                'status'=>'failed',
                'msg'=>'failed',
                'erors'=>null,
                'content'=>null
            ];
            return response()->json($respon,200);
           }
        }
    }
    public function saveSession(Request $request)
    {
        $email='lutvi1500@gmail.com';
        $user=User::where('email',$email)->first();
        Session::put(['data'=>$user,'id'=>Str::uuid()->toString()]);
        echo json_encode($user);

    }
    public function callSession(Request $request)
    {
        $data =  Session::all();
        // $data=['tes'=>Str::uuid()->toString()];
        echo json_encode($data);
    }
    public function clearSession(Request $request)
    {
        $request->session()->flush();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
}
