<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\MainModel;
use App\Models\Main_homeModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $main = MainModel::first();
        $main_home = Main_homeModel::first(); //Пдключаем модель
        return view('welcome',['main' => $main, 'main_home' => $main_home]);
    }

    public function admin()
    {
        if(MainModel::count() == 0) {
            $main = new MainModel();
            $main->img_main = 'logo.png';
            $main->name_main = 'Паприка';
            $main->save();
        }

        if(Main_homeModel::count() == 0) {
            $main_home = new Main_homeModel();
            $main_home->name = 'Паприка Дербент';
            $main_home->slogan = 'Быстрая доставка еды';
            $main_home->images = 'pizza.png';
            $main_home->description = 'Самая вкусная да только у нас. Закажите и получите скидку';
            $main_home->servis_a = 'Быстрая доставка';
            $main_home->servis_b = 'Режим работы с 18:00 до 23:00';
            $main_home->servis_c = 'Самое вкусное';
            $main_home->save();
        }
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

    public function main_home_process()
    {
        $main_home = new Main_homeModel();
        return json_encode($main_home->first());
    }

    public function main_home_edit(Request $data)
    {
        $main_home = Main_homeModel::first();
        $main_home->name = $data->input('name');
        $main_home->slogan = $data->input('slogan');
        if(!empty($data->images)){
            $file = $data->file('images');
            $upload_folder = 'public/main_home';
            $filename = $file->getClientOriginalName();
            Storage::delete($upload_folder .'/'. $main_home->images);
            $main_home->images = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }
        $main_home->description = $data->input('description');
        $main_home->servis_a = $data->input('servis_a');
        $main_home->servis_b = $data->input('servis_b');
        $main_home->servis_c = $data->input('servis_c');

        $main_home->save();

        return $main_home;
    }
    
};