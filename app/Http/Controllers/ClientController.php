<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
      return view('client.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     return view('client.add', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'c_name' =>'required|unique:clients,name',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('success', 'Enter The unique Name Please ');
        }

        // if category = 1 is base category
        //if category = 2 is sub category
        if ($request->type_of_category == 1) {
            $max = Client::where('type', 'main')->max('number');
            $category = new Client();
            $category->name = $request->c_name;
            $category->number = $max + 1;
            $category->status = '0';
            $category->save();
        } else {
            $max = Client::where('type', 'sub')->where('number', 'LIKE', $request->main_category . "%")->max('number');

            if ($max == null) {
                $max = (string)$request->main_category.'01';
                $category = new Client();
                $category->name = $request->c_name;
                $category->number = (int)$max;
                $category->type = 'sub';
                $category->status = '1';
                $category->save();
                DB::table('clients')
                    ->where('number', $request->main_category)
                    ->update(['status' => '1']);

            } else {
                $category = new Client();
                $category->name = $request->c_name;
                $category->number = $max + 1;
                $category->type = 'sub';
                $category->status = '1';
                $category->save();

            }
        }
        return redirect()->route('client');
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
    public function order(Request $request)
    {
        if ($request->ajax()) {
            if ($request->number != 1) {
                $types = Client::where('type', 'main')->get();
                return response()->json([
                    $types
                ]);
            }
        }
        return response()->json([
            'answer' => "not ajax request"
        ]);
    }
}
