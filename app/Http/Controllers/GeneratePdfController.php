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

       

        // dd($data);
       
        return view('reyting.pdf_themplates.forKordinatorAndOther', compact('professor'));
       
    }
}
