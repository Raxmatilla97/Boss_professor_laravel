<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\ProfessorController;

class TemporaryFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'document' => 'required|mimes:png,pdf,doc,docx,zip,rar,jpeg,jpg|max:5048',
        ]);

        if ($validator->fails()) {
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $file->storeAs('vaqtincha/tmp', $file->getClientOriginalName());
                Storage::delete(storage_path('app/vaqtincha/tmp/' . $file->getClientOriginalName()));
            }

            throw new ValidationException($validator);
        }


        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $destinationPath = '/public/upload/files'; // Yuklash uchun yangi yo'l

            $randomNumber = random_int(10000000000000000, 99999999999999999); // 10 xonali unikal raqam
            $filename = $randomNumber . '.' . $file->getClientOriginalExtension(); // Kengaytmani saqlab qolish bilan birga yangi fayl nomi 

            $file->storeAs($destinationPath, $filename); // Faylni yangi yo'l va yangi nom bilan saqlash

            // if($request->position == "Professor"){
            //     TemporaryFile::create([
            //         'folder' => $destinationPath,
            //         'filename' => $filename,              
            //         'professor_id' => $request->user_id
            //     ]);
            // }if ($request->position == "Moderator") {
            //     TemporaryFile::create([
            //         'folder' => $destinationPath,
            //         'filename' => $filename,              
            //         'moderator_id' => $request->user_id
            //     ]);
            // } else {
            //     TemporaryFile::create([
            //         'folder' => $destinationPath,
            //         'filename' => $filename,              
            //         'operator_id' => $request->user_id
            //     ]);
            // }

            TemporaryFile::create([
                'folder' => $destinationPath,
                'filename' => $filename
            ]);



            return $filename; // Saqlangan faylni to'liq yo'li bilan qaytaring
        }
    }

    public function search(TemporaryFile $files, Request $request)
    {
       
        $filter = TemporaryFile::whereNotNull('ariza_holati')->get();
        if ($request->name) {

            $murojatlar = $files->when($request->filled('name'), function (Builder $query) use ($request) {
                $name = '%' . $request->name . '%';
                return $query->whereHas('filesProfessor', function (Builder $q) use ($name) {
                    $q->where('fish', 'like', $name);
                })
                    ->orWhereHas('filesModerator', function (Builder $q) use ($name) {
                        $q->where('moder_fish', 'like', $name);
                    })
                    ->orWhereHas('filesOperator', function (Builder $q) use ($name) {
                        $q->where('oper_fish', 'like', $name);
                    });
            })->orderBy("created_at", 'desc')
                ->whereNotNull('ariza_holati')
                ->paginate(15);

        } else {
            // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
            $murojatlar = $files->whereNotNull('ariza_holati')->orderBy("created_at", 'desc')->paginate(15);

        }



        $murojatlar->getCollection()->each(function ($item) {
            // name xususiyatini belgilash
            $item->name = optional($item->filesProfessor)->fish
                ?? optional($item->filesModerator)->moder_fish
                ?? optional($item->filesOperator)->oper_fish
                ?? 'F.I.SH aniqlanmadi!';
        });


        $murojatlar->getCollection()->each(function ($item) {
            // Surat manzilini belgilash
            if ($item->professor_id && $item->filesProfessor && $item->filesProfessor->image) {

                $item->surat = '/uploads/professor_images/' . $item->filesProfessor->image;

            } elseif ($item->moderator_id && $item->filesModerator && $item->filesModerator->moder_image) {

                $item->surat = '/uploads/moderator_images/' . $item->filesModerator->moder_image;

            } elseif ($item->operator_id && $item->filesOperator && $item->filesOperator->oper_image) {

                $item->surat = '/uploads/operator_images/' . $item->filesOperator->oper_image;

            } else {

                $item->surat = "https://cspu.uz/storage/app/media/2023/avgust/i.webp"; // Standart surat manzili
            }
        });

        // Mavzularni chiqazish   
        foreach ($murojatlar as $item) {
            // mavzular metodi chaqirilmoqda va uning qaytarilgan qiymatlari saqlash
            $mavzular_turi = TemporaryFileController::mavzular([]);

            // $information->category_name qiymati mavjudligi va mavzular turi ichida mos kelishini tekshirish
            if (isset($mavzular_turi[$item->category_name])) {
                // Agar mos kelish topilsa, $information->category_name qiymatini yangilash
                $item->category_name = $mavzular_turi[$item->category_name];

            }

        }

        IndexController::calculateOperatorsPoints($murojatlar);

        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.murojatlar-list', compact('murojatlar', 'filter'));
    }

    public function category(TemporaryFile $files, $category = null)
    {

        $filter = TemporaryFile::whereNotNull('ariza_holati')->get();

        if ($category) {
            // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
            $murojatlar = $files->whereNotNull('ariza_holati')->where('ariza_holati', $category)->orderBy("created_at", 'desc')->paginate(15);
        } else {
            // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
            $murojatlar = $files->whereNotNull('ariza_holati')->orderBy("created_at", 'desc')->paginate(15);
        }



        $murojatlar->getCollection()->each(function ($item) {
            // name xususiyatini belgilash
            $item->name = optional($item->filesProfessor)->fish
                ?? optional($item->filesModerator)->moder_fish
                ?? optional($item->filesOperator)->oper_fish
                ?? 'F.I.SH aniqlanmadi!';
        });


        $murojatlar->getCollection()->each(function ($item) {
            // Surat manzilini belgilash
            if ($item->professor_id && $item->filesProfessor && $item->filesProfessor->image) {

                $item->surat = '/uploads/professor_images/' . $item->filesProfessor->image;

            } elseif ($item->moderator_id && $item->filesModerator && $item->filesModerator->moder_image) {

                $item->surat = '/uploads/moderator_images/' . $item->filesModerator->moder_image;

            } elseif ($item->operator_id && $item->filesOperator && $item->filesOperator->oper_image) {

                $item->surat = '/uploads/operator_images/' . $item->filesOperator->oper_image;

            } else {

                $item->surat = "https://cspu.uz/storage/app/media/2023/avgust/i.webp"; // Standart surat manzili
            }
        });

        // Mavzularni chiqazish   
        foreach ($murojatlar as $item) {
            // mavzular metodi chaqirilmoqda va uning qaytarilgan qiymatlari saqlash
            $mavzular_turi = TemporaryFileController::mavzular([]);

            // $information->category_name qiymati mavjudligi va mavzular turi ichida mos kelishini tekshirish
            if (isset($mavzular_turi[$item->category_name])) {
                // Agar mos kelish topilsa, $information->category_name qiymatini yangilash
                $item->category_name = $mavzular_turi[$item->category_name];

            }

        }

        IndexController::calculateOperatorsPoints($murojatlar);

        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.murojatlar-list', compact('murojatlar', 'filter'));
    }

    public function list(TemporaryFile $files)
    {
        $filter = TemporaryFile::whereNotNull('ariza_holati')->get();

        // Agar name parametri mavjud bo'lmasa, barcha moderatorlarni tartib bilan olish
        $murojatlar = $files->whereNotNull('ariza_holati')->orderBy("created_at", 'desc')->paginate(15);

        $murojatlar->getCollection()->each(function ($item) {
            // name xususiyatini belgilash
            $item->name = optional($item->filesProfessor)->fish
                ?? optional($item->filesModerator)->moder_fish
                ?? optional($item->filesOperator)->oper_fish
                ?? 'F.I.SH aniqlanmadi!';
        });


        $murojatlar->getCollection()->each(function ($item) {
            // Surat manzilini belgilash
            if ($item->professor_id && $item->filesProfessor && $item->filesProfessor->image) {

                $item->surat = '/uploads/professor_images/' . $item->filesProfessor->image;

            } elseif ($item->moderator_id && $item->filesModerator && $item->filesModerator->moder_image) {

                $item->surat = '/uploads/moderator_images/' . $item->filesModerator->moder_image;

            } elseif ($item->operator_id && $item->filesOperator && $item->filesOperator->oper_image) {

                $item->surat = '/uploads/operator_images/' . $item->filesOperator->oper_image;

            } else {

                $item->surat = "https://cspu.uz/storage/app/media/2023/avgust/i.webp"; // Standart surat manzili
            }
        });

        // Mavzularni chiqazish   
        foreach ($murojatlar as $item) {
            // mavzular metodi chaqirilmoqda va uning qaytarilgan qiymatlari saqlash
            $mavzular_turi = TemporaryFileController::mavzular([]);

            // $information->category_name qiymati mavjudligi va mavzular turi ichida mos kelishini tekshirish
            if (isset($mavzular_turi[$item->category_name])) {
                // Agar mos kelish topilsa, $information->category_name qiymatini yangilash
                $item->category_name = $mavzular_turi[$item->category_name];

            }

        }

        IndexController::calculateOperatorsPoints($murojatlar);

        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.murojatlar-list', compact('murojatlar', 'filter'));
    }



    public function show(TemporaryFile $temporaryFile, $id_number)
    {
        // Yuborilgan faylni qidirish
        $information = $temporaryFile->findOrFail($id_number);

        // Default surat buni o'zgartirsa bo'ladi
        $default_image = 'https://cspu.uz/storage/app/media/2023/avgust/i.webp';

        // Ismni belgilash manzilini belgilash
        if ($information->professor_id && $information->filesProfessor) {

            // Kordinator ballarini hisoblash
            $professor = $information->filesProfessor;
            ProfessorController::calculateProfessorPoints($professor, $professor->moderator);
            $information->custom_ball = $professor->custom_ball;

            // Kordinator ismini fish_infoga o'tqazish
            $information->fish_info = $professor->fish;

            // Kordinator suratini surat ga o'tqazish
            $information->surat = $professor->image
                ? '/uploads/professor_images/' . $information->filesProfessor->image
                : $default_image;

            // Kordinator mavzusini small_infoga o'tqazish
            $information->small_info = $information->filesProfessor->small_info;
            $information->small_info2 = $information->filesProfessor->small_info2;
            $information->muommo_text = $information->duch_kelingan_muommo;

        } elseif ($information->moderator_id && $information->filesModerator) {

            // Moderator ballarini hisoblash
            $moderator = $information->filesModerator;
            ModeratorController::calculateModeratorPoints($moderator);
            $information->custom_ball = $moderator->custom_ball;

            $information->fish_info = $information->filesModerator->moder_fish;

            $information->surat = $information->filesModerator->moder_image
                ? '/uploads/moderator_images/' . $information->filesModerator->moder_image
                : $default_image;

            // Moderator mavzusini small_infoga o'tqazish
            $information->small_info = $information->filesModerator->moder_small_info;

            $information->small_info2 = $information->filesModerator->moder_small_info2;

            $information->muommo_text = $information->duch_kelingan_muommo;

        } elseif ($information->operator_id && $information->filesOperator) {

            // Operator ballarini hisoblash
            $operator = $information->filesOperator;
            OperatorController::calculateOperatorPoints($operator);
            $information->custom_ball = $operator->custom_ball;

            $information->fish_info = $information->filesOperator->oper_fish;

            $information->surat = $information->filesOperator->oper_image
                ? '/uploads/operator_images/' . $information->filesOperator->oper_image
                : $default_image;

            // Operator mavzusini small_infoga o'tqazish
            $information->small_info = $information->filesOperator->oper_small_info;

            $information->small_info2 = $information->filesOperator->oper_small_info2;

            $information->muommo_text = $information->duch_kelingan_muommo;
            // dd($information->small_info2);

        } else {
            $information->surat = "https://cspu.uz/storage/app/media/2023/avgust/i.webp"; // Standart surat manzili
        }

        // mavzular metodi chaqirilmoqda va uning qaytarilgan qiymatlari saqlash
        $mavzular_turi = TemporaryFileController::mavzular([]);

        // $information->category_name qiymati mavjudligi va mavzular turi ichida mos kelishini tekshirish
        if (isset($mavzular_turi[$information->category_name])) {
            // Agar mos kelish topilsa, $information->category_name qiymatini yangilash
            $information->category_name = $mavzular_turi[$information->category_name];

        }

        return view('reyting.dashboard.murojatni-korish', compact('information'));
    }

    public static function mavzular($mavzular_turi)
    {
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
            'papers_local_journal' => "Respublika ilmiy jurnallarida (OAK ro‘yxatidagi)  chqarilgan ilmiy maqolalar ega",
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

        return $mavzular_turi;
    }

    public function murojatniTasdiqlash(Request $request)
    {
        $model = TemporaryFile::findOrFail($request->id); // Modelni topish

        // Validatsiya qoidalari
        $validator = Validator::make($request->all(), [
            'murojaat_holati' => 'required|string|max:255',
            'murojaat_bali' => 'nullable|numeric',
            'murojaat_izohi' => 'nullable|string'
        ], [
            'murojaat_holati.required' => 'Ma\'lumot holatini kiritish majburiy.',
            'murojaat_holati.string' => 'Ma\'lumot holati matn ko\'rinishida bo\'lishi kerak.',
            'murojaat_holati.max' => 'Ma\'lumot holati eng ko\'pi bilan 255 belgidan iborat bo\'lishi kerak.',
            'murojaat_bali.numeric' => 'Ma\'lumot bali raqam bo\'lishi kerak.',
            'murojaat_izohi.string' => 'Ma\'lumot izohi matn ko\'rinishida bo\'lishi kerak.'
        ]);

        // Agar murojaat_holati "maqullandi" ga teng bo'lsa, murojaat_bali majburiy bo'ladi
        $validator->sometimes('murojaat_bali', 'required|numeric', function ($input) {
            return $input->murojaat_holati == 'maqullandi';
        }, [
            'murojaat_bali.required' => 'Ma\'lumot holati "maqullandi" bo\'lganida, Ma\'lumot bali kiritish majburiy.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ma'lumotlarni yangilash      
        $model->ariza_holati = $request->murojaat_holati;
        $model->points = $request->murojaat_bali;
        $model->arizaga_javob = $request->murojaat_izohi;
        $model->save();

        // Bajarilganidan so'ng, foydalanuvchini kerakli sahifaga yo'naltiring
        return redirect()->back()->with('success', 'Ma\'lumot muvaffaqiyatli saqlandi');
    }

    public function destroy($fileId)
    {
        $file = TemporaryFile::where('id', $fileId)->firstOrFail();
        $file->delete();

        return redirect()->route('murojatlar.list')->with('toaster', ['success', "Ma'lumot o'chirildi!"]);
    }

}
