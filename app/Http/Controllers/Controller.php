<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function breadcrumb($data)
//    {
//        $breadcrumb = ['trang chủ'];
//        if (isset($data['class'])) {
//            array_push($breadcrumb, $data['class']);
//        }
//        if (isset($data['subject']) && $data['class'] != 'Mới nhất') {
//            array_push($breadcrumb, $data['subject']);
//        }
//        if (isset($data['post'])) {
//            if (!in_array($data['post']->class, $breadcrumb)) {
//                array_push($breadcrumb, $data['post']->class);
//            }
//            if (!in_array($data['post']->subject, $breadcrumb)) {
//                array_push($breadcrumb, $data['post']->subject);
//            }
//            array_push($breadcrumb, $data['post']->title);
//        }
//        return $breadcrumb;
//    }
}
