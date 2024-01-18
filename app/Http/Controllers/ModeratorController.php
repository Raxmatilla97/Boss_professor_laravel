<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Models\Files;
use App\Http\Controllers\IndexController;

class ModeratorController extends Controller
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

        $professor_info = ['id' => $professor->id, 'slug' => $professor->slug_number];

        return view('reyting.dashboard.professor.frogments.edit.moderatorCreateForm', compact('professor_info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Moderator ma'lumotlarini validatsiyasi

        $validated = $this->validate($request, [
            "moder_fish" => "required|string|min:5|max:100",
            "moder_small_info" => "nullable|string",
            "moder_status" => "boolean",
            'professor_id' => 'required|integer'

        ], [
            'moder_fish.required' => 'F.I.SH maydoni majburiy.',
            'moder_fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'moder_fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'moder_fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'small_info.string' => 'Moderator haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);      

        // Professor sahifasiga qaytish uchun uni aniqlash kodi      

        $professor = Professor::find($request->professor_id);

        if ($professor) {

            $professor_slug = $professor->slug_number;

        } else {

            return redirect()->back()->with('error', "Professor topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }
   
        // Foydalanuvchi tomonidan rasm yuborilganligini tekshirish
        if ($request->hasFile('moder_image') && $request->file('moder_image')->isValid()) {
            // Foydalanuvchi tomonidan yuborilgan rasmni saqlash
            $tempPath = $request->moder_image->path();
            $fileName = time() . '.' . $request->moder_image->extension();
            $publicPath = public_path('uploads/moderator_images/' . $fileName);

            // Rasmni public papkaga ko'chirish
            move_uploaded_file($tempPath, $publicPath);

            // Saqlangan rasmdan foydalanish
            $imagePath = 'uploads/moderator_images/' . $fileName;
        } else {
            // Agar foydalanuvchi tomonidan rasm yuborilmagan bo'lsa, default rasmdan foydalanish
            $fileName = 'default.webp'; // Bu yerda default rasmning yo'lini ko'rsating
        }

        // Slug uchun generatsiya ko    di

        $lowercase_letters = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $random_string = substr(str_shuffle($lowercase_letters), 0, 3) .
            substr(str_shuffle($uppercase_letters), 0, 3) .
            substr(str_shuffle($numbers), 0, 3) .
            substr(str_shuffle($lowercase_letters . $uppercase_letters . $numbers), 0, 3);

        $slug_number = $random_string;

        // Professor modelini yaratish va ma'lumotlarni saqlash
        $moderator = Moderator::create([
            'moder_fish' => $validated['moder_fish'],
            'moder_image' => $fileName,
            'moder_slug_number' => $slug_number,
            'moder_status' => $validated['moder_status'] ?? 0,
            'moder_small_info' => $validated['moder_small_info'],
            'professor_id' => $validated['professor_id']
        ]);

        return redirect()->to(route('professors.edit', $professor_slug) . '#moder')->with('toaster', ['success', "(" . $request->moder_fish . ") moderator sifatida yaratildi!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Moderator $moderator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug_number)
    {

        $moderator = Moderator::find($slug_number);


        if ($moderator) {

            $moderator_slug = $moderator->moder_slug_number;

        } else {

            return redirect()->back()->with('error', "Moderator topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }



        return view('reyting.dashboard.moderators.edit', compact('moderator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moderator $moderator)
    {
        $validated = $this->validate($request, [
            "moder_fish" => "required|string|min:5|max:100",
            "moder_image" => "nullable|mimes:png,jpg,jpeg,webp|max:3024",
            "moder_status" => "boolean",
            'moder_small_info' => 'nullable|string'
        ], [
            'moder_fish.required' => 'F.I.SH maydoni majburiy.',
            'moder_fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'moder_fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'moder_fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'moder_image.required' => 'Rasm majburiy! rasm joylashingiz kerak.',
            'moder_image.mimes' => 'Rasm png, jpg, jpeg turlaridan biri bo\'lishi kerak.',
            'moder_image.max' => 'Rasm :max kilobaytdan katta bo\'lmasligi kerak.',
            'moder_small_info.string' => 'Moderator haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);

        $moder_status = $validated['moder_status'] ?? 0;
        $validated['moder_status'] = $moder_status;

        if ($request->hasFile('moder_image')) {
            $tempPath = $request->moder_image->path(); // Temp fayl joylashuvi
            $fileName = time() . '.' . $request->moder_image->extension();
            $publicPath = public_path('uploads/moderator_images/' . $fileName); // Public fayl joylashuvi
        
            // Faylni temp papkadan public papkaga ko'chirish
            move_uploaded_file($tempPath, $publicPath);
        
            // Yangi fayl nomini validated ma'lumotlarga qo'shish
            $validated['moder_image'] = $fileName;
        } else {
            // Foydalanuvchi rasm yubormagan taqdirda, default rasmni belgilash
            $defaultImageName = 'default.webp'; // Bu yerda sizning default rasmingizning nomini kiriting
            $validated['moder_image'] = $defaultImageName;
        }

          

        

        $moderator->update($validated);

        return redirect()->route('professors.edit', $moderator->professor->slug_number)->with('toaster', ['success', "Moderator ma'lumotlari o'zgartirildi"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moderator $moderator)
    {
        try {

            // Modelni o'chirish
            $moderator->delete();

            // Foydalanuvchiga xabar yuborish
            return redirect()->route('professors.edit', $moderator->professor->slug_number)->with('toaster', ['success', "Moderator ma'lumotlari o'chirildi"]);

        } catch (\Exception $e) {

            // Agar xatolik yuz berib qolsa, foydalanuvchiga xabar yuborish
            return redirect()->route('professors.edit', $moderator->professor->slug_number)->with('error', "Moderator topilmadi! Sahifani yangilab qayta urunib ko'ring.");
        }
    }

    public function list(Moderator $moderator, Request $request)
    {
        // Agar name parametri mavjud bo'lsa, shu nomga mos keladigan moderatorlarni qidirish
        if ($request) {
            $moderators = $moderator->where('moder_fish', 'like', '%' . $request->name . '%')
                ->orderBy("created_at", 'desc')
                ->paginate(10);
        } else {
            // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
            $moderators = $moderator->orderBy("created_at", 'desc')->paginate(10);
        }

        // Moderator ballarini hisoblash
        $moderators = IndexController::calculateModeratorsPoints($moderators);

        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.moderators.list', compact('moderators'));
    }

    public static function calculateModeratorPoints($moderator){

        $moderatorPoints = IndexController::calculatePointsForFiles($moderator->files ?? []);
        
        foreach ($moderator->operator as $operator) {
            $operatorPoints = IndexController::calculatePointsForFiles($operator->files ?? []);
            $moderatorPoints += $operatorPoints;          
        }         

            return $moderator->custom_ball = $moderatorPoints;
        }
}














