<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ContactReason;
use App\Repositories\ContactReasonRepository;

class HomeController extends Controller
{
    protected $contactReason;
    protected $contactReasonRepository;
    
    public function __construct()
    {
        $this->contactReason = new ContactReason();
        $this->contactReasonRepository = new ContactReasonRepository($this->contactReason);
    }

    public function principal(){
        
        $contact_reason = $this->contactReasonRepository->getAll();
        return view("site.home",['contact_reason' => $contact_reason]);
        //echo "Olá, esta é a página de inicio";
    }
}
