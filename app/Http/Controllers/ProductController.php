<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        return view('products/products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products/create');
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
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|gte:0',
            'description' => 'string|nullable',
            'feature_image' => 'file',
            'gallery_images' => 'array',
            'gallery_images.*' => 'file',
            'shipping_cost' => 'required|numeric|gte:0|nullable',
            'product_status' => 'in:draft,published,archived'
        ]);

        if (isset($data['feature_image'])) {
            $path = $data['feature_image']->store('public/gallery_images');
            $data['feature_image'] = substr($path, 7);
        }
        $product = Products::create($data);

        if (isset($data['gallery_images'])) {
            $galleryImages = $request->file('gallery_images');
            foreach ($galleryImages as $image) {
                $path = $image->store('public/gallery_images');
                $path = substr($path, 7);
                $product->galleryImages()->create(['file_name' => $path]);
            }
        }

        // $product->galleryImages()->createMany($data['gallery_images']);
        // foreach ($data['gallery_images'] as $image) {
        // }

        return redirect()->route('products.index')->with('success', 'Product created successflully!');
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
        $product = Products::find($id);
        if ($product) {
            $galleryImages = $product->galleryImages;
            return view('products.detail', compact('product', 'galleryImages'));
        }

        return redirect()->back();
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
        $product = Products::find($id);
        if ($product) {
            $gallery_images = $product->galleryImages;
        }

        return view('products.create', compact('product', 'gallery_images'));
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
        $data = $request->validate([
            'name' => 'max:255',
            'price' => 'numeric|gte:0',
            'description' => 'string|nullable',
            'feature_image' => 'file',
            'gallery_images' => 'array',
            'gallery_images.*' => 'file',
            'shipping_cost' => 'numeric|gte:0|nullable',
            'product_status' => 'in:draft,published,archived'
        ]);

        if (isset($data['feature_image'])) {
            $path = $request->file('feature_image')->store('public/gallery_images');
            $data['feature_image'] = substr($path, 7);
        }
        $product = Products::find($id);
        if ($product) {
            $product->update($data);
            $product->save();

            if (isset($data['gallery_images'])) {
                $product->galleryImages()->delete();
                $galleryImages = $request->file('gallery_images');
                foreach ($galleryImages as $image) {
                    $path = $image->store('public/gallery_images');
                    $path = substr($path, 7);
                    $product->galleryImages()->create(['file_name' => $path]);
                }
            }
            return redirect(route('products.show', $product->id));
        } else {
            return redirect()->back();
        }

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
        Products::destroy($id);

        return redirect()->route('products.index');
    }

    public function generateProductPdf($id)
    {
        $product = Products::find($id);
        if ($product) {
            $galleryImages = $product->galleryImages;
            // Pdf::setOption([
            //     'dpi' => 150,
            //     'defaultFont' => 'sans-serif',
            //     'isHtml5ParserEnabled' => true,
            //     'debugPng' => true
            // ]);
            $pdf = Pdf::loadView('pdf.product', compact('product', 'galleryImages'));
            return $pdf->download($product->name.'.pdf');
        }

        return redirect()->back();
    }
}
