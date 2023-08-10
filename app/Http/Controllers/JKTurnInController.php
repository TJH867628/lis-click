<?php

namespace App\Http\Controllers;
use App\Models\tbl_submission;

use Illuminate\Http\Request;

class JKTurnInController extends Controller
{
    public function uploadTurnInReport(Request $request,$submisisonCode){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $datetime = now()->format('YmdHis');
            $submissionInfo = tbl_submission::where('submissionCode',$submisisonCode)->first();

            $filename = 'Turn In Report_'. $submissionInfo->submissionCode . "_" . $datetime . "." .  $file->getClientOriginalExtension();
            $submissionInfo->turnInReport = $filename;
            $file->storeAs('turnInReport', $filename, 'public');
            $submissionInfo->save();
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

    public function downloadTurnInReport($filename){
        $path = 'storage/turnInReport/' . $filename;
        return response()->download($path, $filename);
    }
}
