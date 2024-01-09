<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            $destinationPath = '/upload/files'; // Yuklash uchun yangi yo'l
        
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


    
    
    public function list(TemporaryFile $files, Request $request)
    {
        $murojatlar = $files->when($request->filled('name'), function ($query) use ($request) {
            return $query->where('filename', 'like', '%' . $request->name . '%');
        })
        ->orderBy("created_at", 'desc')
        ->paginate(20);
       
        $murojatlar->getCollection()->each(function ($item) {
            // name xususiyatini belgilash
            $item->name = optional($item->filesProfessor)->fish 
                ?? optional($item->filesModerator)->moder_fish 
                ?? optional($item->filesOperator)->oper_fish 
                ?? 'Default Name';
        });

        foreach ($murojatlar as $item) {

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

             // Agar mavzular turi mavjud bo'lsa, uni qo'llash
             if (array_key_exists($item->category_name, $mavzular_turi)) {
                $item->category_name = $mavzular_turi[$item->category_name];
            }
        }
    
        IndexController::calculateOperatorsPoints($murojatlar);
    
        // Natijani ko'rsatish uchun ko'rinishni qaytarish
        return view('reyting.dashboard.murojatlar-list', compact('murojatlar'));
    }
    
    

}
