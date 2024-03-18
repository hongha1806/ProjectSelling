<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(){
        $data =[
            'subject' => 'Cambo Tutorial Mail',
            'body' => 'Hello This is my email delivery'
        ];
        try {
            Mail::to('nguyenthihonghatchl@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great check your mail box']);
        } catch (Exception $th){
            return response()->json(['Sorry']);
        }
    }
}
