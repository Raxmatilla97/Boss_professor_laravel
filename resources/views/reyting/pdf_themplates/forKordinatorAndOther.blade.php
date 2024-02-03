<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>Kirish KODLARI - Kordinator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body id="content">
    <div class="max-w-7xl mx-auto"  >
        <header class="flex justify-between px-10 py-5">
            <img src="{{ asset('assets/cspu_logo.png') }}" alt="CSPU_LOgo" style="width: 120px;">
            <h1 class="text-2xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-2xl flex items-end">
                Kirish Kalitlari</h1>
        </header>

        <hr>

        <section class="flex justify-between px-10 py-5">
            <p class="text-xs">
                <strong>Yaratilgan:</strong>
                {{ \Carbon\Carbon::now() }}
            </p>

            {{-- <p class="text-xs">
                <strong>Invoice No:</strong>
                18635
            </p> --}}

            <button id="download" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                PDF yuklash
            </button>
            
        </section>

        <hr>

        <h1 class="text-xl tracking-tight font-extrabold text-gray-900 my-5 text-center">Kordinator ma'lumoti</h1>

        <section class="px-10 py-5">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr >
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                №
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                F.I.SH
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unvon
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                Kirish kaliti
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white" style="height: 80px">
                            <td class="px-4 py-4 whitespace-nowrap text-xs text-blue-900 font-bold text-center">
                                1
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-md text-blue-800 font-bold text-center">
                                {{ $professor->fish }}

                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                Kordinator
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-800 font-bold text-center">
                                {{ $professor->slug_number }}
                            </td>

                        </tr>



                    </tbody>
                </table>
            </div>

            <hr class="mt-6">

            <h1 class="text-xl tracking-tight font-extrabold text-gray-900 my-5 text-center">Kordinatorga tegishli
                moderatorlar ma'lumotlari</h1>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-1 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                №
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                F.I.SH
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unvon
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                Kirish kaliti
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($professor->moderator as $moderator)
                            <tr class="bg-white text-sm text-gray-800 uppercase bg-blue-50 dark:bg-gray-700 dark:text-gray-400" style="height: 80px">
                                <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-900 font-bold text-center">
                                    <span class="bg-blue-100 text-blue-800 text-sm font-bold me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $i++ }}</span>
                                    
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-xs text-blue-800 font-bold text-center">
                                    {{ $moderator->moder_fish }}
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-700 text-center">
                                    Moderator
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-xs text-blue-800 font-bold text-center">
                                    {{ $moderator->moder_slug_number }}
                                </td>

                               
                            </tr>

                            @php
                                $b = 1;
                            @endphp
                            @foreach ($moderator->operator as $operator)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-t-2 border-gray-100">
                                <td class="px-2 py-4 text-center text-xs">
                                    {{$b++}}
                                    </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$operator->oper_fish}}
                                </th>
                                <td class="px-6 py-4 text-sm">
                                    Operator
                                </td>
                                <td class="px-6 py-4 font-bold text-xs">
                                    {{$operator->oper_slug_number}}
                                </td>

                            </tr>
                            @endforeach
                            
                        @endforeach




                    </tbody>
                </table>




            </div>

        </section>
    </div>
 
    <script>
        document.getElementById('download').addEventListener('click', function() {
            var element = document.getElementById('content');
            var opt = {
                margin:       [30, 0, 30, 0], // top, left, bottom, right
                filename:     'download.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'pt', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        });
    </script>
</body>

</html>
