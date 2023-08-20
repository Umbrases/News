<?php

namespace App\Services;



use App\Models\News;

class Service
{

   public function store($request)
   {
       $date = $request->validate([
           'title' => 'max:30',
           'description' => '',
       ]);
       $id =  auth()->user()->id;
       News::create([
           'title' => $date['title'],
           'description' => $date['description'],
           'user_id' => $id,
       ]);
   }

   public function update($news, $request)
   {
       $date = $request->validate([
           'title' => 'max:30',
           'description' => '',
       ]);
       $news->update([
           'title' => $date['title'],
           'description' => $date['description'],
       ]);
   }
}
