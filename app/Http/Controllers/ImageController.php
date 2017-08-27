<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $imageDir;

    public function __construct()
    {
        $this->middleware('auth');

        $this->imageDir = public_path() . '/images';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(8);

        if (request()->ajax()) {
            return $images;
        }
        return view('blog.medias.index', compact('images'));
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
        $file = $request->file('image');

        $this->validate($request,[
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $generatedName = $this->generateFileName($file);
        
        $file->move($this->imageDir, $generatedName);
        
        $this->makeThumbnail($generatedName); 

        $image = Image::create([
            'image_name'        =>  $this->getBaseName($file),
            'image_full_name'   =>  $generatedName,
            'image_path'        =>  'images/'.$generatedName,
            'image_thumb_path'  =>  'images/thumbs/'.$generatedName,
        ]);

        $image['active'] = true;

        return response()->json($image);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $image->update([
            'image_name' => $request->input('name')
        ]);

        return response()->json($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $this->destroyImage($image);

        $image->delete();
    }

    protected function generateFileName($file)
    {
        $extension = $file->getClientOriginalExtension();

        return str_random(6).'.'.$extension; 
    }
    
    protected function getBaseName($file)
    {
        $name = $file->getClientOriginalName();

        return pathinfo($name, PATHINFO_FILENAME);
    }

    protected function makeThumbnail($imgName){
        
        $imgPath = $this->imageDir.'/'.$imgName;

        $destination = $this->imageDir.'/thumbs/'.$imgName;

        $img = \Image::make($imgPath)->resize(300, 200);

        $img->save($destination);    
    }

    protected function destroyImage(Image $image)
    {
        \File::delete(public_path().'/'.$image->image_path);

        \File::delete(public_path().'/'.$image->image_thumb_path);
    }
}
