<?php

namespace App\Http\Controllers;

use App\Http\Controllers\IndexController;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        
        $professors = Professor::paginate(25);

        IndexController::calculateProfessorsPoints($professors);


        return view('reyting.dashboard.professor.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reyting.dashboard.professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "fish" => "required|string|min:5|max:100",
            "image" => "required|mimes:png,jpg,jpeg|max:3024",
            "status" => "boolean",
            'small_info' => 'nullable|string'
        ], [
            'fish.required' => 'F.I.SH maydoni majburiy.',
            'fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'image.required' => 'Rasm majburiy! rasm joylashingiz kerak.',
            'image.mimes' => 'Rasm png, jpg, jpeg turlaridan biri bo\'lishi kerak.',
            'image.max' => 'Rasm :max kilobaytdan katta bo\'lmasligi kerak.',            
            'small_info.string' => 'Kordinator haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);
    
        $tempPath = $request->image->path(); // Temp fayl joylashuvi
        $fileName = time().'.'.$request->image->extension();
        $publicPath = public_path('uploads/professor_images/'.$fileName); // Public fayl joylashuvi
    
        // Faylni temp papkadan public papkaga ko'chirish
        move_uploaded_file($tempPath, $publicPath);

        // Slug uchun generatsiya kodi

        $lowercase_letters = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $random_string = substr(str_shuffle($lowercase_letters), 0, 4) .
                        substr(str_shuffle($uppercase_letters), 0, 4) .
                        substr(str_shuffle($numbers), 0, 5) .
                        substr(str_shuffle($lowercase_letters.$uppercase_letters.$numbers), 0, 6);
                        
     
        $slug_number = $random_string;
        // Professor modelini yaratish va ma'lumotlarni saqlash
        $professor = Professor::create([
            'fish' => $validated['fish'],
            'image' => $fileName,
            'status' => $validated['status'] ?? 0,
            'small_info' => $validated['small_info'],
            'slug_number' => $slug_number
        ]);
    
        return redirect()->route('professors.edit', $professor->slug_number)->with('toaster', ['success', "Yangi kordinator yaratildi!"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        return view('reyting.dashboard.professor.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($slug_number)
    {               
        $professor = Professor::where('slug_number', $slug_number)->firstOrFail();
        $professor_moder = $professor->moderator()->orderBy('created_at', 'desc')->paginate(12);
        $professor_moder_operators_create = $professor->moderator()->orderBy('moder_fish', 'asc')->paginate(12);
        
        // Operatorlar ro'yxati va ballarini hisoblash
        $professor_operators_list = $professor->operators()->orderBy('created_at', 'desc')->get();       
        $professor_operators_list = IndexController::calculateOperatorsPoints($professor_operators_list);

        $this->calculateProfessorPoints($professor, $professor_moder);
 
       
        return view('reyting.dashboard.professor.edit', compact('professor', 'professor_moder', 'professor_moder_operators_create', 'professor_operators_list'));
    }

    public static function calculateProfessorPoints($professor, $professor_moder){
     
        // Professor uchun ballarni hisoblash
        $professor->custom_ball = IndexController::calculatePointsForFiles($professor->files);
    
        // Moderatorlar uchun ballarni hisoblash
        foreach ($professor_moder as $moderator) {
            $moderatorPoints = IndexController::calculatePointsForFiles($moderator->files);
    
            // Operatorlar uchun ballarni hisoblash va moderator ballariga qo'shish
            foreach ($moderator->operator as $operator) {
                $operatorPoints = IndexController::calculatePointsForFiles($operator->files);
                $moderatorPoints += $operatorPoints;
                $operator->oper_custom_ball = $operatorPoints;
            }
    
            // Moderatorning umumiy ballarini professorning ballariga qo'shish
            $professor->custom_ball += $moderatorPoints;
            $moderator->custom_ball = $moderatorPoints;
        }
        return $professor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        $validated = $this->validate($request, [
            "fish" => "required|string|min:5|max:100",
            "image" => "nullable|mimes:png,jpg,jpeg|max:3024",
            "status" => "boolean",
            'small_info' => 'nullable|string'
        ], [
            'fish.required' => 'F.I.SH maydoni majburiy.',
            'fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'image.required' => 'Rasm majburiy! rasm joylashingiz kerak.',
            'image.mimes' => 'Rasm png, jpg, jpeg turlaridan biri bo\'lishi kerak.',
            'image.max' => 'Rasm :max kilobaytdan katta bo\'lmasligi kerak.',            
            'small_info.string' => 'Kordinator haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);

        $status = $validated['status'] ?? 0;
        $validated['status'] =  $status;

        if ($request->hasFile('image')) {
            $tempPath = $request->image->path(); // Temp fayl joylashuvi
            $fileName = time().'.'.$request->image->extension();
            $publicPath = public_path('uploads/professor_images/'.$fileName); // Public fayl joylashuvi
        
            // Faylni temp papkadan public papkaga ko'chirish
            move_uploaded_file($tempPath, $publicPath);
    
            // Yangi fayl nomini validated ma'lumotlarga qo'shish
            $validated['image'] = $fileName;
        }

        $professor->update($validated);

        return back()->with('toaster', ['success', "Kordinator ma'lumotlari o'zgartirildi"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug_number)
    {
        $professor = Professor::where('slug_number', $slug_number)->firstOrFail();
        $professor->delete();

        return back()->with('toaster', ['success', "Kordinator o'chirildi!"]);
    }
}
