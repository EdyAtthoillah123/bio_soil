<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Intervention\Image\ImageManagerStatic;


class image_controller extends Controller
{
    public function index(){ 
        return view('image');
    }

    public function store(Request $request){
        if($request->hasFile('profile_image')){
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

            $filename= pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension= $request->file('profile_image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $filenametostorered = $filename.'_'.time().'.'.$extension;
            $filenametostoregreen = $filename.'_'.time().'.'.$extension;
            $filenametostoreblue = $filename.'_'.time().'.'.$extension;

            $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
            $request->file('profile_image')->storeAs('public/profile_images/grayscale', $filenametostore);
            $request->file('profile_image')->storeAs('public/profile_images/red', $filenametostorered);
            $request->file('profile_image')->storeAs('public/profile_images/green', $filenametostoregreen);
            $request->file('profile_image')->storeAs('public/profile_images/blue', $filenametostoreblue);

            $thumbnailpath= public_path('storage/profile_images/grayscale/'.$filenametostore);
            $thumbnailpathred= public_path('storage/profile_images/red/'.$filenametostorered);
            $thumbnailpathgreen= public_path('storage/profile_images/green/'.$filenametostoregreen);
            $thumbnailpathblue= public_path('storage/profile_images/blue/'.$filenametostoreblue);
            // $img= Image::make($thumbnailpath)->resize(400,150, function($constraint){
            //     $constraint->aspectRatio();
            // });
            // $img->save($thumbnailpath);
            $imgred = Image::make($thumbnailpathred)->colorize(50, 0, 0)->save($thumbnailpathred);
            $imgred = Image::make($thumbnailpathgreen)->colorize(0, 50, 0)->save($thumbnailpathgreen);
            $imgred = Image::make($thumbnailpathblue)->colorize(0, 0, 50)->save($thumbnailpathblue);
            $img = Image::make($thumbnailpath)->greyscale()->save($thumbnailpath);
            // $img = ImageManagerStatic::make($thumbnailpath)->greyscale();
            // $imgg->save($thumbnailpath);

            // $img = Image::make($thumbnailpath);
            // $img->colorize(-100,0,100);
            // $img->save($thumbnailpath);

            // $imggg = Image::make($thumbnailpath);
            // $imggg->colorize(0,30,0);
            // $imggg->save($thumbnailpath);
            return redirect('/')->with('success', "Image Uploaded Success");
        }
}
}
