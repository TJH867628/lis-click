<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_spend;

class SpendController extends Controller
{
    public function store(request $request){
        $item = $request -> input('item');
        $amount = $request -> input('amount');
        $date = now();

        $data = array('item'=>$item,'quantity'=> 0 ,'amount'=>$amount,'created_at'=>$date,'updated_at'=>$date);
        DB::table('tbl_spend')->insert($data);

        return redirect('JKspend');
    }

    public function delete($id) {
        $item = tbl_spend::find($id); // Replace YourItemModel with your actual model name
        if ($item) {
            $item->delete();
            return redirect()->back()->with('success', 'Item deleted successfully.');
        }
        return redirect()->back()->with('error', 'Failed to delete item.');
    }
    
}
