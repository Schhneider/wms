<?php

namespace App\Http\Controllers;
use App\Models\Images;
use App\Models\Parts;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($part_id)
    {

        $part = $part_id;
        return view('add_image',  compact('part'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $image = new Images();
    $image->part_id = $request->part_id;
    $image->description = $request->description;
    $image->img_link = $request->img_link;
    if(self::find_part_nr($image->part_id, $image->img_link) === 0){
        $image->save();
    }
    else {
        Images::where(['part_id' => $image->part_id])->update(array('description' => $image->description));
        Images::where(['part_id' => $image->part_id])->update(array('img_link' => $image->img_link));
        return redirect('');
    }
        return redirect('home');
    }
    
    public function find_part_nr($part_id, $img_link){
        $part_exists = Images::where([
            'part_id' => $part_id,
            'img_link' => $img_link])->exists();
        if($part_exists == NULL){     
            return 0;
        } else return 1;
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
    public function edit($part_id)
    {
        $image = Images::where('part_id', '=', $part_id)->first();
        return view('edit_image',  compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $part_id)
    {
        $image->part_id = $part_id;
        $image->description = $request->input('description');
        $image->img_link = $request->input('img_link');
        $image->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
