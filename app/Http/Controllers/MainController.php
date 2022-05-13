<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\MainModel;
use App\Models\Main_homeModel;
use App\Models\MenuCategoryModel;
use App\Models\MenuCategoryCardModel;
use App\Models\BasketModel;
use App\Models\Const_pizza_Model;
use App\Models\Const_chudu_Model;
use App\Models\Add_arrange_Model;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $main = MainModel::first();
        $main_home = Main_homeModel::first(); //Пдключаем модель
        $category = MenuCategoryModel::all();
        $category_card = MenuCategoryCardModel::all();
        return view('welcome',['main' => $main, 'main_home' => $main_home,'category' => $category,'category_card' => $category_card]);
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

    public function add_category(Request $data)
    {
        $valid = $data->validate([
            'name' => ['required'],
        ]);

        $category = new MenuCategoryModel(); //Добовление  в базу
        $category->name = $data->input('name');
        $category->save();

        $category = new MenuCategoryModel();
        return $category->latest()->first(); //Вывести последнюю запись с базы
    }

    public function menu_category() {
        $category = new MenuCategoryModel();
        return json_encode($category->all()); //Вывести все как json массив
    }

    public function edit_category(Request $data, $id)
    {
        $valid = $data->validate([
            'name' => ['required'],
        ]);

        $category = MenuCategoryModel::find($id); //Редактирование  в базе
        $category->name = $data->input('name');
        $category->save();
    }
    //удаление категории
    public function delete_category($id)
    {
        MenuCategoryCardModel::where('type', '=', $id)->delete(); //удаление сначала карточек а потом категории
        MenuCategoryModel::find($id)->delete(); //Удаление  категории
    }

    public function add_category_card(Request $data, $id)
    {
        $valid = $data->validate([
            'img' => ['required', ],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $card = new MenuCategoryCardModel(); //Добовление  в базу
        $card->type = $id;
        $file = $data->file('img');
        $upload_folder = 'public/card';
        $filename = $file->getClientOriginalName();
        $card->img = $filename;
        Storage::putFileAs($upload_folder, $file, $filename);

        $card->name = $data->input('name');
        $card->description = $data->input('description');
        $card->price = $data->input('price');
        $card->save();

        $card = new MenuCategoryCardModel();
        return $card->latest()->first();  //Вывести последнюю запись с базы
    }
    //вывод в шаблон админки
    public function menu_category_card()
    {
        $category_card = new MenuCategoryCardModel();
        return $category_card->all(); //Вывести все записи с базы
    }

        // редактирование карточки в категории
    public function edit_category_card(Request $data, $id)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $category = MenuCategoryCardModel::find($id); //Редактирование  в базе
        if(!empty($data->img)){
            $file = $data->file('img');
            $upload_folder = 'public/card';
            $filename = $file->getClientOriginalName();
            Storage::delete($upload_folder .'/'. $category->img);
            $category->img = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);   //редактирование фото
        }
        $category->name = $data->input('name');
        $category->description = $data->input('description');
        $category->price = $data->input('price');
        $category->save();

        $categoryImg = MenuCategoryCardModel::latest()->first()->img;
        return $categoryImg;
    }

    public function delete_category_card($id)
    {
        MenuCategoryCardModel::find($id)->delete(); //Удаление  категории
    }

    public function card_basket($id)
    {
        $card_basket = MenuCategoryCardModel::find($id);
        return $card_basket;
    }

    public function add_basket($id) {
        $ip = $_SERVER['REMOTE_ADDR'];

        $basket = new BasketModel();
        $basket->user = $ip;
        $basket->product = $id;
        $basket->colvo = 1;
        $basket->save();
    }

    public function all_card() {
        $basket = BasketModel::where('user', '=', $_SERVER['REMOTE_ADDR'])->get();
        return $basket;
    }
    //вывод всего в шаблон продукты
    public function all_product() {
        $product = MenuCategoryCardModel::all();
        return $product;
    }
    //конструктор пиццы начала
    public function add_const_pizza(Request $data)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'gramm' => ['required'],
            'price' => ['required'],
        ]);

        $const_pizza = new Const_pizza_Model(); //Добовление  в базу
        $const_pizza->name = $data->input('name');
        $const_pizza->gramm = $data->input('gramm');
        $const_pizza->price = $data->input('price');
        $const_pizza->save();

        $const_pizza = new Const_pizza_Model();
        return $const_pizza->latest()->first(); //Вывести последнюю запись с базы
    }

    public function const_pizza_all() {
        $const_pizza = Const_pizza_Model::all();
        return $const_pizza;
    }

    public function edit_const_pizza(Request $data, $id)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'gramm' => ['required'],
            'price' => ['required'],
        ]);

        $const_pizza = Const_pizza_Model::find($id); //Редактирование  в базе
        $const_pizza->name = $data->input('name');
        $const_pizza->gramm = $data->input('gramm');
        $const_pizza->price = $data->input('price');
        $const_pizza->save();
    }

    public function delete_ingradient($id)
    {
        Const_pizza_Model::find($id)->delete(); //Удаление инградиентов
    }

    //конструктор чуду начало
    public function add_const_chudu(Request $data)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'gramm' => ['required'],
            'price' => ['required'],
        ]);

        $const_chudu = new Const_chudu_Model(); //Добовление  в базу
        $const_chudu->name = $data->input('name');
        $const_chudu->gramm = $data->input('gramm');
        $const_chudu->price = $data->input('price');
        $const_chudu->save();

        $const_chudu = new Const_chudu_Model();
        return $const_chudu->latest()->first(); //Вывести последнюю запись с базы
    }

    public function const_chudu_all() {
        $const_chudu = Const_chudu_Model::all();
        return $const_chudu;
    }

    public function edit_const_chudu(Request $data, $id)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'gramm' => ['required'],
            'price' => ['required'],
        ]);

        $const_chudu = Const_chudu_Model::find($id); //Редактирование  в базе
        $const_chudu->name = $data->input('name');
        $const_chudu->gramm = $data->input('gramm');
        $const_chudu->price = $data->input('price');
        $const_chudu->save();
    }

    public function delete_ingradient_chudu($id)
    {
        Const_chudu_Model::find($id)->delete(); //Удаление инградиентов
    }

    public function add_arrange(Request $data, $products)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'tel' => ['required', 'min:10' , 'max:12'],
            'address' => ['required'],
            'sposob' => ['required'],
        ]);

        $add_arrange = new Add_arrange_Model(); //Добовление  в базу
        $product = rtrim($products, ",");
        $add_arrange->product = $product;
        $add_arrange->sum = $data->input('sum');
        $add_arrange->name = $data->input('name');
        $add_arrange->tel = $data->input('tel');
        $add_arrange->address = $data->input('address');
        if($data->input('message') != '') {
            $add_arrange->message = $data->input('message');
        } else {
            $add_arrange->message = '';
        }
        $add_arrange->sposob = $data->input('sposob');
        $add_arrange->save();

        $zakaz = explode(",", $product);
        $card_zakaz = '';
        foreach($zakaz as $item) {
            $tovar_count = MenuCategoryCardModel::where('id', '=', trim(strstr($item, '.', true)))->count();
            if($tovar_count != 0) {
                $tovar = MenuCategoryCardModel::where('id', '=', trim(strstr($item, '.', true)))->first();
                $card_zakaz = $card_zakaz.$tovar->name.' ['.trim(strstr($item, '.'), '. ').'шт], ';
            } else {
                $card_zakaz = $card_zakaz.trim(strstr($item, '.', true)).' ['.trim(strstr($item, '.'), '. ').'шт], ';
            }
            
        }

        $token = "5325438919:AAH4TQZw759HBqm-mHe2q7dmyzKpq1X4Y-8";
        $chat_id = "-678718560";
        $arr = array(
            'Номер заказа: ' => $add_arrange->id,
            'Время: ' => date('Y-m-d').' - '.date('h-m'),
            'Имя: ' => $data->input('name'),
            'Телефон: ' => $data->input('tel'),
            'Адрес: ' => $data->input('address'),
            'Сообщение: ' => $data->input('message'),
            'Способ оплаты: ' => $data->input('sposob'),
            'Заказ: ' => rtrim($card_zakaz, ","),
            'Итого: ' => $data->input('sum').'₽',
        );

        $txt = '';

        foreach($arr as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
        };

        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

        // if($sendToTelegram) {
        // } else {
        //     echo "Ошибка";
        // }
    }

    public function constr($id){
        $const = Add_arrange_Model::find($id);
        return view('const',['item'=>$const]);
    }
};




