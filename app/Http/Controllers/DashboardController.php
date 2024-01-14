<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Operator;
use App\Models\Professor;
use App\Models\Moderator;
use App\Models\TemporaryFile;

class DashboardController extends Controller
{
    public function index(){
        $professor = Professor::all()->count();
        $moderator = Moderator::all()->count();
        $operator = Operator::all()->count();

        $murojaatlar = TemporaryFile::all();

        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
    
        $dailyCountsMaqullangan = [];      
    
        for ($date = $startOfWeek->copy(); $date <= $endOfWeek; $date->addDay()) {
            $count = TemporaryFile::whereDate('created_at', $date)->where('ariza_holati', "maqullandi")->count();
            $dailyCountsMaqullangan[$date->format('D')] = $count;
        }
        
        // $date o'zgaruvchisini haftaning boshiga qaytarib o'rnatish
        $date = $startOfWeek->copy();
        
        $dailyCountsRadEtilgan = [];
        
        for ($date; $date <= $endOfWeek; $date->addDay()) {
            $count = TemporaryFile::whereDate('created_at', $date)->where('ariza_holati', "kutulmoqda")->count();
            $dailyCountsRadEtilgan[$date->format('D')] = $count;
        }
      

        return view('dashboard', compact('professor', 'moderator', 'operator', 'murojaatlar', 'dailyCountsMaqullangan', 'dailyCountsRadEtilgan'));
    }
}
