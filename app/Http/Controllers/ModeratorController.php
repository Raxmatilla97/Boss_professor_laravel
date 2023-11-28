<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use Illuminate\Http\Request;
use App\Models\Files;

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
            "moder_fish" => "required|string|min:5|max:100",
            "moder_small_info" => "nullable|string",
            "moder_status" => "boolean",
            'professor_id' => 'required|number'
           
        ], [
            'moder_fish.required' => 'F.I.SH maydoni majburiy.',
            'moder_fish.string' => 'F.I.SH  maydoni matn bo\'lishi kerak.',
            'moder_fish.min' => 'F.I.SH maydoni kamida 5 belgi bo\'lishi kerak.',
            'moder_fish.max' => 'F.I.SH maydoni maksimum 100 belgidan kam bo\'lishi kerak.',          
            'small_info.string' => 'Moderator haqida ma\'lumot maydoni matn bo\'lishi kerak.',
        ]);

        // Bu yerdan faylni yuklash va DB ga saqlash bo'yicha kod yozilgan.
    
        // $tempPath = $request->image->path();
        // $fileName = time().'.'.$request->image->extension();
        // $publicPath = public_path('moder-uploads/'.$fileName);

        // move_uploaded_file($tempPath, $publicPath);

        
        // Files::create([
        //     'file_name' => $fileName,           
        //     'category_name' => $fileName,
        //     'points' => $fileName,
        //     'is_active' => $fileName,
        // ]);

        // Slug uchun generatsiya kodi

        $lowercase_letters = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $random_string = substr(str_shuffle($lowercase_letters), 0, 4) .
                        substr(str_shuffle($uppercase_letters), 0, 4) .
                        substr(str_shuffle($numbers), 0, 4) .
                        substr(str_shuffle($lowercase_letters.$uppercase_letters.$numbers), 0, 3);
                        
     
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
     * Display the specified resource.
     */
    public function show(Moderator $moderator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moderator $moderator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moderator $moderator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moderator $moderator)
    {
        //
    }
}
