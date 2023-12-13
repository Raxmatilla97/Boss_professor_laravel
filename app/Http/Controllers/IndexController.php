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
       
        $professors = Professor::orderBy('created_at', 'desc')->paginate('8');
       
        
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
       dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug_number)
    {
        $professor = Professor::where('slug_number', $slug_number)->firstOrFail();
        $professor_moder = $professor->moderator()->orderBy('created_at', 'desc')->paginate(12);
        
       
     
        return view('reyting.frontend.showProfessor', compact('professor', 'professor_moder'));
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
    
            if ($professor) {
                $user_info = [
                    'id' => $professor->id,
                    'fish' => $professor->fish,
                    'position'=> "Professor",
                    'image'=> $professor->image,
                    'img_path' => "/uploads/professor_images"
                ];
               return view('reyting.frontend.malumot_yuborish_formasi', compact('user_info'));   

            } elseif ($moderator) {
                $user_info = [
                    'id' => $moderator->id,
                    'fish' => $moderator->moder_fish,
                    'position'=> "Moderator",
                    'image'=> $moderator->moder_image,
                    'img_path' => "/uploads/moderator_images"
                ];
                return view('reyting.frontend.malumot_yuborish_formasi', compact('user_info'));

            } elseif ($operator) {
                $user_info = [
                    'id' => $operator->id,
                    'fish' => $operator->oper_fish,
                    'position'=> "Operator",
                    'image'=> $operator->oper_image,
                    'img_path' => "/uploads/operator_images"
                ];
                return view('reyting.frontend.malumot_yuborish_formasi', compact('user_info'));
            } else {
                // Agar kod mavjud emas bo'lsa, foydalanuvchiga xabar berish
                return redirect()->back()->with('error', "Bunday kod mavjud emas!");
            }
        } else {
            // Agar kod kiritilmagan bo'lsa, 404 xatolikni chiqaring yoki bosh sahifaga yo'naltiring
            return redirect()->back()->with('error', "Bunday kod mavjud emas!");
        }
    }

 
}
