@extends('layouts.frontend')
@section('content')

<!-- component -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
	style="background-image: url(https://www.cspi.uz/storage/app/uploads/public/b13/36b/feb/thumb__1_0_0_0_auto.jpg);">
	<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
	<div class="max-w-xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
<div class="grid  gap-8 grid-cols-1">
	<div class="flex flex-col ">
			<div class="flex flex-col sm:flex-row items-center">
				<h2 class="font-semibold text-lg mr-auto">Reyting uchun ma'lumot joylash</h2>
				<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
			</div>
			<div class="mt-5">
				<div class="form">
          <form action="{{route('site.kirishUchunSlugQidirish')}}" method="post">
            @csrf
            @method('POST')
            <div class="md:space-y-2 mb-3">
                <label class="text-xs font-semibold text-gray-600 py-2">Company Logo<abbr class="hidden" title="required">*</abbr></label>
                <div class="flex items-center py-6">
                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                        <img class="w-12 h-12 mr-4 object-cover" src="https://images.unsplash.com/photo-1611867967135-0faab97d1530?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1352&amp;q=80" alt="Avatar Upload">
        </div>
                        <label class="cursor-pointer ">
          <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
          <input type="file" class="hidden" :multiple="multiple" :accept="accept">
        </label>
                    </div>
                </div>
							
								<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
									<a href="{{'/'}}"><button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"> Orqaga qaytish </button></a>
									<button type="submit" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Davom etish</button>
								</div>
              </form>
							</div>
						</div>
					</div>
				</div>
			</div>


  @endsection