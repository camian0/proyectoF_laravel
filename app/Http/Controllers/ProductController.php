<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Mail\ProductCreate;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    const EMAILDUMMY = 'me@serve.com';

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
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
        $products = $this->getProducts();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $image   = rand(0, count(ProductController::IMAGES) - 1);
        $product = new Product();
        $product->fill($request->all());
        $product->quantity_and_measure = $request->quantity . ' ' . $request->measure;
        $product->image                = $image;
        $product->slug                 = Str::slug($product->name);
        $mailProduct                   = clone $product;
        $mailProduct->image            = ProductController::IMAGES[$product->image];
        Mail::to(ProductController::EMAILDUMMY)->send(new ProductCreate($mailProduct));
        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product        = Product::where('id', $product->id)->with('category')->first();
        $product->image = ProductController::IMAGES[$product->image];
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $measures                 = ['ml' => 'ml (Mililitros)', 'L' => 'L (Litros)', 'capsulas' => 'capsulas', 'g' => 'g (Gramos)'];
        $categories               = $this->getCategories();
        $split                    = explode(' ', $product->quantity_and_measure);
        $quantity                 = $split[0];
        $measure                  = $split[1];
        $product->quantity        = ($quantity !== null) ? $quantity : null;
        $product->measure         = ($measure !== null) ? $measure : null;
        $product->expiration_date = date('Y-m-d', strtotime($product->expiration_date));

        // dd(Carbon::parse($product->expiration_date)->format('Y-m-d'));
        // dd(date('d-m-Y', strtotime($product->expiration_date)));
        // dd($product);
        return view('products.edit', [
            'product'    => $product,
            'categories' => $categories,
            'measures'   => $measures,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::where('slug', $id)->first();
        $product->fill($request->all());
        $product->quantity_and_measure = $request->quantity . ' ' . $request->measure;
        $product->slug                 = Str::slug($product->name);
        $product->update();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

    private function getCategories()
    {
        $categories = Category::select('categories.id', 'categories.name')->get();
        return $categories;
    }

    private function addImage($products)
    {
        foreach ($products as $product) {
            $code           = $product->image;
            $product->image = ProductController::IMAGES[$code];
        }
    }

    public function getProducts()
    {
        $products = Product::all();
        $this->addImage($products);
        return $products;
    }
}
