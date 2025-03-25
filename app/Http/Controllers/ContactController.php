<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contact_page(){
        return view('app.customer.pages.contact');
    }
    public function contact_store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $message = new Contact;
        $message->name = $request->name ?? 'N/A';
        $message->email = $request->email ?? 'N/A';
        $message->message = $request->message ?? 'N/A';
        $message->save();

        return redirect()->back()->with('success','Message Sent Successfully!');
    }


    public function admin_message_show(){
        $messages = Contact::latest()->get();
        return view('admin.components.contact.index',compact('messages'));
    }

    public function admin_message_delete($id){
        $message = Contact::find($id);
        $message->delete();
        return redirect()->back()->with('success','Message Deleted Successfully!');
    }
}
