<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Moderator;
use App\Models\Operator;
use Illuminate\Http\Request;

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
        //
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
               return view('reyting.frontend.malumot_yuborish_formasi');
            } elseif ($moderator) {
                return view('reyting.frontend.malumot_yuborish_formasi');
            } elseif ($operator) {
                return view('reyting.frontend.malumot_yuborish_formasi');
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
