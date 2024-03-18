<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\AdminModel;

class CountryController extends Controller
{
    private $country;
    public function __construct(){
        $this->middleware('auth');
        $this->country = new AdminModel();
    }
    // hiển thị list country
    public function country(){
        $countryList = $this->country->getCountry();
        return view('admin.country.country', compact('countryList'));
    }

    // thêm country
    public function addCountry(){
        return view('admin.country.add');
    }
    public function postAddCountry(Request $request){
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name is required to be entered'
        ]);
        $dataInsert = [
            $request->name,
            date('y-m-d H:i:s')
        ];
        $this->country->addCountry($dataInsert);
        return redirect()->route('country.list')->with('msg', 'Create A Successful Country');
    }

    // update country
    public function editCountry(Request $request, $id=0){
        if(!empty($id)){
            $countryUpdate = $this->country->editcountry($id);
            if(!empty($countryUpdate[0])){
                $request->session()->put('id', $id);
                $countryUpdate = $countryUpdate[0];

            }else {
                return redirect()->route('country.list')->with('msg', 'This country is not bad at all');
            }
        }else{
            return redirect()->route('country.list')->with('msg', 'Not bad link at');
        }
        return view('admin.country.edit', compact('countryUpdate'));
    }
    public function postEditCountry(Request $request){
        $id = session('id');
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name is required to be entered'
        ]);
        if(empty($id )){
            return back()->with('msg', 'Not bad link at');
        }
        $dataUpdate = [
            $request->name,
            date('y-m-d H:i:s')
        ];
        $this->country->updateCountry($dataUpdate, $id);
        return redirect()->route('country.edit', ['id'=>$id])->with('msg','Updated country successfully');
    }

    // xóa country
    public function deleteCountry($id=0){
        if(!empty($id)){
            $countryUpdate = $this->country->editcountry($id);
            if(!empty($countryUpdate[0])){
                $delete = $this->country->deletecountry($id);
                if($delete){
                    $msg = 'Deleted country successfully';
                }else {
                    $msg = 'Cannot delete country';
                }
            }else {
                $msg = 'Country is not bad at';
            }
        }else{
            $msg = 'Not bad link at';
        }
        return redirect()->route('country.list')->with('msg', $msg);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
