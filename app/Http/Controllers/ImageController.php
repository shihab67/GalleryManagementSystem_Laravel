<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Image;
use Intervention\Image\Facades\Image as img;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index(){
        $image1 = Image::all()->where('category','Car');
        $image2 = Image::all()->where('category','Food');
        $image3 = Image::all()->where('category','Animal');

        return view('home')->with('title','Home')->with('image1',$image1)->with('image2',$image2)->with('image3',$image3);
    }

    public function layout(){
        $image1 = Image::all()->where('type','standard');
        $image2 = Image::all()->where('type','mosaic');

        return view('layout')->with('title','Layout')->with('image1',$image1)->with('image2',$image2);
    }

    public function insert(Request $request)
    {
        $file = $request->file('file');
        for($i=0;$i<count($file);$i++){
            //dd($file[$i]);
            //return $f;
            $filename = uniqid().$file[$i]->getClientOriginalName();
           // return $filename;
           
            $file[$i]->move('images',$filename);
       // $file->move('images',$filename);
        
            Image::create([
                'file_name'=>$filename,
                'file_path'=>'images/'.$filename,
                'type'=>$request->exampleRadios,
                'category'=>$request->category,
                'sub_category'=>$request->sub_cat,
                'desc'=>$request->desc,
                'user_id'=>session('id')
            ]);
            }
        return redirect('/home');
    }

    public function edit($id)
    {
        $image = Image::find($id);
        //return $image;
        return view('edit')->with('title','Edit | Image')->with('img', $image);
    }

    public function update($id,Request $request){
        $img = Image::find($id);
        //dd($request->all());
        
        $newImg = img::make($img->file_path);
        $newImg->rotate(-$request->rotate); 
        if($request->cropCheck != null)
        {
            $x = round($request->cropX);
            $y = round($request->cropY);
            $w = round($request->cropWidth);
            $h = round($request->cropWidth);
            
            $newImg->crop( $w, $h, $x, $y);
            $newImg->resize( $w, $h);
        }
        $file_path = 'images/'.time().'.jpg';
        $newImg->save($file_path);
        File::delete($img->file_path);
        $img->file_path = $file_path;
        $img->desc = $request->desc;
        $img->save();
        return redirect('/home');
    }

    public function destroy($id)
    {
        $data = Image::findOrFail($id);
        // print_r($data);
        //File::delete($img->file_path);
        $data->delete();

        return redirect('/home');
    }
}
