<?php

namespace App\Http\Controllers;

use App\Http\Controllers\chart\KordinatorChartController;
use App\Http\Controllers\chart\ModeratorChartController;
use App\Http\Controllers\chart\OperatorChartController;
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

        // ------------------------------------------------------------------------------
        // -------------------------PROFESSORLAR CHART-----------------------------------
        // ------------------------------------------------------------------------------

        // Professorlarni umumiy pointlarini hisoblash va linyali chartda foydalanish kodi
        $professors = Professor::where('status', 1)->get();

        // Oddiy professorlarni pointini xisoblash logikasi
        $professorsChart = IndexController::calculateProfessorsPoints($professors);

        // Chartni line datasini xisoblash logikasi
        $chartData = KordinatorChartController::prepareChartData($professorsChart);

        // Umumiy professorlar pointlarini bir oy davomida o'sgan yoki o'smaganini aniqlash
        $umumiyPointlargaQarabOsish = KordinatorChartController::calculatePercentageChange($professors);

        // Eng ko'p ball to'plagan Kordinatorni aniqlash
        $engKopBalliKordinator = $professorsChart->sortByDesc('custom_ball')->first();

        // ------------------------------------------------------------------------------
        // -------------------------MODERATORLAR CHART-----------------------------------
        // ------------------------------------------------------------------------------

        // Moderatorlar chartini statistikasini hisoblaydigan logikasi
        $moderators = Moderator::all();
        $chartData2 = ModeratorChartController::prepareChartData2($moderators);

        // Eng ko'p ball to'plagan Kordinatorni aniqlash
        $moderatorData2 = IndexController::calculateModeratorsPoints($moderators);
        $engKopBalliModerator = $moderatorData2->sortByDesc('custom_ball')->first();

        // Umumiy professorlar pointlarini bir oy davomida o'sgan yoki o'smaganini aniqlash
        $umumiyPointlargaQarabOsish2 = ModeratorChartController::calculatePercentageChange2($moderators);

        // ------------------------------------------------------------------------------
        // --------------------------OPERATORLAR CHART-----------------------------------
        // ------------------------------------------------------------------------------

         // Operator chartini statistikasini hisoblaydigan logikasi
         $operators = Operator::all();
         $chartDataOperator = OperatorChartController::prepareChartData3($operators);

        // Eng ko'p ball to'plagan Kordinatorni aniqlash
        $operatorData3 = IndexController::calculateOperatorsPoints($operators);
        $engKopBalliOperator3 = $operatorData3->sortByDesc('custom_ball')->first();

        // Umumiy professorlar pointlarini bir oy davomida o'sgan yoki o'smaganini aniqlash
        $umumiyPointlargaQarabOsish3 = OperatorChartController::calculatePercentageChange($operators);

        // ------------------------------------------------------------------------------

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
                'chartData2',
                'umumiyPointlargaQarabOsish',
                'engKopBalliKordinator',
                'umumiyPointlargaQarabOsish2',
                'engKopBalliModerator',
                'operatorData3',
                'engKopBalliOperator3',
                'umumiyPointlargaQarabOsish3',
                'chartDataOperator'
            )

        );
    }




}
