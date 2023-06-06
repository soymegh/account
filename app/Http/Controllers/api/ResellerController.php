<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResellerPost;
use App\Models\Reseller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ResellerController extends Controller
{
    public function index() {
        $resellers = Reseller::all();

        return response()->json([
            "resellers" => $resellers
        ]);
    }

    public function store(StoreResellerPost $request) {

        Reseller::create( $request->validated() );

        return redirect()->back()->with('success_message', 'Successfully created');
    }

    public function change_status(Request $request) {

        $Reseller = Reseller::FindOrFail($request->id);

        if( $Reseller->status == "Inactive" ) {

            $Reseller->status = "Active";

        } else {
            if ( $Reseller->status == "Active") {

                $Reseller->status = "Inactive";
    
            } else {
                if ( $Reseller->status == NULL ) {

                $Reseller->status = "Active";

                }
            }
        }

        $Reseller->save();

        return redirect()->back()->with('success_message', 'Successfully created'); 
    } 

    public function show($id) {
    }

   
    public function update(Request $request) {

        $Reseller = Reseller::FindOrFail($request->id);

        $Reseller->id = $request->id;
        $Reseller->email = $request->email;
        $Reseller->rategroup_id = $request->rategroup_id;
        $Reseller->status = $request->status;
 
        $Reseller->save();

        return redirect()->back()->with('success_message', 'Status changed');

    }
   
    public function destroy(Request $request) {

            if ( $request->data ) {
            
                Reseller::destroy($request->data);
    
            }
        return redirect()->back()->with('success_message', 'Data deleted successfully.');

    }
}
