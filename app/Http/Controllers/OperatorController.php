<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Professor;
use Illuminate\Http\Request;

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
      
        return view('reyting.dashboard.professor.frogments.edit.OperatorCreateForm', compact('professor_info', 'professor_moderators'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Operator $operator)
    {
        $validated = $this->validate($request, [
            "oper_fish" => "required|string|min:5|max:100",
            "oper_image" => "required|mimes:png,jpg,jpeg|max:3024",
            "oper_status" => "boolean",
            "oper_small_info" => 'nullable|string',
            "moderator_id"
        ], [
            'fish.required' => 'F.I.SH maydoni majburiy.',
            'fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',
            'image.required' => 'Rasm majburiy! rasm joylashingiz kerak.',
            'image.mimes' => 'Rasm png, jpg, jpeg turlaridan biri bo\'lishi kerak.',
            'image.max' => 'Rasm :max kilobaytdan katta bo\'lmasligi kerak.',            
            'small_info.string' => 'Professor haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);
    
        $tempPath = $request->image->path(); // Temp fayl joylashuvi
        $fileName = time().'.'.$request->image->extension();
        $publicPath = public_path('uploads/'.$fileName); // Public fayl joylashuvi
    
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
    
        return redirect()->route('professors.edit', $professor->slug_number)->with('toaster', ['success', "Yangi professor yaratildi!"]);
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        //
    }
}
