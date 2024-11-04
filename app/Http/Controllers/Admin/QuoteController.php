<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Excel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Admin\Quote;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.quote.index', compact('quotes'));
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
        $quote = Quote::findOrFail($id);
        return view('admin.quote.show', compact('quote'));
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

    /**
     * Delete quotes
     * @param  Request $request
     * @return json
     */
    public function destroyList(Request $request)
    {
        $quotes = Quote::whereIn('id', $request->quotes)->get();

        foreach ($quotes as $quote) {
            $quote->products()->delete();
            $quote->delete();
        }

        return ['staus' => 'success', 'message' => 'Quote deleted successfully'];
    }

    /**
     * Export Quotes
     * @return csv
     */
    public function export()
    {
        $quotes = array_map(function($v){
            $v['company_name'] = str_replace('=', '.', $v['company_name']);
            return $v;
        }, Quote::take(1106)->get()->toArray());
        
        Excel::create('Quotes', function($excel) use ($quotes) {
            $excel->sheet('Quotes', function($sheet) use ($quotes) {
                $sheet->fromArray($quotes);
            });
        })->export('csv');
    }
}
