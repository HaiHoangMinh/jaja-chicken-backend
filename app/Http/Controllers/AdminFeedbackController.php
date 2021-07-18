<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminFeedbackController extends Controller
{
   

    public function index()
    {
        $feedbacks = DB::table('feedbacks')->paginate(10);
        $customers = DB::table('customers')->get();
        $products = DB::table('products')->get();
        return view('admin.feedback.index',compact('feedbacks','products','customers'));

    }
    
    public function allow_feedback(Request $request)
    {
        $data = $request->all();
            DB::table('feedbacks')
                ->where('id', $data['feedback_id'])
                ->update([
                'status' => $data['feedback_status'],
            ]);
        }

        
    public function reply_feedback(Request $request)
    {
        $data = $request->all();
        DB::table('feedbacks')
        ->where('id', $data['feedback_id'])
        ->update([
        'reply' => $data['replay_feedback'],
    ]);
    return redirect()->route('feedbacks.index');
    }
    public function delete($id){
        
       DB::table('feedbacks')->where('id',$id)->delete();
        return redirect()->route('feedbacks.index');
    }
    
}