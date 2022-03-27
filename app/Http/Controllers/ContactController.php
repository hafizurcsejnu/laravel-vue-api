<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request; 

class ContactController extends Controller
{
    
    public function contacts(){
        $contacts = Contact::all();
        return response()->json(
            [
                'contacts' => $contacts,
                'message' => 'Contacts',
                'code' => 200
            ]
        );
    }

    public function index()
    {
        //
    }

      
    public function saveContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->designation = $request->designation;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->save();

        return response()->json([
            'message' => 'Contact Created Successfully',
            'code' => 200
        ]);
    }

    public function getContact($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function updateContact($id, Request $request){
        $contact = Contact::where('id', $id)->first();
        $contact->name = $request->name;
        $contact->designation = $request->designation;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->save();

        return response()->json([
            'message' => 'Contact Updated Successfully',
            'code' => 200
        ]);
    }


    public function deleteContact($id){
        $contact = Contact::find($id);
        if($contact){
            $contact->delete();
            return response()->json([
                'message' => 'Contact Deleted Successfully',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => "Contact with id:$id does not exits!"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
