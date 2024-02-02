<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfController extends Controller
{
    public function kordinatorBoyichaPdf($id)
    {
        // O'zgaruvchi nomini professor bilan mos holda kalitlash
        $professor = Professor::findOrFail($id);

        $moderators = $professor->moderator;

        // foreach($moderators as $moderator){
            
        //     foreach($moderator->operator as $operator){
        //         return $operator;
        //     }

        // }
        // $operators = $moderators->operator;

       
        // Massiv ichidagi ma'lumotlarni ishlatish
        $data = [
            'professor' => $professor, 
            'moderators' => $moderators,
            // 'operators' => $operator,
        ];

        // dd($data);
        // PDF yaratish va uni faylga yuklash
        return view('reyting.pdf_themplates.forKordinatorAndOther', compact('data'));
        // $pdf = PDF::loadView('reyting.pdf_themplates.forKordinatorAndOther', $data);
        // return $pdf->download('forKordinatorAndOther.pdf');
    }
}
