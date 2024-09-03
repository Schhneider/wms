<?php

namespace App\Http\Controllers;
use App\Models\Parts;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Models\history;
class Parts2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Parts::all();
        $quantity_sum = Parts::all();
            $part_nr = Parts::value('part_nr');
            $location = Parts::value('location');
            $quantity_sum = Parts::select("part_nr",IMAGES::raw("max(images.description) as description"), PARTS::raw("sum(quantity) as q"))
            ->leftjoin('images', 'images.part_id', '=', 'parts.part_nr')
            ->groupBy('part_nr')->get()->toArray();
        //var_dump($quantity_sum);
        return view('all_stock', compact('quantity_sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parts_del');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parts = Parts::first();
        $history = new history();
    
        $parts->part_nr = $request->part_nr;
        $history->part_nr = $request->part_nr;

        $parts->location = $request->location;
        $history->location = $request->location;

        $parts->quantity = $request->quantity;
        $history->quantity = '-'.$request->quantity;

        $history->commentary = $request->commentary;
        $history->save();
        $quantity_del = Parts::where(['part_nr' => $parts->part_nr, 'location' => $parts->location])->value('quantity');
        $quantity_del = $quantity_del - $parts->quantity;
        if($quantity_del<=0){
            self::destroy($parts->part_nr, $parts->location);
            return redirect('/home');
        }
        else {
            Parts::where(['part_nr' => $parts->part_nr, 'location' => $parts->location])->update(array('quantity' => $quantity_del));
            return redirect('/home');
        }
        
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
    public function destroy($part_nr, $location)
    {
        Parts::where(['part_nr' => $part_nr, 'location' => $location])->delete();
        return redirect('/home');
    }
}
