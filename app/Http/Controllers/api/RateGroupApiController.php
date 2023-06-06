<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRateGroupPost;
use App\Models\RateGroup;
use Illuminate\Http\Request;

class RateGroupApiController extends Controller
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

    public function store(StoreRateGroupPost $request)
    {
        RateGroup::create($request->validated());

        return redirect()->back()->with('success_message', 'Successfully created');
    }

    public function change_status(Request $request) {

        $RateGroup = RateGroup::FindOrFail($request->id);

        if( $RateGroup->status == "Inactive" ) {

            $RateGroup->status = "Active";

        } else {
            if ( $RateGroup->status == "Active") {

                $RateGroup->status = "Inactive";
    
            } else {
                if ( $RateGroup->status == NULL ) {

                $RateGroup->status = "Active";

                }
            }
        }

        $RateGroup->save();

        return redirect()->back()->with('success_message', 'Successfully created'); 
    } 

    public function show($id) {
    }

   
    public function update(Request $request) {

        $RateGroup = RateGroup::FindOrFail($request->id);

        $RateGroup->id = $request->id;
        $RateGroup->name = $request->name;
        $RateGroup->markup = $request->markup;
        $RateGroup->init_increment = $request->init_increment;
        $RateGroup->increment = $request->increment;
        $RateGroup->status = $request->status;
 
        $RateGroup->save();

        return redirect()->back()->with('success_message', 'Status changed');

    }
   
    public function destroy(Request $request) {

            if ( $request->data ) {
            
                RateGroup::destroy($request->data);
    
            }
        return redirect()->back()->with('success_message', 'Data deleted successfully.');

    }
}
