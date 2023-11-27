<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }
        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 80%;
            max-height: 80%;
            overflow: auto;
        }
         /* CSS styling for card */
         .card {
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect */
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="font-sans bg-gray-200">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 p-8">
        <!-- Sample Card -->
        <div class="bg-white p-5 rounded shadow-lg">
            <img src="https://cspi.uz/storage/app/media/2023/Klaster_reyting/Feruza_opa_4_4.jpg" alt="Image 1" class="w-full h-62 object-cover mb-4 rounded">
            <h3 class="text-2xl font-bold mb-2">Familya ism sharifi</h3>
            <p class="text-gray-700"> 
                Professor haqida qisqacha ma'lumot
            </p>
          
            <div class="flex space-x-8 mt-5">
                <button onclick="toggleModal(1)" class="bg-blue-500 text-white px-4 py-2 rounded">Moderatorlar ro'yxati</button>
                {{-- <button class="bg-green-500 text-white px-4 py-2 rounded">Operatorlar ro'yxati</button> --}}
            </div>

            
            <div class="overlay" id="overlay1">
                <div class="modal">
                   

            <div class="md:flex">
                <ul style="width: 500px;" class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator1')"  id="defaultOpen" class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Egamberdiyeva Nigora Azizovna
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator2')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Sayfullayeva Ismigul Qodir qizi
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator3')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Yunusova Xusnora Shuxrat qizi
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator4')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Kobilova Shaxnoza Xudayshukurovna
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator5')"   class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Matupayeva Shoxsanam Zaripboy qizi
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator6')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Pulatova Dilfuza Azamkulovna
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator7')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Dehqanova Muborakxon Gʻiyeziddin qizi
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator8')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Ibadullayeva Sharofat Nurillayevna
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCity(event, 'Moderator8')"  class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            Xusnuddinova Zulayxo Xamidullayevna
                        </a>
                    </li>
                  
                </ul>

                <div  id="Moderator1" class="tabcontent p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Egamberdiyeva Nigora Azizovna</h3>
                    <p class="mb-2">Mavzu: Ta’lim klasteri sharoitida autizm sindromli bolalar nutqi ustida ishlashning samarali mexanizmlari</p>
                   
                </div>

                <div  id="Moderator2" class="tabcontent p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Sayfullayeva Ismigul Qodir qizi</h3>
                    <p class="mb-2">Mavzu: Bo‘lajak logopedlarning kasbiy kompetensiyalarini rivojlantirishda art texnologiyalardan foydalanish</p>
                   
                </div>

            </div> 

            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
                
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
                </script>

                    <button onclick="closeModal(1)" class="bg-red-500 text-white px-4 py-2 mt-4 rounded">Yopish</button>
                </div>
            </div>
        </div>
        <!-- Continue to create more cards as per required -->
        <div class="bg-white p-5 rounded shadow-lg">
            <img src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Image 1" class="w-full h-62 object-cover mb-4 rounded">
            <h3 class="text-2xl font-bold mb-2">Familya ism sharifi</h3>
            <p class="text-gray-700"> 
                Professor haqida qisqacha ma'lumot
            </p>
          
            <button onclick="toggleModal(2)" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Moderatorlar ro'yxatiga o'tish</button>
            <div class="overlay" id="overlay2">
                <div class="modal">
                    <!-- Details content for card 1 -->
                    Tablinks here...2
                    <button onclick="closeModal(2)" class="bg-red-500 text-white px-4 py-2 mt-4 rounded">Yopish</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-5 rounded shadow-lg">
            <img src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Image 1" class="w-full h-62 object-cover mb-4 rounded">
            <h3 class="text-2xl font-bold mb-2">Familya ism sharifi</h3>
            <p class="text-gray-700"> 
                Professor haqida qisqacha ma'lumot
            </p>
          
            <button onclick="toggleModal(3)" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Moderatorlar ro'yxatiga o'tish</button>
            <div class="overlay" id="overlay3">
                <div class="modal">
                    <!-- Details content for card 1 -->
                    Tablinks here...3
                    <button onclick="closeModal(3)" class="bg-red-500 text-white px-4 py-2 mt-4 rounded">Yopish</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var lastOpenedModal = null;

        function toggleModal(cardNumber) {
            var overlayId = "overlay" + cardNumber;
            var overlayElement = document.getElementById(overlayId);

            if (lastOpenedModal) {
                lastOpenedModal.style.display = "none";
            }

            overlayElement.style.display = "flex";
            lastOpenedModal = overlayElement;
        }

        function closeModal(cardNumber) {
            var overlayId = "overlay" + cardNumber;
            var overlayElement = document.getElementById(overlayId);
            overlayElement.style.display = "none";
            lastOpenedModal = null;
        }
    </script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
</html>
