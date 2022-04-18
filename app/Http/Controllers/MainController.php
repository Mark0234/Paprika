<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\MainModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $main = MainModel::find(1); //Пдключаем модель
        return view('welcome',['main' => $main]);
    }

    public function admin()
    {
        $main = MainModel::first();
        return view('admin',['main' => $main]);
    }
    

    public function main_process($id, Request $data)
    {      
        $review = MainModel::find($id);
        if(!empty($data->img_main)){
            $file = $data->file('img_main');
            $upload_folder = 'public/folder';
            $filename = $file->getClientOriginalName();
            Storage::delete($upload_folder .'/'. $review->img_main);
            $review->img_main = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $review->name_main = $data->input('name_main');
        $review->save();

        return redirect()->route('home')->with('success', 'Успешно добавлено');
    }
    
};