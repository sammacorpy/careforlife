<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Redirect;
use Input;
use Mail;

use App\usersdata;
class signupcontroller extends Controller
{
    //
    public function index(){
        return view('signup.signup');

    }

    public function register(Request $request){
        $d=new usersdata;
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:usersdatas',
            'emailid' => 'required|email|unique:usersdatas',
            'password' => 'required|min:8',
            'confpassword' => 'required|same:password',

        ]);


        $d->fname=$request->fname;
        $d->lname=$request->lname;
        $d->username=$request->username;
        $d->emailid=$request->emailid;
        $d->password=Hash::make($request->password);
        $d->seckey=md5(rand(1,1000));
        $data = array(
            'seck' => $d->seckey,
            'username' => $d->username,
        );
        Mail::send('emails.verify',$data,function($m) use ($d){
            $m->from('sammacorpy@gmail.com');
            $m->to($d->emailid);
            $m->subject('Life Account Verification');


        });

        $d->save();
        
        
      

        session_start();

        $_SESSION['usrname'] = $d->username;
        $_SESSION['first_name'] = $d->fname;
        $_SESSION['last_name'] = $d->lname;
        $_SESSION['verified'] = 0;


        return redirect('/');

    }
    public function signin(Request $request){
        
        
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required', 

        ]);
        $s=usersdata::where('username',$request->username)
        ->orWhere('emailid',$request->username)->first();
        if(empty($s)){
            return Redirect::back()->withErrors('username doesnot exist');
        }
        else{
            if(Hash::check($request->password,$s->password)){
                session_start();
                session_regenerate_id();
                
                        $_SESSION['usrname'] = $s->username;
                        $_SESSION['first_name'] = $s->fname ;
                        $_SESSION['last_name'] = $s->lname ;
                        $_SESSION['verified'] = $s->verif;
                if(isset($_SESSION['urltov'])){
                        return redirect($_SESSION['urltov']);
                }
                else{
                    return redirect('/');
                }
            }
            else{
                return Redirect::back()->withInput()->withErrors('Incorrect Password');
               
            }
        }

            
            
            
                    
        

    }

    public function signout(){
           
    session_start();
    session_regenerate_id();
    session_destroy();

    session_start();
    session_regenerate_id();
    
    $_SESSION['wx089lgout']='Logged out successfully';
    return redirect('/signin');
    }




    public function verified($username,$key){
        $s=usersdata::where('username',$username)->where('seckey',$key)->first();

        if(empty($s)){
            return redirect('/');
        }
        else{

            $s->verif=1;
            $s->save();

            session_start();
            session_regenerate_id();
            $_SESSION['verif#09']='verified successfully';
            $_SESSION['verified']=1;

            if (isset($_SESSION['usrname'])){
                return redirect('/');

            }
            else{
                return redirect('/signin');
            }
            
        
        }
    }

    public function fpasswordindex(){
        return view('signup.forgot');
    }

    public function fpasswordrec(Request $request){
        $s=usersdata::where('username',$request->username)
        ->orWhere('emailid',$request->username)->first();
        if(empty($s)){
            return Redirect::to('/fpwd')
            ->withErrors('username doesnot exist');
        }
        else{
            $data=array(
                'otp' => str_random(8),
                'username'=>$s->username
            );
            Mail::send('emails.otp', $data, function($m) use($s){
                $m->from('sammacorpy@gmail.com');
                $m->to($s->emailid);
                $m->subject('Reset Password OTP');                
            });

            session_start();
            session_regenerate_id();
            $_SESSION['r_o_t_p']=$data['otp'];
            $_SESSION['started']=time();

            $q=urlencode($s->username);
            
            return redirect('/u/'.$q);
        }

    }




    public function fpasswordreset($username){
        
        session_start();
        return view('signup.reset',['username'=>$username]);

    }






    public function fpasswordupdate(Request $request, $username){
        $this->validate($request,[
            'password'=>'required|min:8',
            'confpassword'=>'required|same:password',
            'otp'=>'required'
        ]);
        session_start();

        $s=usersdata::where('username',urldecode($username))
        ->orWhere('emailid',urldecode($username))
        ->first();
        if(isset($_SESSION['r_o_t_p'])){
            if((time() - $_SESSION['started']-300)>=0){
                unset($_SESSION);
                session_destroy();
            }
            else{

                if(strcmp(trim($request->otp),$_SESSION['r_o_t_p'])==0){
                    $s->password=Hash::make($request->password);
                    $s->save();
                    
                    unset($_SESSION['r_o_t_p']);

                    $_SESSION['pwdchange']= 1;
                    return redirect('/signin');
                }
                else{

                    return redirect('/u/'.urlencode($s->username))->withErrors('Wrong OTP');
                }

            }
        }
        else{
           
            return redirect('/fpwd')->withErrors('Wrong OTP or Session time out');
        }

            

        
        


    }


    public function resendverification($username){
        $d=usersdata::where('username',$username)->first();
        $data = array(
            'seck' => $d->seckey,
            'username' => $d->username,
        );
        Mail::send('emails.verify',$data,function($m) use ($d){
            $m->from('sammacorpy@gmail.com');
            $m->to($d->emailid);
            $m->subject('Life Account Verification');


        });

        return redirect('/');

    }
}

