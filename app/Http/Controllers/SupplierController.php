<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierController extends Controller
{    
        protected $supplierRepository;
    
        public function __construct()
        {
            $this->supplierRepository = new SupplierRepository(new Supplier());
        }
    
        public function index(){
                return view('app.supplier.index');
        }
        
        public function list(Request $request){
                $suppliers = $this->supplierRepository->getAllPaginate(10);
                return view('app.supplier.list',['suppliers' => $suppliers, 'request' => $request->all() ]);
        }


        public function listFiltered(Request $request){
                $suppliers = $this->supplierRepository->with(['products'])
                                ->where([
                                        ['name','like', '%'.$request->input('name').'%'],
                                        ['site','like', '%'.$request->input('site').'%'],
                                        ['uf','like', '%'.$request->input('uf').'%'],
                                        ['email','like', '%'.$request->input('email').'%']
                                ])
                                ->paginate(5);
                return view('app.supplier.listFiltered',['suppliers' => $suppliers, 'request' => $request->all() ]);
        }
        
        public function add(Request $request){
                $msg = "";
                // inclusão
                if( $request->input('_token') != '' &&  $request->input('id') == '' ){
                        $rules = [
                                'name' => 'required|min:3|max:40',
                                'site' => 'required',
                                'uf' => 'required|min:2|max:2',
                                'email' => 'email'
                        ];
                        $feedback = [
                                'required' => 'O campo :attribute deve ser preenchido',
                                'name.min' => 'O campo deve ter no minimo 3 caracteres',
                                'name.max' => 'O campo deve ter no maximo 40 caracteres',
                                'uf.min' => 'O campo deve ter no minimo 2 caracteres',
                                'uf.max' => 'O campo deve ter no maximo 2 caracteres',
                                'email.email' => 'O campo email não está preenchido corretamente'
                        ];
                        $request->validate($rules,$feedback);

                        $supplier = new Supplier();
                        $supplier->create($request->all());
                        $msg = "Cadastro realizado com sucesso";
                }
                // edição
                if( $request->input('_token') != '' &&  $request->input('id') != '' ){
                        $supplier = Supplier::find($request->input('id'));
                        $update = $supplier->update($request->all());

                        if( $update){
                                $msg = "Atualização realizada com sucesso!";
                        }
                        else{
                                $msg = "Erro ao atualizar!";
                        }
                        return redirect()->route('app.supplier.edit',['id' => $request->input('id'), 'msg' => $msg]);
                }
                // print_r($request->all());
                return view('app.supplier.add',['msg' => $msg]);

        }
        
        public function edit($id,$msg = ''){
                $supplier = $this->supplierRepository->find($id);
                return view('app.supplier.add', ['supplier' => $supplier, 'msg' => $msg]);
                // dd($supplier);
        }
        
        public function delete($id){
               
                $this->supplierRepository->delete($id);
                // this model implements softdelete, the rows will not be deleted, only fill column deleted_at
                // Do delete use forceDelete
                // Supplier::find($id)->forceDelete();
                return redirect()->route('app.supplier');
                // dd($supplier);
        }
}
