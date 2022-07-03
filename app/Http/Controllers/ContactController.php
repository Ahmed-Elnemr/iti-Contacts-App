<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;


class ContactController extends Controller
{

    public function __construct(){
        $this-> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('contact.index',['contacts'=>contact::all()]);
        // return view('contact.index',['contacts':: where ('user_id',Auth::id())->get() ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate( [
            'phone_number' =>'required | numeric  | digits:11 | regex:/^01[012][0-9]{8}$/ '
        ]);


        // dd(Auth::id());
        $contact = new Contact();
        $contact->user_id = Auth::id();
        $contact->phone_id = Auth::id();
        $contact->phone_number = $request->phone_number;
        $contact->save();
        // $Auth::user()->contacts()->create($request->all());
        return redirect()->route( 'contacts.index' );
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact )
    //! Model bindings
    //  $contact = Contact::find($id); commented->becouse-> (Contact $contact) //implict  Model bindings //
    // by defult select by id ------------ to select by another got model create fun getRoutKy
    {
        $this->authorize('update',$contact);
       return view('contact.edit',['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Contact $contact)
    {
        $this->authorize('update',$contact);
        $request-> validate( [
            'phone_number' =>'required | numeric  | digits:11 | regex:/^01[012][0-9]{8}$/ '
        ]);
        // $contact = new Contact();
        // $contact = Contact::find($id); //! Model bindings
        $contact->phone_number = $request->phone_number;
        $contact->save();
        return redirect()->route('contacts.index');
        // return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //! Model bindings
        //  Contact::find($id)->delete();
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
