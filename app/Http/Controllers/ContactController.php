<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContact;
use \App\Models\ContactReason;
use App\Repositories\ContactRepository;
use App\Repositories\ContactReasonRepository;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    protected $siteContact;
    protected $contactRepository;
    protected $contactReason;
    protected $contactReasonRepository;

    public function __construct()
    {
        $this->contactReason = new ContactReason();
        $this->contactReasonRepository = new ContactReasonRepository($this->contactReason);
        $this->siteContact = new SiteContact();
        $this->contactRepository = new ContactRepository($this->siteContact);
    }

    public function index(Request $request){
        
        $contacts = $this->contactRepository->getAllPaginate(10);
        return view("app.contacts.index",['contacts' => $contacts, 'request' => $request->all()]);
    }
    
    public function contact(){
        
        $contact_reason = $this->contactReasonRepository->getAll();
        return view("site.contact",['title' => 'Contato'],['contact_reason' => $contact_reason]);
    }
    
    public function save(ContactRequest $request){

        $this->contactRepository->create($request->all());
        return redirect()->route('site.index');

        // dd($request->all());


    }
}
