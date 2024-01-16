<?php

namespace App\Http\Controllers\chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeratorChartController extends Controller
{


    // ----------------------------------------------------------------
    //  -------------DASHBOARD CHART LINE2 LOGIKA BOSHLANDI-------------
    // Chardagi Moderatorlar chart ni shakillantiradigan logika kodlari
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------


    // Chardagi Moderatorlar color line ni aniqlab beradigan top-10 color


    // Moderator uchun dashboarddagi line chart datasini xisoblab beradigan logika
    public static function prepareChartData2($moderators)
    {
        $lineChartColors2 = [
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

        $chartData2 = [];
        $index = 0;
        foreach ($moderators as $moderator) {
            $moderatorData = [$moderator]; // Professor ro'yxatini yaratish
            $monthlyPoints = self::calculateMonthlyPoints2($moderatorData); // Har bir professor uchun oylik ballarni hisoblash


            $chartData2[] = [
                'name' => $moderator->moder_fish,
                'data' => $monthlyPoints[0]->monthly_points, // Bu yerda professorning oylik ballari
                'color' => $lineChartColors2[$index % count($lineChartColors2)]
            ];
            $index++;
        }
        return $chartData2;
    }

    // Moderator uchun Operatorlar pointlarini hisoblash va qo'shish logikasi
    public static function calculateMonthlyPoints2($moderators)
    {


        foreach ($moderators as $moderator) {

            $moderatorMonthlyPoints = self::calculateMonthlyPointsForFiles2($moderator->files ?? []);

            foreach ($moderator->operator as $operator) {

                $operatorMonthlyPoints = self::calculateMonthlyPointsForFiles2($operator->files ?? []);

                foreach ($operatorMonthlyPoints as $month => $points) {
                    $moderatorMonthlyPoints[$month] = ($moderatorMonthlyPoints[$month] ?? 0) + $points;

                }

            }


            $moderator->monthly_points = $moderatorMonthlyPoints;

        }



        return $moderators;
    }

    // Yuborilgan murojaatlar created_at qarab umumiy oylik pointlarni hisoblash
    private static function calculateMonthlyPointsForFiles2($files)
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
    public static function calculatePercentageChange2($moderators)
    {

        $currentMonth = now()->format('Y-m');
        $previousMonth = now()->subMonth()->format('Y-m');

        $currentMonthPoints = 0;
        $previousMonthPoints = 0;
        foreach ($moderators as $moderator) {
            foreach ($moderator->files as $point) {
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
