<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8 ">

        <div id="alert-additional-content-1"
            class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
            role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium">Yangi operator yaratishingiz mumkin!</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                Buning uchun "Yangi moderator yaratish" tugmasiga bosing va sahifada so'ralgan ma'lumotlarni kiritib
                moderatorni tanlab yaratish tugmasini bosing.
            </div>
            <div class="flex justify-end">
                <a href="{{ route('operator.create', ['id' => $professor->id]) }}"><button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yangi
                        Operator yaratish</button></a>
            </div>
        </div>

        {{-- List start --}}

        {{-- {{ dd($professor_operators_list)}} --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-8 ">
            

            @php
            $i = 1;
            @endphp
            @if(count($professor_operators_list) > 0)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                №
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            F.I.SH
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Moderator F.I
                        </th>
                        <th scope="col" class="px-2 py-3">
                           Umumiy balli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Holati
                        </th>
                        <th scope="col" class="px-6 py-3">
                            O'zgartirish
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professor_operators_list as $items)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="text-center">
                            {{$i++}}
                        </th>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%;">
                                @if ($items->oper_image)
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{'/uploads/operator_image'}}/{{$items->oper_image}}" alt="Jese image">
                                @else                                
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Jese image">
                                @endif
                               
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$items->oper_fish}}</div>
                              
                                <span
                                class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                ID: {{$items->oper_slug_number}}
                            </span>
                                <button class="bg-gray-300 hover:bg-gray-400 rounded p-1 mt-1 cursor-pointer"
                                data-clipboard-text3="  {{$items->oper_slug_number}}" onclick="copyToClipboard3(this)">
                                <img src="{{asset('assets/copy.png')}}" alt="Copy" class="h-4 w-4">
                            </button>
                             
                            </div>
                        </th>
                        
                        <td class="px-6 py-4">
                            {{$items->moderator->moder_fish}}
                        </td>
                        <td class="px-2 py-4 text-center" >
                           
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"> {{ $items->oper_custom_ball}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($items->oper_status)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv
                                @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Aktiv emas
                                @endif
                                
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('operator.edit', ['operator_id' => $items->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash
                                </a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            @else
            <div class="mb-5">
                <h1 class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">Operator yaratilmagan!</h1>
                @include('reyting.frontend.frogments.skeletonTable')
            </div>

            @endif
        </div>


        {{-- List end --}}


    </div>
</div>


<script>
    function copyToClipboard3(element) {
    const textToCopy = element.getAttribute('data-clipboard-text3');
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(textToCopy).then(function() {
            showToast3();
        }, function(err) {
            console.error('Matnni nusxalashda xato yuz berdi: ', err);
        });
    } else {
        const textArea = document.createElement('textarea');
        textArea.value = textToCopy;
        textArea.style.position = 'fixed';
        textArea.style.opacity = '0';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            const successful = document.execCommand('copy');
            if (successful) {
                showToast3();
            } else {
                console.error('Fallback: Matnni nusxalash buyrug\'i muvaffaqiyatsiz bo\'ldi');
            }
        } catch (err) {
            console.error('Fallback: Afsuski, matnni nusxalab bo\'lmadi', err);
        }

        document.body.removeChild(textArea);
    }
}

function showToast3() {
    const toast = document.getElementById('toast3');
    toast.style.display = 'flex';
    setTimeout(function () {
        toast.style.display = 'none';
    }, 3000);
}
</script>



<div id="toast3"
    class="hidden fixed top-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-50"
    role="alert">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
    </div>
    <div class="ms-3 text-sm font-normal">Operator ID raqami nusxalandi!</div>


</div>
