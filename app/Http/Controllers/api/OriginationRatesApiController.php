<?php

namespace App\Http\Controllers\api;

use App\Models\RateOrigin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOriginationRatesPost;

class OriginationRatesApiController extends Controller
{
    
    public function index() {
    }

  
    public function store(StoreOriginationRatesPost $request) {
       
        RateOrigin::create($request->validated());

        return redirect()->back()->with('success_message', 'Successfully created');
    }

    public function change_status(Request $request) {

        $RateOrigin = RateOrigin::FindOrFail($request->id);

        if( $RateOrigin->status == "Desactive" ) {

            $RateOrigin->status = "Active";

        } else {
            if ( $RateOrigin->status == "Active") {

                $RateOrigin->status = "Desactive";
    
            } else {
                if ( $RateOrigin->status == NULL ) {

                $RateOrigin->status = "Active";

                }
            }
        }

        $RateOrigin->save();
        return redirect()->back()->with('success_message', 'Status changed');
    } 

  
    public function show($id) {
        
    }

    
    public function update(Request $request) {

        $RateOrigin = RateOrigin::FindOrFail($request->id);

        $RateOrigin->id = $request->id;
        $RateOrigin->rategroup = $request->rategroup;
        $RateOrigin->code = $request->code;
        $RateOrigin->destination = $request->destination;
        $RateOrigin->country = $request->country;
        $RateOrigin->status = $request->status;
        $RateOrigin->connection_cost = $request->connection_cost;
        $RateOrigin->cost_min = $request->cost_min;
        $RateOrigin->gracetime = $request->gracetime;
        $RateOrigin->init_increment = $request->init_increment;
        $RateOrigin->increment = $request->increment;
 
        $RateOrigin->save();

        return redirect()->back()->with('success_message', 'Status changed');

    }

   
    public function destroy(Request $request) {

            if ( $request->data ) {
            
                RateOrigin::destroy($request->data);
    
            }
        return redirect()->back()->with('success_message', 'Data deleted successfully.');

    }
}
