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

        // Oddiy professorlarni pointini xisoblash logikasi
        $professorsChart = IndexController::calculateProfessorsPoints($professors);

        // Chartni line datasini xisoblash logikasi
        $chartData = $this->prepareChartData($professorsChart);

        //  dd($jsonContent);

        // Umumiy professorlar pointlarini bir oy davomida o'sgan yoki o'smaganini aniqlash
        $umumiyPointlargaQarabOsish = $this->calculatePercentageChange($professors);

        // Eng ko'p ball to'plagan Kordinatorni aniqlash
        $engKopBalliKordinator =  $professorsChart->sortByDesc('custom_ball')->first();

       

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
                'chartData',
                'umumiyPointlargaQarabOsish',
                'engKopBalliKordinator'
            )

        );
    }
    // ----------------------------------------------------------------
    //  -------------DASHBOARD CHART LINE LOGIKA BOSHLANDI-------------
    // Chardagi kordinatorlarni color line ni aniqlab beradigan top-10 color
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    private $lineChartColors = [
        '#3498DB', // Yorqin ko'k
        '#E74C3C', // Qizil
        '#2ECC71', // Yashil
        '#F1C40F', // Sariq
        '#9B59B6', // Binafsha
        '#1ABC9C', // Firuzabarg
        '#34495E', // Tungi ko'k
        '#D35400', // To'q sariq
        '#7D3C98', // Tuna binafsha
        '#C0392B' // To'q qizil
    ];

    // Kordinatorlar uchun dashboarddagi line chart datasini xisoblab beradigan logika
    private function prepareChartData($professors)
    {
        $chartData = [];
        $index = 0;
        foreach ($professors as $professor) {
            $professorData = [$professor]; // Professor ro'yxatini yaratish
            $monthlyPoints = $this->calculateMonthlyPoints($professorData); // Har bir professor uchun oylik ballarni hisoblash


            $chartData[] = [
                'name' => $professor->fish,
                'data' => $monthlyPoints[0]->monthly_points, // Bu yerda professorning oylik ballari
                'color' => $this->lineChartColors[$index % count($this->lineChartColors)]
            ];
            $index++;
        }
        return $chartData;
    }

    // Professor uchun ham Moderatorlar va Operatorlar pointlarini hisoblash va qo'shish logikasi
    public static function calculateMonthlyPoints($professors)
    {
        foreach ($professors as $professor) {
            $professorMonthlyPoints = self::calculateMonthlyPointsForFiles($professor->files ?? []);

            foreach ($professor->moderator as $moderator) {
                $moderatorMonthlyPoints = self::calculateMonthlyPointsForFiles($moderator->files ?? []);

                foreach ($moderator->operator as $operator) {
                    $operatorMonthlyPoints = self::calculateMonthlyPointsForFiles($operator->files ?? []);
                    foreach ($operatorMonthlyPoints as $month => $points) {
                        $moderatorMonthlyPoints[$month] = ($moderatorMonthlyPoints[$month] ?? 0) + $points;
                    }
                }

                foreach ($moderatorMonthlyPoints as $month => $points) {
                    $professorMonthlyPoints[$month] = ($professorMonthlyPoints[$month] ?? 0) + $points;
                }
            }

            $professor->monthly_points = $professorMonthlyPoints;
        }

        return $professors;
    }

    // Yuborilgan murojaatlar created_at qarab umumiy oylik pointlarni hisoblash
    private static function calculateMonthlyPointsForFiles($files)
    {
        $monthlyPoints = [];
        foreach ($files as $file) {
            if ($file->is_active == 1 && $file->ariza_holati == "maqullandi") {
                $month = $file->created_at->format('Y-m');
                if (!isset($monthlyPoints[$month])) {
                    $monthlyPoints[$month] = 0;
                }
                $monthlyPoints[$month] += $file->points;
            }
        }
        return $monthlyPoints;
    }


    // Bir oyda professorlar pointlarini qo'shilganligiga qarab o'sish yoki pasayish bo'lganini aniqlash logikasi
    function calculatePercentageChange($professors)
    {

        $currentMonth = now()->format('Y-m');
        $previousMonth = now()->subMonth()->format('Y-m');

        $currentMonthPoints = 0;
        $previousMonthPoints = 0;

        foreach ($professors as $professor) {
            foreach ($professor->files as $point) {
                if ($point->created_at->format('Y-m') == $currentMonth) {
                    $currentMonthPoints += $point->value;
                }
                if ($point->created_at->format('Y-m') == $previousMonth) {
                    $previousMonthPoints += $point->value;
                }
            }
        }

        // Foizdagi o'zgarishni hisoblash
        if ($previousMonthPoints > 0) {
            $percentageChange = (($currentMonthPoints - $previousMonthPoints) / $previousMonthPoints) * 100;
        } else if ($currentMonthPoints > 0) {
            $percentageChange = 100; // Agar o'tgan oyda hech qanday ochko bo'lmasa
        } else {
            $percentageChange = 0; // Agar ikkala oyda ham ochko bo'lmasa
        }

        return $percentageChange >= 0 ? "+" . round($percentageChange, 2) . "%" : round($percentageChange, 2) . "%";
    }

    // ----------------------------------------------------------------
    // -------------DASHBOARD CHART LINE LOGIKA TUGADI-----------------
    // ----------------------------------------------------------------


}
