<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Http\Controllers\IndexController;
class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($request)
    {

        $professor = Professor::find($request);


        if ($professor) {

            $professor_slug = $professor->slug_number;

        } else {

            return redirect()->back()->with('error', "Professor topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }
        $professor_moderators = $professor->moderator()->orderBy('moder_fish', 'asc')->get();
        $professor_info = ['id' => $professor->id, 'slug' => $professor->slug_number];

        return view('reyting.dashboard.professor.frogments.edit.OperatorCreateForm', compact('professor_info', 'professor_moderators', 'professor'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "oper_fish" => "required|string|min:5|max:100",
            "oper_image" => "nullable|mimes:png,jpg,jpeg,webp|max:3024",
            "oper_status" => "boolean",
            "oper_small_info" => 'nullable|string',
            "oper_small_info2" => 'nullable|string'

        ], [
            'oper_fish.required' => 'F.I.SH maydoni majburiy.',
            'oper_fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'oper_fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'oper_fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'oper_image.required' => 'Rasm majburiy! rasm joylashingiz kerak.',
            'oper_image.mimes' => 'Rasm png, jpg, jpeg turlaridan biri bo\'lishi kerak.',
            'oper_image.max' => 'Rasm :max kilobaytdan katta bo\'lmasligi kerak.',
            'oper_small_info.string' => 'Professor haqida ma\'lumot maydoni matn bo\'lishi kerak.'
        ]);


        if ($request->hasFile('oper_image') && $request->file('oper_image')->isValid()) {
            // Foydalanuvchi tomonidan yuborilgan rasmni qabul qilish va uni serverga saqlash
            $tempPath = $request->oper_image->path(); // Temp fayl joylashuvi
            $fileName = time() . '.' . $request->oper_image->extension();
            $publicPath = public_path('uploads/operator_images/' . $fileName); // Public fayl joylashuvi
        
            // Faylni temp papkadan public papkaga ko'chirish
            move_uploaded_file($tempPath, $publicPath);
        } else {
            // Foydalanuvchi rasm yubormagan taqdirda, default rasmni belgilash
            $fileName = 'default.webp'; // Bu yerda sizning default rasmingizning nomini kiriting
            // E'tibor bering, default rasm oldindan sizning public papkangizda bo'lishi kerak
        }

        $name_tekshirish =  Operator::where('oper_fish', $validated['oper_fish'])->first();

        if($name_tekshirish){
            return redirect()->back()->with('error', "$name_tekshirish->oper_fish nomli Operator ro'yxatdan o'tqazilgan!");
        }
        

        // Slug uchun generatsiya kodi

        $lowercase_letters = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $random_string = substr(str_shuffle($lowercase_letters), 0, 3) .
            substr(str_shuffle($uppercase_letters), 0, 3) .
            substr(str_shuffle($numbers), 0, 4) .
            substr(str_shuffle($lowercase_letters . $uppercase_letters . $numbers), 0, 4);


        $slug_number = $random_string;

        // Moderator id olinganmi yoki yo'qmi tekshirish

        if ($request->moderator_id == null or $request->moderator_id == '') {
            return redirect()->back()->with('error', "Moderator topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }

        // Professor id olinganligini tekshirish

        if ($request->professor_id == null or $request->professor_id == '') {
            return redirect()->back()->with('error', "Moderator topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }


        // Professor modelini yaratish va ma'lumotlarni saqlash
        $operator = Operator::create([
            'oper_fish' => $validated['oper_fish'],
            'oper_image' => $fileName,
            'oper_status' => $validated['oper_status'] ?? 0,
            'oper_small_info' => $validated['oper_small_info'],
            'oper_small_info2' => $validated['oper_small_info2'],
            'oper_slug_number' => $slug_number,
            'moderator_id' => $request->moderator_id
        ]);

        return redirect()->route('professors.edit', [$request->professor_id, '#oper'])->with('toaster', ['success', "(" . $validated['oper_fish'] . ") operator sifatida yaratildi!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug_number)
    {

        $operator = Operator::find($slug_number);


        if ($operator) {

            $operator_slug = $operator->oper_slug_number;

        } else {

            return redirect()->back()->with('error', "Operator topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }



        return view('reyting.dashboard.operators.edit', compact('operator'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {

        $validated = $this->validate($request, [
            "oper_fish" => "required|string|min:5|max:100",
            "oper_image" => "nullable|mimes:png,jpg,jpeg|max:3024",
            "oper_status" => "boolean",
            'oper_small_info' => 'nullable|string',
            'oper_small_info2' => 'nullable|string'
        ], [
            'oper_fish.required' => 'F.I.SH maydoni majburiy.',
            'oper_fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'oper_fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'oper_fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'oper_image.required' => 'Rasm majburiy! rasm joylashingiz kerak.',
            'oper_image.mimes' => 'Rasm png, jpg, jpeg turlaridan biri bo\'lishi kerak.',
            'oper_image.max' => 'Rasm :max kilobaytdan katta bo\'lmasligi kerak.',
            'oper_small_info.string' => 'Operator haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);

        $oper_status = $validated['oper_status'] ?? 0;
        $validated['oper_status'] = $oper_status;


        if ($request->hasFile('oper_image')) {
            $tempPath = $request->oper_image->path(); // Temp fayl joylashuvi
            $fileName = time() . '.' . $request->oper_image->extension();
            $publicPath = public_path('uploads/operator_images/' . $fileName); // Public fayl joylashuvi

            // Faylni temp papkadan public papkaga ko'chirish
            move_uploaded_file($tempPath, $publicPath);

            // Yangi fayl nomini validated ma'lumotlarga qo'shish
            $validated['oper_image'] = $fileName;
        }


        $operator->update($validated);

        return redirect()->route('professors.edit', $operator->moderator->professor->slug_number)->with('toaster', ['success', "Operator ma'lumotlari o'zgartirildi"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $operator = Operator::where('id', $id)->firstOrFail();
        $operator->delete();

        return redirect()->route('professors.edit', $operator->moderator->professor->slug_number)->with('toaster', ['success', "Operator o'chirildi!"]);
    }
    
    public function list(Operator $operator, Request $request)
    {
        // Agar name parametri mavjud bo'lsa, shu nomga mos keladigan moderatorlarni qidirish
        if ($request) {
            $operators = $operator->where('oper_fish', 'like', '%' . $request->name . '%')
                ->orderBy("created_at", 'desc')
                ->paginate(30);               
        } else {
            // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
            $operators = $operator->orderBy("created_at", 'desc')->paginate(30);
        }
        IndexController::calculateOperatorsPoints($operators);

        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.operators.list', compact('operators'));
    }


    public static function calculateOperatorPoints($operator){
      
        $operatorPoints = IndexController::calculatePointsForFiles($operator->files ?? []);      
            
        $operator->custom_ball = $operatorPoints;   

        return  $operator->custom_ball;
    }










}
