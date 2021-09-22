<?php

namespace Modules\Insaelements\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\People;
use App\Inventory;
use App\Element;
use App\Movement;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $movements = Movement::all();
        return view('insaelements::admin.registro',['movements'=>$movements]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('insaelements::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('insaelements::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('insaelements::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
    public function ajaxPeopleByDocumentPost(Request $request)
    {
        $document=$request->document;
        $peoples = People::where('document',$document)->get();
        return response()->json(['peoples'=>$peoples]);
    }
    public function search(Request $request)
    {
        $people = People::where('document',$request->document)->get();
        return view('insaelements::admin.registro',['people'=>$people]);
    }
}
