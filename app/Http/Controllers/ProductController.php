<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {

    }

    const IMAGES = [
        'https://naturcol.com/wp-content/uploads/2020/02/COLAGENO-x-100.jpg',
        'https://periodismopublico.com/wp-content/uploads/2020/06/Vitalnip_Soacha.jpg',
        'https://todorganic.com/wp-content/uploads/2019/08/moringa-11-1-500x500.jpg',
        'https://cdn.shopify.com/s/files/1/2316/1373/products/calendula-x-50-capsulas-932582_large.jpg?v=1623951120',
        'https://cdn.shopify.com/s/files/1/2316/1373/products/jalea-real-con-mangostino-x-300-gr-367282_large.jpg?v=1623951470',
        'https://cdn.shopify.com/s/files/1/2316/1373/products/bon-star-valeriana-x-100-caps-958702_large.jpg?v=1623951141',
        'https://s1.eestatic.com/2015/11/23/cocinillas/cocinillas_81502050_116226012_640x480.jpg',
        'https://www.elpanoramadelasalud.com/wp-content/uploads/2021/07/proteina-vegana-600x534.jpg',
        'https://laopinion.com/wp-content/uploads/sites/3/2019/11/shutterstock_696261196.jpg?quality=60&strip=all&w=1000',
        'https://compro.com.co/rails/active_storage/representations/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBOEwxVUE9PSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--46a5e54ebd87d744b668f91316c53f073978364e/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDRG9TY21WemFYcGxYM1J2WDJacGRGc0hhUUlnQTJrQ0lBTTZER052Ym5abGNuUkpJZ2hxY0djR09nWkZWRG9LYzJGMlpYSjdDRG9NY1hWaGJHbDBlV2xmT2dwemRISnBjRlE2RDJKaFkydG5jbTkxYm1SYkNHa0IvMmtCLzJrQi93PT0iLCJleHAiOm51bGwsInB1ciI6InZhcmlhdGlvbiJ9fQ==--f9b6205701877dad933126b17f2a1a57fbbba520/UROVITAL-NATURAL-FRESHLY-CAJ-X-60.jpg?locale=es',
        'https://www.tiendanaturistacolombia.com/60-thickbox_default/purgante-natural8-capsulas-natural-freshly.jpg',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $code           = $product->image;
            $product->image = ProductController::IMAGES[$code];
        }
        return view('products.index', ['products' => $products]);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getProducts()
    {
        $products = Product::select('products.id', 'products.name')->get();
        return $products;
    }
}
