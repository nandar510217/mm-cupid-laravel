<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Utility{
    public static function addCreatedBy($data)
    {
        if(Auth::guard('admin')->user() != null){
            $data['created_by'] = Auth::guard('admin')->user()->id;
            $data['updated_by'] = Auth::guard('admin')->user()->id;
        }
        return $data;
    }

    public static function addUpdatedBy($data)
    {
        if(Auth::guard('admin')->user() != null){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = Auth::guard('admin')->user()->id;
        }
        return $data;
    }

    public static function saveDebugLog($screen_info, $query_log) 
    {
        // dd($query_log);
        $formattedQueries = '';
        foreach($query_log as $query){
            $sqlQuery = $query['query'];
            foreach($query['bindings'] as $binding){
                $sqlQuery = preg_replace('/\?/', "'" . $binding . "'", $sqlQuery, 1);
            }
            $formattedQueries .= $sqlQuery . PHP_EOL;
        }
        Log::debug($screen_info . $formattedQueries);
    }   

    public static function saveErrorLog($screen_info, $error_msg){
        Log::error($screen_info . $error_msg);
    }

    public static function convertmdYFormat ($dateOfBirth) {
        $timestamp = strtotime($dateOfBirth);
        $formattedDate = date('m/d/Y', $timestamp);
        return $formattedDate;
    }
    public static function convertmdYmdFormat ($dateOfBirth) {
        $timestamp = strtotime($dateOfBirth);
        $formattedDate = date('Y-m-d', $timestamp);
        return $formattedDate;
    }
}
