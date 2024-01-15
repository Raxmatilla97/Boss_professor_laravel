<div class="w-full px-12 bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <div>
            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-2">
                {{$engKopBalliKordinator->fish}} - Umumiy {{$engKopBalliKordinator->custom_ball}} ball</h5>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Eng ko'p reyting balini to'plagan
                kordinator</p>
        </div>
        <div
            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
            {{$umumiyPointlargaQarabOsish}}
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13V1m0 0L1 5m4-4 4 4" />
            </svg>
        </div>
    </div>
    <div id="labels-chart5" class="px-2.5"></div>
    <div
        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
        <div class="flex justify-between items-center pt-5">
            <!-- Button -->

            <a href="#"
                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                To'liq ko'rish (Sahifa hali mavjud emas!)
                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
        </div>
    </div>
</div>

<script>
   // var jsonDataArray2 = JSON.parse(`{!! json_encode($chartData2) !!}`);

  // PHP tomonidan yuborilgan JSON ma'lumotlarini JavaScript obyektiga aylantirish
var jsonDataArray2 = {!! json_encode($chartData2) !!};

// Oylarni matn shaklida
var months = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentiyabr', 'Oktiyabr', 'Noyabr', 'Dekabr'];

jsonDataArray2.forEach(moderator => {
  var monthlyData2 = [];
  months.forEach(month => {
    var yearMonth2 = "2024-" + (months.indexOf(month) + 1).toString().padStart(2, '0');
    monthlyData2.push(moderator.data[yearMonth2] || null);
  });
  moderator.data = monthlyData2;
});

console.log(jsonDataArray2);

</script>

<script>
    // console.log({"name":"Xodjamqulov Umid Negmatovich","data":[34],"color":"#744C6C"},{"name":"Fayziyev Raxmatilla Xanshor o\'g\'li","data":[12],"color":"#1C6E23"})

    // ApexCharts options and config
    window.addEventListener("load", function() {
      let options = {
        // set the labels option to true to show the labels on the X and Y axis
        xaxis: {
          show: true,
          categories: ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentiyabr ', 'Oktiyabr', 'Noyabr', 'Dekabr'],
          labels: {
            show: true,
            style: {
              fontFamily: "Inter, sans-serif",
              cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          show: true,
          labels: {
            show: true,
            style: {
              fontFamily: "Inter, sans-serif",
              cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            },
            formatter: function (value) {
              return '' + value;
            }
          }
        },
        series: jsonDataArray2,
        chart: {
          sparkline: {
            enabled: false
          },
          height: "100%",
          width: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: {
            enabled: false,
          },
          toolbar: {
            show: true,
          },
        },
        tooltip: {
      enabled: true,
      x: {
        show: false,
      },
      y: {
        formatter: function(value) {
          return value === null ? "Bu oy uchun hali ma'lumot yo'q!" : value;
        }
      }
    },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 6,
        },
        legend: {
          show: false
        },
        grid: {
          show: false,
        },
        markers: {
          size: [4, 7]
        }
      }
  
      if (document.getElementById("labels-chart5") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("labels-chart5"), options);
        chart.render();
      }
    });
</script>