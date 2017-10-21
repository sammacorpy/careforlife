<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subscribe;
use App\userprofile;
use App\profimage;
use App\usersdata;
use Illuminate\Support\Facades\Storage;

class homepanel extends Controller
{


    //

    public function home(){
        session_start();
        session_regenerate_id();
        if (!isset($_SESSION['usrname'])){
            return view('root.home');
        }
        else{
            $d=profimage::where('username',$_SESSION['usrname'])->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
                return view('root.home',compact('p'));
            }
            else{
                $p="avatar.png";
                return view('root.home',compact('p'));
            }
            

        }
     
    }


    public function subscribeus(Request $r){
        $d=new subscribe;

        $this->validate($r,[
            'emailid'=>'required|email|unique:subscribes'
        ]);
        $d->emailid=$r->emailid;

        $d->save();

        return redirect('/')->withErrors('Thanks For Subscribing Us');

        
    }


    public function profileview( $username ){
        session_start();
        session_regenerate_id();
        $permission=0;

        $_SESSION['urltov']="/profile/".$username;
        
        if (!isset($_SESSION['usrname'])){
            
            $d=profimage::where('username',$username)->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
            }
            else{
                $p="avatar.png";
            }
            
        }
        else{
            if(strcmp($_SESSION['usrname'],$username)==0){
                $permission=1;
            }
            $d=profimage::where('username',$username)->first();
            if(!empty($d)){
                $p=$d->profile_image;
    
            }
            else{
                $p="avatar.png";
            }
        }

        $ud=usersdata::where('username',$username)->first();
        $sr=userprofile::where('username',$username)->first();
        if(!empty($ud)){
            if (!empty($sr)){
                return view('signin.profile',['username'=>$username,'p'=>$p,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr]);
                

            }
            else{
                return view('signin.profile',['username'=>$username,'p'=>$p,'permission'=>$permission,'fname'=>$ud->fname,'lname'=>$ud->lname,'userdetails'=>$sr])->withErrors("We don't have enough info about the ".$username);
            }
        }
        else{
            return redirect()->back()->withErrors($username." does not exist");
            

        }
              
    }

    public function profileimgupload(request $r){
        session_start();
        session_regenerate_id();
        $username=$_SESSION['usrname'];
        if ($r->hasFile('imgprof') && ($r->imgprof->extension()=='jpeg' || $r->imgprof->extension()=='png' || $r->imgprof->extension()=='jpg' || $r->imgprof->extension()=='gif' || $r->imgprof->extension()=='bmp' || $r->imgprof->extension()=='jpeg' || $r->imgprof->extension()=='tiff')){
                $d=profimage::where('username',$username)->first();
                if(!empty($d)){
                    Storage::delete('public/profimg/'.$d->profile_image);
                    $p=$r->file('imgprof')->store('public/profimg');
                    $p=explode('/',$p);
                    $p=$p[2];
                    $d->profile_image=$p;
                    $d->save();

                }
                else{
                    $p=$r->file('imgprof')->store('public/profimg');
                    $p=explode('/',$p);
                    $p=$p[2];
                    $d=new profimage;
                    $d->profile_image=$p;
                    $d->username=$username;
                    $d->save();
                }
                
                return redirect('/profile/'.$username);
            }
            
            else{
                return redirect('/profile/'.$username)->withErrors('Please upload a valid image');

            }
        



    }
}