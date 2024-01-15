<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Operator;
use App\Models\Professor;
use App\Models\Moderator;
use App\Models\TemporaryFile;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $professor = Professor::all()->count();
        $moderator = Moderator::all()->count();
        $operator = Operator::all()->count();

        $murojaatlar = TemporaryFile::all();

        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $dailyCountsMaqullangan = [];

        $uzbekDays = [
            'Dush',
            'Sesh',
            'Chor',
            'Pay',
            'Jum',
            'Sha',
            'Yak'
        ];

        for ($date = $startOfWeek->copy(); $date <= $endOfWeek; $date->addDay()) {
            $count = TemporaryFile::whereDate('created_at', $date)->where('ariza_holati', 'maqullandi')->count();
            $dayIndex = $date->dayOfWeekIso - 1;
            $dailyCountsMaqullangan[$uzbekDays[$dayIndex]] = $count;
        }

        $date = $startOfWeek->copy();

        $dailyCountsRadEtilgan = [];

        for ($date; $date <= $endOfWeek; $date->addDay()) {
            $count = TemporaryFile::whereDate('created_at', $date)->where('ariza_holati', 'rad_etildi')->count();
            $dayIndex = $date->dayOfWeekIso - 1;
            $dailyCountsRadEtilgan[$uzbekDays[$dayIndex]] = $count;
        }


        // Necha foiz arizalar rad etilgan yoki maqullanganligini ko'rsatadigan kod

        $haftaMurojaatlari = $murojaatlar->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);

        $countMaqullangan = $haftaMurojaatlari->where('ariza_holati', 'maqullandi')->count();
        $countRadEtilgan = $haftaMurojaatlari->where('ariza_holati', 'rad_etildi')->count();
        $totalCount = $haftaMurojaatlari->count();

        if ($totalCount > 0) {
            $percentageMaqullangan = ($countMaqullangan / $totalCount) * 100;
            $percentageRadEtilgan = ($countRadEtilgan / $totalCount) * 100;
        } else {
            // $totalCount nol bo'lsa, foizlarni 0 deb belgilash mumkin
            $percentageMaqullangan = 0;
            $percentageRadEtilgan = 0;
        }

        // Murojaatlarni bir haftada qancha % ga ko'paygan yoki kamayganini hisoblash


        // O'tgan haftadagi murojaatlar sonini hisoblash
        $previousWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $previousWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        $previousWeekCount = TemporaryFile::whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])->count();

        // Bu haftadagi murojaatlar sonini hisoblash
        $thisWeekStart = Carbon::now()->startOfWeek();
        $thisWeekEnd = Carbon::now()->endOfWeek();
        $thisWeekCount = TemporaryFile::whereBetween('created_at', [$thisWeekStart, $thisWeekEnd])->count();

        // Foizdagi o'zgarishni hisoblash
        if ($previousWeekCount > 0) {
            $percentageChange = (($thisWeekCount - $previousWeekCount) / $previousWeekCount) * 100;
        } else {
            $percentageChange = 100; // Agar o'tgan haftada murojaatlar bo'lmagan bo'lsa
        }


        // Professorlarni umumiy pointlarini hisoblash va linyali chartda foydalanish kodi

        $professors = Professor::where('status', 1)->get();
        $professors = IndexController::calculateProfessorsPoints($professors);
        $chartData = $this->prepareChartData($professors);

       
        $pointsData = response()->json($chartData);
        $jsonContent = $pointsData->getContent(); // Bu yerda JSON formatidagi ma'lumotlarni olamiz// Laravel-da JSON javobini yaratish

        // dd($jsonContent);


        return view(
            'dashboard',
            compact(
                'professor',
                'moderator',
                'operator',
                'murojaatlar',
                'dailyCountsMaqullangan',
                'dailyCountsRadEtilgan',
                'percentageMaqullangan',
                'percentageRadEtilgan',
                'totalCount',
                'percentageChange',
                'jsonContent',
                'chartData'
            )
        );
    }

    private function prepareChartData($professors)
    {
        $chartData = [];
        foreach ($professors as $professor) {
            $chartData[] = [
                'name' => $professor->fish,
                'data' => [$professor->custom_ball], // Bu yerda faqat bitta qiymat bor, siz oylik ma'lumotlarni qanday hisoblashingizga bog'liq
                'color' => $this->generateRandomColor()
            ];
        }
        return $chartData;
    }

    private function generateRandomColor()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
