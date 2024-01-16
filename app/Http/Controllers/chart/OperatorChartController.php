<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperatorChartController extends Controller
{
    // ----------------------------------------------------------------
    //  -------------DASHBOARD CHART LINE3 LOGIKA BOSHLANDI-------------
    // Chardagi Moderatorlar chart ni shakillantiradigan logika kodlari
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------

    // Moderator uchun dashboarddagi line chart datasini xisoblab beradigan logika
    public static function prepareChartData3($operators)
    {
        // Chardagi Operatorlar color line ni aniqlab beradigan top-10 color
        $lineChartColors = [
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

        $chartData3 = [];
        $index = 0;
        foreach ($operators as $operator) {
            $operatorData = [$operator]; // Professor ro'yxatini yaratish
            $monthlyPoints = self::calculateMonthlyPoints($operatorData); // Har bir professor uchun oylik ballarni hisoblash


            $chartData3[] = [
                'name' => $operator->oper_fish,
                'data' => $monthlyPoints[0]->monthly_points, // Bu yerda professorning oylik ballari
                'color' => $lineChartColors[$index % count($lineChartColors)]
            ];
            $index++;
        }
        return $chartData3;
    }

    // Moderator uchun Operatorlar pointlarini hisoblash va qo'shish logikasi
    public static function calculateMonthlyPoints($operators)
    {

        foreach ($operators as $key => $operator) {
            $operatorMonthlyPoints = self::calculateMonthlyPointsForFiles($operator->files ?? []);
            // dd($operatorMonthlyPoints);
            // Bu yerda $operator o'zgaruvchisini yangilash kerak
            $operators[$key]->monthly_points = $operatorMonthlyPoints;
        }


        return $operators;
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
    public static function calculatePercentageChange($operators)
    {

        $currentMonth = now()->format('Y-m');
        $previousMonth = now()->subMonth()->format('Y-m');

        $currentMonthPoints = 0;
        $previousMonthPoints = 0;
        foreach ($operators as $operator) {
            foreach ($operator->files as $point) {
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
    // -------------DASHBOARD CHART LINE2 LOGIKA TUGADI-----------------
    // ----------------------------------------------------------------
}
