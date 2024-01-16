<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KordinatorChartController extends Controller
{
   // ----------------------------------------------------------------
    //  -------------DASHBOARD CHART LINE LOGIKA BOSHLANDI-------------
    // Chardagi kordinatorlarni color line ni aniqlab beradigan top-10 color
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------


    // Kordinatorlar uchun dashboarddagi line chart datasini xisoblab beradigan logika
    public static function prepareChartData($professors)
    {
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

        $chartData = [];
        $index = 0;
        foreach ($professors as $professor) {
            $professorData = [$professor]; // Professor ro'yxatini yaratish
            $monthlyPoints = self::calculateMonthlyPoints($professorData); // Har bir professor uchun oylik ballarni hisoblash


            $chartData[] = [
                'name' => $professor->fish,
                'data' => $monthlyPoints[0]->monthly_points, // Bu yerda professorning oylik ballari
                'color' => $lineChartColors[$index % count($lineChartColors)]
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
    public static function calculatePercentageChange($professors)
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
