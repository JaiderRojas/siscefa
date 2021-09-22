<?php

namespace Modules\Insaelements\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;
use App\People;
use App\Inventory;
use App\Element;
use App\Movement;
use App\Responsability;
use App\DetailMovement;
use Modules\Insaelements\Http\Requests\SolicitudRequest;




class SolicitarController extends Controller
{
   

    public function index()
    {  
        $elements=Element::all();
        $peoples=People::all();
       return view('insaelements::general.Solicitar', ['elements'=>$elements, 'peoples'=>$peoples,] );

    }
   
    
    public function ajaxPeopleByDocumentPost(Request $request)
        {
            $document=$request->document;
            $peoples = People::where('document',$document)->get();
            return response()->json(['peoples'=>$peoples]);

         }

       public function ajaxElementByCodePost(Request $request){

            $inventoryCode=$request->inventoryCode;
            $inventories = Inventory::where('inventoryCode',$inventoryCode)->get();
            return response()->json(['inventories'=>$inventories]);
         }
        
         public function store(Request $request){
      $rules = [
            'dependence' => 'required',
            'translation' => 'required',
            'objective' => 'required',
            'return_date' => 'required',
            'people_id' => 'required',
            'quantity' => 'required'


        ];

        $messages = [
            'dependence.required' => 'El campo Dependencia es requerido.',
            'translation.required' => 'El campo Translacion es requeido.',
            'objective.required' => 'El campo Objetivo es requeido.', 
            'return_date.required' => 'La Fecha de entrega es requeido.',
            'people_id.required' => 'La Cedula de Autorizacion es requeido.',
            'quantity.required' => 'La cantidad de Elementos es requeido.',

           
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
         if($validator->fails()):
                return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
         else:
            $m = new Movement;
            $m->dependence = e($request->input('dependence'));
            $m->translation = e($request->input('translation'));
            $m->objective = e($request->input('objective'));
            $m->registration_date = e($request->input('registrationDate'));
            $m->return_date = e($request->input('return_date'));
            $m->state =  "solicitud";
            $m->type_movement = "PresExterno";
            $m->save();
                
            $r = new Responsability;
            $r->movement_id = $m->id;
            $r->people_id = e($request->input('people_id'));
            $r->rol = "solicitante";
            $r->date = e($request->input('registrationDate'));
            $r->save();

            $re = new Responsability;
            $re->movement_id = $m->id;
            $re->people_id = e($request->input('peopleIdAutoriza'));
            $re->rol = "autoriza";
            $re->date = e($request->input('registrationDate'));
            $re->save();

             for ($i=0; $i < count($request->tdid); $i++) {
                    $md = new DetailMovement;
                    $md->movement_id = $m->id;
                    $md->inventory_id = $request->tdid[$i];
                    $md->quantity = $request->quantity[$i];
                    $md->unit_price = $request->tdUnitPrice[$i];
                    $md->save();
                }
                
             return redirect(route('insaelements.general.Solicitar'))->with('message', 'Guardado con éxito')->with('typealert', 'success');
             endif;

        }
         
}
