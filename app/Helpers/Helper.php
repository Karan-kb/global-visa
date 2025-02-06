<?php

namespace App\Helpers;

use Auth;
use Session;

use App\Models\Media;
use App\Models\Destination;
use App\Models\Info;
use App\Models\Service;
use App\Models\Course;


class Helper
{

    public static function getInfoValue($column)
    {
        
        $info = Info::first();
    
      
        return $info->{$column} ?? null;
    }
    

    public static function getCourse()
    {
        
        $courses = Course::where('is_active',1)->orderBy('created_at', 'DESC')->take(4)->get();
    
      
        return $courses ?? null;
    }


    public static function getGallery()
    {
        
        $images = Media::orderBy('created_at', 'DESC')->take(4)->get();
    
      
        return $images ?? null;
    }



    public static function getServices()
    {
        
        $services = Service::orderBy('created_at', 'DESC')->get();
    
      
        return $services ?? null;
    }

    public static function getDestinations()
    {
        
        $study_destinations = Destination::orderBy('created_at', 'DESC')->where('is_active',1)->get();
    
      
        return $study_destinations ?? null;
    }


  
    
}
