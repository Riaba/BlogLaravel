<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller; 
use Session;
class PagesController extends Controller {
   public function getIndex(){
       $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
       return view ('pages.welcome')->withPosts($posts);
   }
   public function getAbout(){
       return view ('pages.about'); 
   }
   public function getContact(){
       return view('pages.contact');
   }
   
   public function postContact(Request $request){
       $this->validate($request,
               ['email'=> 'required|email',
                'subject'=>'required|min:3',
                'message'=>'required|min:10'   
                   ]); 
       $data=array(
           'email'=>$request->email,
           'subject'=>$request->subject,
           'bodyMessage'=>$request->message
       );
       Mail::send('emails.contact', $data, function($message) use($data){
           $message->from($data['email']);
           $message->to('alona-5bbbee@inbox.mailtrap.io');
           $message->subject($data['subject']);
       });
       Session::flash('success','Successfully sent!');
        return redirect('contact');
   }
}
