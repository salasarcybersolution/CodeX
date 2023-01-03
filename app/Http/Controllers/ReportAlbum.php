<?php
namespace App\Http\Controllers;
require app_path('Helpers/helper.php');
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Insurer;

use App\Models\AlbumImages;
use App\Models\ReportAlbums;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;
use Cache;
class ReportAlbum extends Controller
{
    
    public function index(Request $request) 
    {   

        Cache::flush();
        cache()->flush();
        //$reportList = DB::table('cdx_surveyor_reports')->get();

        $reportList = DB::table('cdx_surveyor_reports')
            ->leftJoin('cdx_report_policy_details', 'cdx_report_policy_details.report_id', '=', 'cdx_surveyor_reports.report_id')
            ->select('cdx_report_policy_details.*', 'cdx_surveyor_reports.insurer_id', 'cdx_surveyor_reports.report_status')
            ->get();
           

        if($request->id){
            $id = $request->id;
            $reportImages = DB::table('cdx_report_images')->where('report_id', $id )->get();
            $AlbumImages = DB::table('cdx_report_album_images')->where('report_id', $id )->get();
        }else{
            $reportImages = 0;
            $AlbumImages = 0;
        }
       return view('surveyor-admin/reports/albumManagment/AddAlbum',[
            'title' => 'Report Album','reportList' => $reportList,'AlbumImages' => $AlbumImages,'reportImages' => $reportImages,'report_id' => $request->id
        ]);

    }

     

    public function design(Request $request) 
    {   
       return view('surveyor-admin/reports/albumManagment/albumDesign',['title' => 'Report Album']);
    }

    public function drowAlbum(Request $request) 
    {   
        Cache::flush();
        cache()->flush();
        $id = $request->id;
        $AlbumImages = DB::table('cdx_report_album_images')->where('report_id', $id )->get();
      
      return view('surveyor-admin/reports/albumManagment/DrowAlbum',[
            'title' => 'Report Album','AlbumImages' => $AlbumImages,'report_id' => $request->id
        ]);
    }
    
    

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = new AlbumImages();
        $imageUpload->report_id = $request->report_id;
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        AlbumImages::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    public function fileUpload(Request $request)
    {
        $image = $request->croppedImage;
        $decode=base64_decode($image);
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images/albumImages'),$imageName);
        return response()->json(['success'=>$imageName]);
    }
    

    public function createAlbum(Request $request) 
    {   
        $attr = $request->toArray();

       // print_r($attr['imagesNo']); die;
        
        if($request->id){
            $id = $request->id;
            $i=0;
            foreach ($attr['imagesNo'] as $key => $value) {
                //echo $attr['imagesNo'][$k-1];
                $reportImages = DB::table('cdx_report_images')->where('report_id', $id )->skip($i)->take($value)->get();
                $bArray[] = $reportImages;
                $i+=$value;
            }
        }else{
            $bArray = 0;
        }
       return view('surveyor-admin/reports/albumManagment/createAlbum',[
            'title' => 'Report Album','report_id' => $request->id,'reportImages' => $bArray,'imageNumbers' => $attr['imagesNo']]);

    }


    public function uploadAlbumImage(Request $request)
    {
        $image = $request->albumImage;
        $decode=base64_decode($image);
        $imageName = $image->getClientOriginalName();


        $imageUpload = new ReportAlbums();
        $imageUpload->report_id = $request->report_id;
        $imageUpload->album_filename = $imageName;
        $imageUpload->save();
        

        $image->move(public_path('images/albumImages'),$imageName);
        return response()->json(['success'=>$imageName]);
    }



     public function deleteImagesData(Request $request)
       {
             unlink(public_path("images/".$request->filename));
            $deleteImages = DB::table('cdx_report_images')->where('id', '=', $request->id)->delete();             
            return response()->json(['filename'=> $request->filename]);
           
       } 
     
     public function deleteAlbumImage(Request $request)
       {
          //  unlink(public_path("images/albumImages".$request->album_filename));
            $deleteImages = DB::table('cdx_report_album_images')->where('album_id', '=', $request->album_id)->delete();             
            return response()->json(['album_filename'=> $request->album_filename]);
           
       } 

   
 public function AlbumView(Request $request)
 {
      $report_id = $request->id;
      $getImages = DB::table('cdx_report_album_images')->where('report_id', '=', $report_id)->get();         
     return view('surveyor-admin/reports/albumManagment/viewAlbum', ['getImages' => $getImages]);

 }
}