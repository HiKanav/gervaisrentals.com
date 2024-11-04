<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;
use Session;
use App\Admin\Client;

class ClientController extends Controller
{
    /**
     * Location of gallery images
     * @var string
     */
    private $clientLocation;

    public function __construct()
    {
        $this->clientLocation = env('CLIENT_LOCATION', 'imgs/client');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  Client::all();
        $clientLocation =  $this->clientLocation;
        //$this->pr($clients->toArray());
        //foreach ($clients as $client) {

            /*$thumbFrom = public_path()."/imgs/testimonials{$client->thumbnail_location}";
            $thumbTo = public_path()."/imgs/testimonials/".str_replace("/testimonials_thumbs/", "", $client->thumbnail_location);

            $mainFrom = public_path()."/imgs/testimonials{$client->file_location}";
            $mainTo = public_path()."/imgs/testimonials/".str_replace("/pdf/", "", $client->file_location);*/
            
            /*$client->thumbnail_location = str_replace("/testimonials_thumbs/", "", $client->thumbnail_location);
            $client->file_location = str_replace("/pdf/", "", $client->file_location);
            $client->save();*/
           
           /* print_r($mainFrom);
            echo "<br>";
            print_r($mainTo);
            echo "<br>";*/
            //File::copy($thumbFrom, $thumbTo);
            //File::copy($mainFrom, $mainTo);
            
        //}
        //die;

        return view('admin.client.index', compact('clients', 'clientLocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        extract($this->getDefaultValues());
        return view('admin.client.create', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details = $this->getFormFields($request);

        //Thumbnail
        if (!$details["thumbnail_location"] = $this->moveImage($request->file("thumbnail_location"))) return $this->flashAndRedirect();
        
        // File
        if(!$details["file_location"] = $this->moveImage($request->file("file_location")))return $this->flashAndRedirect();
        

        if(Client::create($details)) return $this->flashAndRedirect('success', 'Client Created Successfully');
        else return $this->flashAndRedirect();
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
        $client = Client::findOrFail($id);
        $clientLocation =  $this->clientLocation;
        extract($this->getDefaultValues());
        return view('admin.client.edit', compact('client', 'active', 'clientLocation'));
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
        $details = $this->getFormFields($request);
        $client = Client::findOrFail($id);

        //Thumbnail
        if ($thumbnail = $request->file("thumbnail_location")) {
            File::delete($this->getClientPath($client->thumbnail_location));
            if (!$details["thumbnail_location"] = $this->moveImage($thumbnail)) return $this->flashAndRedirect();
        }

        // File
        if($file = $request->file("file_location")){
            File::delete($this->getClientPath($client->file_location));
            if(!$details["file_location"] = $this->moveImage($file))return $this->flashAndRedirect();
        }

        if($client->update($details)) return $this->flashAndRedirect('success', 'Client Updated Successfully');
        else return $this->flashAndRedirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if($client->delete()){
            if ($thumbnail = $client["thumbnail_location"]) File::delete($this->getClientPath($thumbnail));
            if($image = $client["file_location"]) File::delete($this->getClientPath($image));
            
            return $this->flashAndRedirect('success', 'Client Deleted Successfully');
        }else return $this->flashAndRedirect();
    }

    /**
     * Get required category fields
     * @param  Request $request
     * @return request
     */
    private function getFormFields(Request $request)
    {
        return $request->only('description', 'sort_order', 'active');
    }

    private function moveImage($image, $type='thumbnail')
    {
        $path = $this->getRootPath();
        $imageName = str_random(50).'.'.$image->getClientOriginalExtension();
        
        return $image->move($path, $imageName) ? $imageName : false;
    }

    /**
     * Get path where testimonials are saved
     * @param  string $file
     * @return string
     */
    private function getRootPath()
    {
        return public_path()."/{$this->clientLocation}";
    }

    /**
     * Get full path of testimonial image/file/thumbnail
     * @param  string $file
     * @return string
     */
    private function getClientPath($file)
    {
        return "{$this->getRootPath()}/{$file}";
    }

    /**
     * Possible values of active and oneImage attribute
     * @return arr key as attribute name and value as options and default
     */
    private function getDefaultValues()
    {
        $active = ['options' => [0 => 'Inactive', 1 => 'Active'], 'default' => 1];
        return compact('active', 'oneImage');
    }

    /**
     * Redirect to index ater an event
     * @param  string $type Event type
     * @param  string $msg  Message to display
     * @return redirection
     */
    private function flashAndRedirect($type='danger', $msg='Something went wrong! Try Again')
    {
        Session::flash('noti', ['type' => $type, 'msg' => $msg]);
        return redirect()->action('Admin\ClientController@index');
    }
}
