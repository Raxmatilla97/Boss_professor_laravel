<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Moderator;
use App\Models\Operator;
use App\Models\Files;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::with(['moderator.files', 'moderator.operator.files'])
            ->orderBy('created_at', 'desc')
            ->where('status', 1)
            ->paginate(8);

        $this->calculateProfessorsPoints($professors);

        return view('welcome', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inputlardan kelgan ma'lumotni tekshirish validatsiya qismi
        $validated = $this->validate($request, [
            "category_name" => "required|max:100",
            "user_id" => "required",
            "position" => "required",
            "site_url" => "nullable|string|min:3|max:300",
            "duch_kelingan_muommo" => "nullable|string",
        ], [
            'category_name.required' => "Yo'nalishni tanlashingiz kerak!",
            'user_id.required' => "Foydalanuvchi ID raqami aniqlanmadi! (Sahifani yangilab ko'ring)",
            'position.required' => "Foydalanuvchi mavqeyi aniqlanmadi! (Sahifani yangilab ko'ring)",
            "site_url.string" => "Sayt manzili matindan iborat bo'lishi kerak!",
            "site_url.min" => "Sayt manzili uzunligi eng kamida min: harfdam kotta bo'lishi kerak!",
            "site_url.max" => "Sayt manzili uzunligi eng ko'pida max: harfdam kichik bo'lishi kerak!",
          
          

        ]);

        // So'rovdan kelgan 'user_position' qiymatini olish
        $userPosition = $validated['position'];


        // 'user_id' ni 'user_position' asosida o'zgartirish
        $variableName = strtolower($userPosition) . '_id';

        // Agarda murojaat qabul bo'lsa bu haqda xabar beradigan text ma'zmuni
        $infogramma = "Siz yuborgan murojat qabul qilindi va u tez kunda ko'rib chiqiladi.";

        // Murojaat qabul bo'lgach yana murojaat yuborishni so'raganda kerak bo'ladigan number_slugni olish kodi
        $number_slug = $request->slug_number;
       
        // Murojatda fayl yuklangan yoki yuklanmaganligiga qarab uni qabul qilish shartlari 
        if (empty($request->document)) {

            // Agarda requestda document nomi kelmasa demak fayl yuklanmagan holda kelganligini bildiradi va u yaratiladi va user_id birlashtiriladi
            $request_create = TemporaryFile::create([
                'category_name' => $validated['category_name'],
                'site_url' => $validated['site_url'],
                $variableName => $validated['user_id'],
                'ariza_holati' => "kutulmoqda",
                'duch_kelingan_muommo' => $validated['duch_kelingan_muommo'],
                'filename' => null,
                'folder' => null
            ]);
          
            return redirect()->route('site.index')->with([
                'success' => $infogramma,
                'number_slug' => $number_slug
            ]);

        } else {

            // Agarda documentda nimadur kelgan bo'lsa demak fayl yuklangan va u faylni birinchi qidirib topib so'ng murojaatga biriktiriladi!
            $faylni_qidirish = TemporaryFile::where('filename', $request->document)->first();

            if ($faylni_qidirish) {

                // Fayl TemporaryFile dan chiqsa, murojaat yangilanadi va user id birlashtiriladi
                $faylni_qidirish->update([
                    'category_name' => $validated['category_name'],
                    'site_url' => $validated['site_url'],
                    $variableName => $validated['user_id'],
                    'ariza_holati' => "kutulmoqda"
                ]);
              
                return redirect()->route('site.index')->with([
                    'success' => $infogramma,
                    'number_slug' => $number_slug
                ]);

            } else {

                // Agarda if shartida fayl topilmasa bu haqda xabar beriladi!
                return redirect()->back()->with('error', "Fayl yuklangandan keyin uni qaytib DB dan topish imkoni bo'lmadi!");
            }


        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function kirishUchunSlugQidirish(Request $request)
    {
        // dd($request->code);

        if ($request->code) {
            $professor = Professor::where('slug_number', $request->code)->first();
            $moderator = Moderator::where('moder_slug_number', $request->code)->first();
            $operator = Operator::where('oper_slug_number', $request->code)->first();

            $mavzular_turi = TemporaryFileController::mavzular([]);


            if ($professor) {
                $user_info = [
                    'id' => $professor->id,
                    'slug_number' => $professor->slug_number,
                    'fish' => $professor->fish,
                    'position' => "Professor",
                    'theme' => $professor->small_info,
                    'image' => $professor->image,
                    'img_path' => "/uploads/professor_images"
                ];
                return view('reyting.frontend.malumot_yuborish_formasi', compact('user_info', 'mavzular_turi'));

            } elseif ($moderator) {
                $user_info = [
                    'id' => $moderator->id,
                    'slug_number' => $moderator->moder_slug_number,
                    'fish' => $moderator->moder_fish,
                    'position' => "Moderator",
                    'theme' => $moderator->moder_small_info,
                    'image' => $moderator->moder_image,
                    'img_path' => "/uploads/moderator_images"
                ];
                return view('reyting.frontend.malumot_yuborish_formasi', compact('user_info', 'mavzular_turi'));

            } elseif ($operator) {
                $user_info = [
                    'id' => $operator->id,
                    'slug_number' => $operator->oper_slug_number,
                    'fish' => $operator->oper_fish,
                    'position' => "Operator",
                    'theme' => $operator->oper_small_info,
                    'image' => $operator->oper_image,
                    'img_path' => "/uploads/operator_images"
                ];
                return view('reyting.frontend.malumot_yuborish_formasi', compact('user_info', 'mavzular_turi'));
            } else {
                // Agar kod mavjud emas bo'lsa, foydalanuvchiga xabar berish
                return redirect()->back()->with('error', "Bunday kod mavjud emas!");
            }
        } else {
            // Agar kod kiritilmagan bo'lsa, 404 xatolikni chiqaring yoki bosh sahifaga yo'naltiring
            return redirect()->back()->with('error', "Bunday kod mavjud emas!");
        }
    }

    public function show($slug_number)
    {
        $professor = Professor::with(['moderator.files', 'files', 'moderator.operator.files'])
            ->where('slug_number', $slug_number)
            ->firstOrFail();



        // Professor va unga bog'liq moderatorlar uchun ballarni hisoblash
        $professor->custom_ball = $this->calculatePointsForFiles($professor->files ?? []);

        $professor_moder = $professor->moderator()->orderBy('created_at', 'desc')->get();

        foreach ($professor_moder as $moderator) {
            $moderatorPoints = $this->calculatePointsForFiles($moderator->files ?? []);

            // Operatorlar uchun ballarni hisoblash va moderator ballariga qo'shish
            foreach ($moderator->operator as $operator) {
                $operatorPoints = $this->calculatePointsForFiles($operator->files ?? []);
                $moderatorPoints += $operatorPoints;
                $operator->oper_custom_ball = $operatorPoints;
            }

            // Moderatorning umumiy ballarini professorning ballariga qo'shish
            $professor->custom_ball += $moderatorPoints;
            $moderator->custom_ball = $moderatorPoints;
        }

        return view('reyting.frontend.showProfessor', compact('professor', 'professor_moder'));
    }


    public static function calculatePointsForFiles($files)
    {
        $totalPoints = 0;
        $mavzular_turi = []; // Boshlang'ich qiymat sifatida bo'sh massiv


        $mavzular_turi = TemporaryFileController::mavzular([]);

        foreach ($files as $file) {
            // Agar mavzular turi mavjud bo'lsa, uni qo'llash
            if (array_key_exists($file->category_name, $mavzular_turi)) {
                $file->category_name = $mavzular_turi[$file->category_name];
            }

            if ($file->is_active == 1 && $file->ariza_holati == "maqullandi") {
                $totalPoints += $file->points;
            }
        }

        return $totalPoints;
    }


    public static function calculateProfessorsPoints($professors)
    {

        foreach ($professors as $professor) {
            $professor->custom_ball = self::calculatePointsForFiles($professor->files ?? []);

            foreach ($professor->moderator as $moderator) {
                $moderatorPoints = self::calculatePointsForFiles($moderator->files ?? []);

                foreach ($moderator->operator as $operator) {
                    $operatorPoints = self::calculatePointsForFiles($operator->files ?? []);
                    $moderatorPoints += $operatorPoints;
                    $operator->oper_custom_ball = $operatorPoints;
                }

                $professor->custom_ball += $moderatorPoints;
                $moderator->custom_ball = $moderatorPoints;
            }
        }

        return $professors;
    }

    public static function calculateModeratorsPoints($moderators)
    {

        foreach ($moderators as $moderator) {
            $moderatorPoints = self::calculatePointsForFiles($moderator->files ?? []);

            foreach ($moderator->operator as $operator) {
                $operatorPoints = self::calculatePointsForFiles($operator->files ?? []);
                $moderatorPoints += $operatorPoints;
                $operator->oper_custom_ball = $operatorPoints;
            }

            $moderator->custom_ball = $moderatorPoints;
        }


        return $moderators;
    }


    public static function calculateOperatorsPoints($operators)
    {

        foreach ($operators as $operator) {
            $operatorPoints = self::calculatePointsForFiles($operator->files ?? []);
            $operator->oper_custom_ball = $operatorPoints;
        }

        return $operators;
    }


}
