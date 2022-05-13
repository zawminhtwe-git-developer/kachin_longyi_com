<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function index(){
//        return "Zaw Min Htwe";
        $users = User::all();
        return view('user-manager.index',compact('users'));
    }

    public function makeAdmin(Request $request){
        $request->validate([
            "id"=>"required"
        ]);
        $currentUser =User::find($request->id);
        if($currentUser->role == 1){
            $currentUser->role = "0";
            $currentUser->update();
        }
        return redirect()->back()->with("toast",["icon"=>"success","title"=>"Role Updated for".$currentUser->name]);
    }


    public function makeBan(Request $request){
//        return $request;
        $request->validate([
            "id"=>"required"
        ]);
        $currentUser = User::find($request->id);
        if($currentUser->isBaned == 0){
            $currentUser->isBaned = "1";
            $currentUser->update();
        }

//        return redirect()->back();
        return redirect()->back()->with("toast",["icon"=>"success","title"=>"Role Updated for".$currentUser->name."is Baned."]);
    }
    public function changeProfile(){
        return view('user-manager.change-profile-info');
    }
    public function changePhoto(Request $request){
//        return $request;
        $request->validate([
//             'photo' => 'mimes:jpeg,png',
//             'photo' => 'image|size:1024', // 1 MB
//             'photo' => 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            "photo"=> "required|mimetypes:image/jpeg,image/png|file|max:3000"
        ]);
        $dir="public/profile/";

        if(isset(Auth::user()->photo)){
            Storage::delete($dir.Auth::user()->photo);
        }
        $newName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir,$newName);

        $user = User::find(Auth::id());
        $user->photo = $newName;
        $user->update();

        return redirect()->route('user-manager.changeProfile')->with("toast",["icon"=>"success","title"=>"Information Updated"]);;
    }

    public function changePassword(Request $request){
        // return $request;
        $request->validate([
            "current_password"=>['required',new MatchOldPassword()],
            "new_password"=>['required','min:8'],
            "new_confirm_password"=> ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('login');
    }




    public function changeName(Request $request){
        $request->validate([
            'name'=>"required|min:5|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->update();
        return redirect()->route('user-manager.changeProfile')->with("toast",["icon"=>"success","title"=>"Your Name Updated"]);;

    }
    public function changeEmail(Request $request){
        $request->validate([
            'email' => "required|min:3|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->update();
        return redirect()->route("user-manager.changeProfile")->with("toast",["icon"=>"success","title"=>"Your Email Updated"]);;
    }
}
