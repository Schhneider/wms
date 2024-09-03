<?php

namespace App\Http\Controllers;
use App\Models\Images;
use App\Models\Parts;
use Illuminate\Http\Request;
use App\Models\history;
use Redirect;
class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Parts::all();

        return view('home', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $parts = new Parts();
    $history = new history();
    
    $parts->part_nr = $request->part_nr;
    $history->part_nr = $request->part_nr;

    $parts->location = $request->location;
    $history->location = $request->location;

    $parts->quantity = $request->quantity;
    $history->quantity = '+'.$request->quantity;

    $history->po_number = $request->po_number;
    $history->commentary = $request->commentary;
    if(self::find_part_nr($parts->part_nr, $parts->location) === 0){
        $parts->save();
    }
    else {
        $quantity_sum = Parts::where(['part_nr' => $parts->part_nr, 'location' => $parts->location])->value('quantity');
        $quantity_sum = $quantity_sum + $request->quantity;
        Parts::where(['part_nr' => $parts->part_nr, 'location' => $parts->location])->update(array('quantity' => $quantity_sum));
    }
    $history->save();
    if(self::find_relation($parts->part_nr) === 0){
        return redirect('/partin/image/'.$parts->part_nr);
    }
    else return redirect('home');
    }
    
    public function find_part_nr($part_nr, $location){
        $part_exists = Parts::where([
            'part_nr' => $part_nr,
            'location' => $location])->exists();
        if($part_exists == NULL){     
            return 0;
        } else return 1;
    }
    public function find_relation($part_nr){

        $part_exists = Images::where([
            'part_id' => $part_nr,
            ])->exists();
        if($part_exists == NULL){     
            return 0;
        } else return 1;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parts_new');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('parts_del');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

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
    public function search()
    {
        $search_text = $_GET['query'];
        $parts=Parts::where('part_nr','like',$search_text . '%')->get();
        $history=history::where('part_nr','like',$search_text . '%')->orderBy('created_at', 'DESC')->get();
        $quantity_sum = Parts::where('part_nr',"=",$search_text)->get()->sum('quantity');
        $images=Images::where('part_id','=',$search_text)->first();
        return view('search_stock', compact('parts','history','quantity_sum','images'));

    }
}
