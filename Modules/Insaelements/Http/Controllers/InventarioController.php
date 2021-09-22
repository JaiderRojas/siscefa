<?php

namespace Modules\Insaelements\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Inventory;
use App\Elements;

class InventarioController extends Controller
{
    
    public function index()
    {
        $inventories = Inventory::where('state','available')->get();
        return view('insaelements::general.InvenElements',['inventories' => $inventories]);
    }

}
