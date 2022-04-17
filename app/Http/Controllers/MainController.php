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
        return view('admin');
    }

    public function main_process(Request $data)
    {
        $valid = $data->validate([
       'img_main' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/Webp']
        ]);

        // загрузка файла
        $file = $data->file('img_main');
        $upload_folder = 'public/folder'; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения

        Storage::putFileAs($upload_folder, $file, $filename);

        $review = new MainModel();
        $review->img_main = $filename;
        $review->name_main = $data->input('name_main');
        $review->save();

        return redirect()->route('home')->with('success', 'Успешно добавлено!');
    }
    
}
