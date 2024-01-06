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

        $validated = $this->validate($request, [
            "category_name" => "required|max:100",
            "user_id" => "required",
            "position" => "required",
            "site_url" => "nullable|string|min:3|max:300",
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

        $infogramma = "Siz yuborgan murojat qabul qilindi va u tez kunda ko'rib chiqiladi.";

        if (empty($request->document)) {

            $request_create = TemporaryFile::create([
                'category_name' => $validated['category_name'],
                'site_url' => $validated['site_url'],
                $variableName => $validated['user_id'],
                'ariza_holati' => "kutulmoqda",
                'filename' => "Yuklanmagan!",
                'folder' => "null"
            ]);

            return redirect()->route('site.index')->with('success', $infogramma);

        } else {

            $faylni_qidirish = TemporaryFile::where('filename', $request->document)->first();

            if ($faylni_qidirish) {

                $faylni_qidirish->update([
                    'category_name' => $validated['category_name'],
                    'site_url' => $validated['site_url'],
                    $variableName => $validated['user_id'],
                    'ariza_holati' => "kutulmoqda"
                ]);

                return redirect()->route('site.index')->with('success', $infogramma);

            } else {

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

            $mavzular_turi = $this->mavzular();


            if ($professor) {
                $user_info = [
                    'id' => $professor->id,
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

        $mavzular_turi = [
            'world_top1000_phd_dsc' => "Dunyoning nufuzli 1000 taligiga kiruvchi OTMlarning PhD yoki DSc ilmiy darajasini olgan",
            'world_top1000_lectures' => "Dunyoning nufuzli 1000 taligiga kiruvchi OTMlarida o‘quv mashg‘ulotlari o‘tkazgan",
            'prof_title' => "Professor unvoniga ega",
            'dsc' => "Fan doktori (DSc) ilmiy darajasiga ega",
            'assoc_prof' => "Dotsent unvoniga ega",
            'phd' => "Fan nomzodi (PhD) ilmiy darajasiga ega",
            'h_index_wos' => "«Web of Science» bazasida h-indeksiga ega (indeksga ko'paytiriladi)",
            'h_index_scopus' => "«Scopus» bazasida h-indeksiga ega  (indeksga ko'paytiriladi)",
            'citations_wos' => "«Web of Science» bazasida mavjud bo‘lgan iqtiboslar ",
            'citations_scopus' => "«Scopus» bazasida mavjud bo‘lgan iqtiboslar (iqtiboslar soniga ko'paytiriladi)",
            'citations_gscholar' => "«Google Scholar» bazasida iqtiboslarga ega",
            'papers_wos_scopus' => "«Web of Science», «Scopus» bazasiga kiritilgan jurnallarda chqarilgan maqolaga ega ",
            'papers_int_journal' => "Xalqaro jurnallarda (OAK ro‘yxatidagi)  chqarilgan ilmiy maqolaga ega ",
            'papers_local_journal' => "Respublika ilmiy jurnallarida (OAK ro‘yxatidagi)  chqarilgan ilmiy maqolalar  ega ",
            'foreign_grants' => "Xorijiy ilmiy tadqiqot markazlari grantlari va xorijiy ilmiy fondlari mablag‘lariga (eng kamida 50 mln. so'm) ega (koordinator)",
            'industrial_funds' => "Sohalar buyurtmalari asosida o‘tkazilgan tadqiqotlardan olingan mablag‘larga (eng kamida 15 mln. so'm) ega (koordinator)",
            'state_grants' => "Davlat grantlari asosida o‘tkazilgan tadqiqotlardan olingan mablag‘larga ega (eng kamida 30 mln. so'm) (koordinator)",
            'monographs' => "Nashr etilgan monografiyalarga ega ",
            'patents' => "Intellektual mulk uchun olingan himoya hujjatlari (patentlar)ga ega ",
            'ict_certifications' => "Axborot-kommunikatsiya texnologiyalariga oid dasturlar va elektron bazalari uchun olingan guvohnomalar, mualliflik huquqi bilan himoya qilinadigan turli materiallarga ega ",
            'textbooks' => "Darsliklarga ega",
            'guides' => "O‘quv qo‘llanmalarga ega",
            'int_confs' => "Xalqaro konferensiya va seminarlarda, ilmiy yoki ta’lim loyihalarida (xorijiy, qo‘shma) ishtirok etgan ",
            'foreign_lang_courses' => "Horijiy tilda o‘qitiladigan o‘quv kurs(fan)lariga ega ",
            'int_comp_awards' => "Xalqaro olimpiadalarda va nufuzli tanlovlarda sovrinli o‘rinlarni qo‘lga kiritgan ",
            'pres_scholarship' => "O‘zbekiston Respublikasi Prezidenti davlat stipendiyasi sovrindori bo‘lgan",
            'nat_comp_awards' => "Respublika olimpiadalarda va nufuzli tanlovlarda sovrinli o‘rinlarni qo‘lga kiritgan"
        ];
       
        foreach ($files as $file) {
            if ($file->is_active == 1 && $file->ariza_holati == "maqullandi") {
                // Agar mavzular turi mavjud bo'lsa, uni qo'llash
                if (array_key_exists($file->category_name, $mavzular_turi)) {
                    $file->category_name = $mavzular_turi[$file->category_name];
                }

                $totalPoints += $file->points;
            }
        }

        return $totalPoints;
    }


public static function calculateProfessorsPoints($professors){

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

public static function calculateModeratorsPoints($moderators){   

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


}
