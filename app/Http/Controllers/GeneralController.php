<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemmmRequest;
use App\Libraries\Repositories\mmmRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class GeneralController extends AppBaseController
{

    public function articleupload()
    {
       $input =  \Request::file('file');

        //dd($input);
        $rules = array(
            'file' => 'image|max:10000'
        );

       // var_dump($input);
        $validation = \Validator::make(\Request::all(), $rules);

        if ($validation->fails()) {
            return FALSE;
        } else {
            $file = \Request::file('file');

            if ($file->move('files', $file->getClientOriginalName() )) {


                return \Response::json(array('filelink' => '/files/' . $file->getClientOriginalName()));
            } else {
                return FALSE;
            }

//            if ($file->move('files', $file->getClientOriginalName())) {
//                return Response::json(array('filelink' => '/files/' . $file->getClientOriginalName()));
//            } else {
//                return FALSE;
//            }
        }
    }

    public function dashboard()
    {
        //$pages = \page::count();
        $pages = \App\Models\page::count();
        return view('admin/dashboard2', compact('pages'));
    }
}