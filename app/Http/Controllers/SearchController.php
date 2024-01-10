<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        return view('shop.master');
    }

    function getSearchAjax(Request $request)
    {
        if($request->get('keyword'))
        {
            $keyword = $request->input('keyword');
            $products = Product::where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('slug', 'LIKE', "%$keyword%")
                    ->orWhere('price', 'LIKE', "%$keyword%")
                    ->orWhere('description', 'LIKE', "%$keyword%")
                    ->orWhere('quantity', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%");
            })
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($products as $product)
            {
               $output .= '
               <li><a href="data/'. $product->id .'">'.$product->name.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
}

