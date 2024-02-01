<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => "The :attribute maydoni qabul qilinishi kerak.",
    'accepted_if' => ":attribute maydoni qabul qilinishi kerak, agar :other :value ga teng bo'lsa.",
    'active_url' => ":attribute maydoni haqiqiy URL bo'lishi kerak.",
    'after' => ":attribute maydoni :date dan keyingi sana bo'lishi kerak.",
    'after_or_equal' => ":attribute maydoni :date ga teng yoki undan keyingi sana bo'lishi kerak.",
    'alpha' => ":attribute maydoni faqat harflardan iborat bo'lishi kerak.",
    'alpha_dash' => ":attribute maydoni faqat harflar, raqamlar, chiziq va pastki chiziqdan iborat bo'lishi kerak.",
    'alpha_num' => ":attribute maydoni faqat harflar va raqamlardan iborat bo'lishi kerak.",
    'array' => ":attribute maydoni massiv bo'lishi kerak.",
    'ascii' => ":attribute maydoni faqat bitta baytli alifbo raqamlari va belgilaridan iborat bo'lishi kerak.",
    'before' => ":attribute maydoni :date dan oldingi sana bo'lishi kerak.",
    'before_or_equal' => ":attribute maydoni :date ga teng yoki undan oldingi sana bo'lishi kerak.",
    'between' => [
        'array' => ":attribute maydoni :min va :max elementlar orasida bo'lishi kerak.",
        'file' => ":attribute maydoni :min va :max kilobayt orasida bo'lishi kerak.",
        'numeric' => ":attribute maydoni :min va :max orasida bo'lishi kerak.",
        'string' => ":attribute maydoni :min va :max belgilar orasida bo'lishi kerak.",
    ],
    'boolean' => ":attribute maydoni rost yoki yolg'on bo'lishi kerak.",
    'can' => ":attribute maydoni ruxsat etilmagan qiymatga ega.",
    'confirmed' => ":attribute maydoni tasdiqlash mos kelmaydi.",
    'current_password' => 'Parol noto‘g‘ri.',
    'date' => ":attribute maydoni haqiqiy sana bo'lishi kerak.",
    'date_equals' => ":attribute maydoni :date ga teng sana bo'lishi kerak.",
    'date_format' => ":attribute maydoni :format formatiga mos kelishi kerak.",
    'decimal' => ":attribute maydoni :decimal onlik joy bo'lishi kerak.",
    'declined' => ":attribute maydoni rad etilishi kerak.",
    'declined_if' => ":attribute maydoni rad etilishi kerak, agar :other :value ga teng bo'lsa.",
    'different' => ":attribute maydoni va :other farqli bo'lishi kerak.",
    'digits' => ":attribute maydoni :digits raqamdan iborat bo'lishi kerak.",
    'digits_between' => ":attribute maydoni :min va :max raqamlar orasida bo'lishi kerak.",
    'dimensions' => ":attribute maydoning noto‘g‘ri rasmiy o'lchamlari mavjud.",
    'distinct' => ":attribute maydonida takrorlangan qiymat bor.",
    'doesnt_end_with' => ":attribute maydoni quyidagilardan biri bilan tugamasa kerak: :values.",
    'doesnt_start_with' => ":attribute maydoni quyidagilardan biri bilan boshlanmasa kerak: :values.",
    'email' => ":attribute maydoni haqiqiy elektron pochta manzili bo'lishi kerak.",
    'ends_with' => ":attribute maydoni quyidagilardan biri bilan tugashi kerak: :values.",
    'enum' => "Tanlangan :attribute haqiqiy emas.",
    'exists' => "Tanlangan :attribute haqiqiy emas.",
    'file' => ":attribute maydoni fayl bo'lishi kerak.",
    'filled' => ":attribute maydoni qiymatga ega bo'lishi kerak.",
    'gt' => [
        'array' => ":attribute maydonida :value dan ortiq elementlar bo'lishi kerak.",
        'file' => ":attribute maydoni :value kilobaytdan katta bo'lishi kerak.",
        'numeric' => ":attribute maydoni :value dan katta bo'lishi kerak.",
        'string' => ":attribute maydoni :value dan ko‘p belgilardan iborat bo‘lishi kerak.",
    ],
    'gte' => [
        'array' => ":attribute maydonida :value ta yoki undan ko‘proq elementlar bo‘lishi kerak.",
        'file' => ":attribute maydoni :value kilobaytdan katta yoki teng bo'lishi kerak.",
        'numeric' => ":attribute maydoni :value dan katta yoki teng bo'lishi kerak.",
        'string' => ":attribute maydoni :value dan ko‘p yoki teng belgilardan iborat bo‘lishi kerak.",
    ],
    'image' => ":attribute maydoni rasm bo'lishi kerak.",
    'in' => "Tanlangan :attribute haqiqiy emas.",
    'in_array' => ":attribute maydoni :other da mavjud bo'lishi kerak.",
    'integer' => ":attribute maydoni butun son bo'lishi kerak.",
    'ip' => ":attribute maydoni haqiqiy IP manzil bo'lishi kerak.",
    'ipv4' => ":attribute maydoni haqiqiy IPv4 manzil bo'lishi kerak.",
    'ipv6' => ":attribute maydoni haqiqiy IPv6 manzil bo'lishi kerak.",
    'json' => ":attribute maydoni haqiqiy JSON satr bo'lishi kerak.",
    'lowercase' => ":attribute maydoni kichik harflar bo'lishi kerak.",
    'lt' => [
        'array' => ":attribute maydonida :value dan kam elementlar bo'lishi kerak.",
        'file' => ":attribute maydoni :value kilobaytdan kam bo'lishi kerak.",
        'numeric' => ":attribute maydoni :value dan kam bo'lishi kerak.",
        'string' => ":attribute maydoni :value dan kam belgilardan iborat bo'lishi kerak.",
    ],
    'lte' => [
        'array' => ":attribute maydonida :value ga teng yoki undan kam elementlar bo'lishi kerak.",
        'file' => ":attribute maydoni :value kilobaytga teng yoki undan kam bo'lishi kerak.",
        'numeric' => ":attribute maydoni :value ga teng yoki undan kam bo'lishi kerak.",
        'string' => ":attribute maydoni :value ga teng yoki undan kam belgilardan iborat bo'lishi kerak.",
    ],
    'mac_address' => ":attribute maydoni haqiqiy MAC manzil bo'lishi kerak.",
    'max' => [
        'array' => ":attribute maydonida :max dan ortiq elementlar bo‘lmasligi kerak.",
        'file' => ":attribute maydoni :max kilobaytdan katta bo'lmasligi kerak.",
        'numeric' => ":attribute maydoni :max dan katta bo'lmasligi kerak.",
        'string' => ":attribute maydoni :max dan ko‘p belgilardan iborat bo‘lmasligi kerak.",
    ],
    'max_digits' => ":attribute maydonida :max dan ko‘proq raqamlar bo‘lmasligi kerak.",
    'mimes' => ":attribute maydoni quyidagi turdagi fayl bo'lishi kerak: :values.",
    'mimetypes' => ":attribute maydoni quyidagi turdagi fayl bo'lishi kerak: :values.",
    'min' => [
        'array' => ":attribute maydonida kamida :min ta elementlar bo'lishi kerak.",
        'file' => ":attribute maydoni kamida :min kilobayt bo'lishi kerak.",
        'numeric' => ":attribute maydoni kamida :min bo'lishi kerak.",
        'string' => ":attribute maydoni kamida :min ta belgilardan iborat bo'lishi kerak.",
    ],
    'min_digits' => ":attribute maydonida kamida :min ta raqam bo'lishi kerak.",
    'missing' => ":attribute maydoni mavjud bo'lmasligi kerak.",
    'missing_if' => ":attribute maydoni mavjud bo'lmasligi kerak, agar :other :value ga teng bo'lsa.",
    'missing_unless' => ":attribute maydoni mavjud bo'lmasligi kerak, agar :other :value ga teng bo'lmasa.",
    'missing_with' => ":attribute maydoni mavjud bo'lmasligi kerak, :values mavjud bo'lganda.",
    'missing_with_all' => ":attribute maydoni mavjud bo'lmasligi kerak, :values mavjud bo'lganda.",
    'multiple_of' => ":attribute maydoni :value ning ko'paytmasi bo'lishi kerak.",
    'not_in' => "Tanlangan :attribute haqiqiy emas.",
    'not_regex' => ":attribute maydoni formati noto‘g‘ri.",
    'numeric' => ":attribute maydoni raqam bo'lishi kerak.",
    'password' => [
        'letters' => ":attribute maydoni kamida bitta harf bo'lishi kerak.",
        'mixed' => ":attribute maydoni kamida bitta katta va kichik harf bo'lishi kerak.",
        'numbers' => ":attribute maydoni kamida bitta raqam bo'lishi kerak.",
        'symbols' => ":attribute maydoni kamida bitta simvol bo'lishi kerak.",
        'uncompromised' => "Berilgan :attribute ma'lumot sizishlarda paydo bo'lgan. Iltimos, boshqa :attribute yozing.",
    ],
    'present' => ":attribute maydoni mavjud bo'lishi kerak.",
    'prohibited' => ":attribute maydoni taqiqlangan.",
    'prohibited_if' => ":attribute maydoni taqiqlangan, agar :other :value ga teng bo'lsa.",
    'prohibited_unless' => ":attribute maydoni taqiqlangan, agar :other :values ichida bo'lmasa.",
    'prohibits' => ":attribute maydoni qo'yilgan :other mavjud bo'lmasligini taqiqlovchi.",
    'regex' => ":attribute maydoni formati noto‘g‘ri.",
    'required' => ":attribute maydoni talab qilinadi.",
    'required_array_keys' => ":attribute maydoni quyidagilarni o'z ichiga olgan holda bo'lishi kerak: :values.",
    'required_if' => ":attribute maydoni talab qilinadi, agar :other :value ga teng bo'lsa.",
    'required_unless' => ":attribute maydoni talab qilinadi, agar :other :values ichida bo'lmagan taqdir.",
    'required_with' => ":attribute maydoni talab qilinadi, :values mavjud bo'lganda.",
    'required_with_all' => ":attribute maydoni talab qilinadi, :values mavjud bo'lganda.",
    'required_without' => ":attribute maydoni talab qilinadi, :values mavjud bo'lmagan taqdir.",
    'required_without_all' => ":attribute maydoni talab qilinadi, :values barchasi mavjud bo'lmagan taqdir.",
    'returns' => ":attribute maydoni :other ga qaytarilishi kerak.",
    'same' => ":attribute maydoni va :other bir xil bo'lishi kerak.",
    'size' => [
    'array' => ":attribute maydonida :size elementlar bo'lishi kerak.",
    'file' => ":attribute maydoni :size kilobayt bo'lishi kerak.",
    'numeric' => ":attribute maydoni :size bo'lishi kerak.",
    'string' => ":attribute maydoni :size belgilar bo'lishi kerak.",
    ],
    'starts_with' => ":attribute maydoni quyidagilarni oldidan boshlanishi kerak: :values.",
    'string' => ":attribute maydoni satr bo'lishi kerak.",
    'timezone' => ":attribute maydoni haqiqiy mintaqaviy vaqt bo'lishi kerak.",
    'unique' => "Bunday :attribute allaqachon mavjud.",
    'uploaded' => ":attribute maydonini yuklash jarayoni amalga oshmadi.",
    'url' => ":attribute maydoni formati noto‘g‘ri.",
    'uuid' => ":attribute maydoni haqiqiy UUID bo'lishi kerak.",
    'uppercase' => ":attribute maydoni katta harflar bo‘lishi kerak.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];