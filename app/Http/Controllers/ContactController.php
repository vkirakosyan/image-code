<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact=Contact::OrderBy('id', 'DESC')->get([
            'address_'.app()->getLocale().' as address',
            'email',
            'phony',
            'phony_city',
            'facebook',
            'instagram',
            'telegram',
            'twiter',
            'vk',
            'viber',
            'whatsapp',
            'maps',
            'id'
        ]);
       
        return view('contact.dashbord',['contacts'=>$contact]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $contact=new Contact();
        $data=$request->all();
        $contact->create($data);
        return redirect('/contact');
        
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
    public function edit($id)
    {
        return view('contact.edit',['contact'=>Contact::find($id)]);
        
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
        $contact=Contact::find($id);
        $contact->address_en=$request->input('address_en');
        $contact->address_ru=$request->input('address_ru');
        $contact->address_am=$request->input('address_am');
        $contact->phony=$request->input('phony');
        $contact->phony_city=$request->input('phony_city');
        $contact->email=$request->input('email');
        $contact->maps=$request->input('maps');
        $contact->facebook=$request->input('facebook');
        $contact->instagram=$request->input('instagram');
        $contact->telegram=$request->input('telegram');
        $contact->twiter=$request->input('twiter');
        $contact->vk=$request->input('vk');
        $contact->save();
        return redirect('/contact');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Contact::find($id)->delete()){
            return "delete";
        }
        else
        {
            return "error";
        }
            
    }
}
