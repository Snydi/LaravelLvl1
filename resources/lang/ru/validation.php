<?php

return [
    'required' => 'Поле :attribute обязательно для заполнения.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'numeric' => 'Поле :attribute может содержать только цифры',
    'unique' => 'Такой :attribute уже есть.',

    'min' => [
        'alpha'  => 'Текст в поле :attribute должен содержать не менее :min символов.',
    ],

    'attributes' => [
        'email' => 'адрес электронной почты',
        'first_name' => 'имя',
        'last_name' => 'фамилия',
        'messages_accepted' => 'согласие на рассылку',
        'region' => 'область',
        'city' => 'город',
        'street' => 'улица',
        'building' => 'дом',
        'mail_index' => 'почтовый индекс'
    ],
    'custom' => [
        'mail_index' => [
            'digits_between' => 'Поле :attribute должно содержать ровно 6 чисел'
        ]
    ],
];
