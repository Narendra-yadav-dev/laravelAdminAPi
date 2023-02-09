<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Week;
use App\Models\Learn;
use Session;
use Redirect;

class WeekController extends Controller
{
    public function index()
    {   
        $data = Week::orderBy('created_at')->get();
        
        return view('weeks/weeks')->with('weeks', $data);
    }
    public function editweek($id = null)
    {
        $data = Week::where('learnId', $id)->get();
        $name = $data[0]->name;
        $title = $data[0]->title;
        $duration = $data[0]->duration;
        $status = $data[0]->status;
        return view('weeks/editweek', ['week' => $data, 'name'=> $name, 'title'=> $title, 'duration'=> $duration, 'learnId'=> $id, 'status'=> $status]);
    }
    public function updateweek(request $request, $id)
    {   
        try {
            $data = Week::where('learnId', $id)->delete();
            if($data)
            {  
                if(count($request->description_name)  > 0)
                {
                    for($i= 0; $i < count($request->description_name); $i++ )
                    {
                        $request->validate([
                            'description_video['.$i.']' => 'mimes:mp4',
                            'description_pdf['.$i.']' => 'mimes:pdf'
                        ]);
                        $videoName = time().'.'.$request->description_video[$i];
                        $pdfName = time().'.'.$request->description_pdf[$i];
                        $request->description_video[$i]->move(public_path('assets/img/week/video/'), $videoName);
                        $request->description_pdf[$i]->move(public_path('assets/img/week/pdf/'), $pdfName);
                        Week::create([
                            'learnId' => $id,
                            'name' => $request['name'],
                            'title' => $request['title'],
                            'duration' => $request['duration'],
                            'status' => $request['status'],
                            'description_name' => $request->description_name[$i],
                            'description_title' => $request->description_title[$i],
                            'description_content' => $request->description_content[$i],
                            'description_pdf' => $pdfName,
                            'description_video' => $videoName
                        ]); 
                    } 
                }   
            } 
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }   
        Session::flash('message', 'The Week has been successfully updated.');
        return redirect('admin/weeks');
    }
    public function addweek(request $request)
    { 
        $data = Learn::where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('/weeks/addweek')->with('learns', $data);
    }
    protected function createweek(Request $request)
    { 
        try {
             
            if(count($request->description_name)  > 0)
            {
                for($i= 0; $i < count($request->description_name); $i++ )
                {
                    $request->validate([
                        'description_video['.$i.']' => 'file|mimetypes:video/mp4',
                        'description_pdf['.$i.']' => 'mimes:pdf'
                    ]);
                     

                    $fileName = $request->description_video[$i]->getClientOriginalName();
                   echo $filePath = public_path('assets/img/week/video/') . $fileName;
             
                    $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->description_video[$i]));
             
                    // File URL to access the video in frontend
                    //$url = Storage::disk('public')->url($filePath);
                

                    //$videoName = $request->description_video[$i]?time().'.'.$request->description_video[$i]:'';
                    //$pdfName = $request->description_pdf[$i]?time().'.'.$request->description_pdf[$i]:'';
                    //$request->description_video[$i]->move(public_path('assets/img/week/video/'), $videoName);
                    //$request->description_pdf[$i]->move(public_path('assets/img/week/pdf/'), $pdfName);

                    // Week::create([
                    //     'learnId' => $request['learnId'],
                    //     'name' => $request['name'],
                    //     'title' => $request['title'],
                    //     'duration' => $request['duration'],
                    //     'description_name' => $request->description_name[$i],
                    //     'description_title' => $request->description_title[$i],
                    //     'description_content' => $request->description_content[$i],
                    //     'description_pdf' => $pdfName,
                    //     'description_video' => $videoName
                    // ]); 
                    
                } 
            }   
             dd('okkk'); 
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }        
        Session::flash('message', 'The Week has been successfully created.');
        return redirect('admin/weeks');
    }
    public function deleteweek(request $request, $id)
    {
        $data = Week::where('id', $id)->delete();
        if($data)
        { 
            Session::flash('message', 'The Week has been successfully Deleted.');
            return redirect('admin/weeks');  
        }
    }
    public function viewweek($id)
    {
        $data = Week::where('learnId', $id)->get(); 
        $name = $data[0]->name;
        $title = $data[0]->title;
        $duration = $data[0]->duration;
        $status = $data[0]->status;
        return view('weeks/viewweek', ['week' => $data, 'name'=> $name, 'title'=> $title, 'duration'=> $duration, 'learnId'=> $id, 'status'=> $status]);
    }
}
