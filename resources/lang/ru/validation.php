<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Языковые ресурсы для проверки значений
      |--------------------------------------------------------------------------
      |
      | Последующие языковые строки содержат сообщения по-умолчанию, используемые
      | классом, проверяющим значения (валидатором).Некоторые из правил имеют
      | несколько версий, например, size. Вы можете поменять их на любые
      | другие, которые лучше подходят для вашего приложения.
      |
     */
    'is_empty' => 'Поле :attribute не должен содержаться в запросе',
    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Поле :attribute содержит недействительный URL.',
    'after' => 'В поле :attribute должна быть дата после :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры и дефис.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'В поле :attribute должна быть дата до :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть между :min и :max.',
        'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.', // калька 'истина' или 'ложь' звучала бы слишком неестественно
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'date' => 'Поле :attribute не является датой.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between' => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'max' => [
        'numeric' => 'Поле :attribute не может быть более :max.',
        'file' => 'Размер файла в поле :attribute не может быть более :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'file' => 'Размер файла в поле :attribute должен быть не менее :min Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть не менее :min.',
        'array' => 'Количество элементов в поле :attribute должно быть не менее :min.',
    ],
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значение :attribute должно совпадать с :other.',
    'size' => [
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'file' => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть равным :size.',
        'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
    ],
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'url' => 'Поле :attribute имеет ошибочный формат.',
    /*
      |--------------------------------------------------------------------------
      | Собственные языковые ресурсы для проверки значений
      |--------------------------------------------------------------------------
      |
      | Здесь Вы можете указать собственные сообщения для атрибутов.
      | Это позволяет легко указать свое сообщение для заданного правила атрибута.
      |
      | http://laravel.com/docs/5.1/validation#custom-error-messages
      | Пример использования
      |
      |   'custom' => [
      |       'email' => [
      |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
      |       ],
      |   ],
      |
     */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
      |--------------------------------------------------------------------------
      | Собственные названия атрибутов
      |--------------------------------------------------------------------------
      |
      | Последующие строки используются для подмены программных имен элементов
      | пользовательского интерфейса на удобочитаемые. Например, вместо имени
      | поля "email" в сообщениях будет выводиться "электронный адрес".
      |
      | Пример использования
      |
      |   'attributes' => [
      |       'email' => 'электронный адрес',
      |   ],
      |
     */

    'attributes' => [
        'bid_count' => 'Заявленное количество'
    ]
    /*
    'attributes' => [
        'username' => 'Логин',
        'password' => 'Пароль',
        'first_name' => trans('users.first_name'),
        'middle_name' => trans('users.middle_name'),
        'last_name' => trans('users.last_name'),
        'password_confirmation' =>trans('users.password_confirmation'),
        'registration_type_id' => trans('registries.registration_type_id'),
        'treatment_type_id' => trans('registries.treatment_type_id'),
        'info_source_id' => trans('registries.info_sources_id'),
        'status_id' => trans('status.status'),
        'service_id'=>trans('schedules.schedule'),
        'user_id'=>trans('users.user'),
        'date'=> trans('shedules.date'),
        'start_works'=>  trans('shedules.start_works'),
        'finish_works'=>  trans('shedules.finish_works'),
        'start_break'=>  trans('shedules.start_break'),
        'finish_break'=>  trans('shedules.finish_break'),
        'type'=>trans('tasks.type'),
        'from'=>trans('tasks.from'),
        'to'=>trans('tasks.to'),
        'responsible_user_id'=>trans('tasks.responsible_user_id'),
        'planned_at'=>trans('tasks.planned_at'),
        'title'=>trans('tasks.title'),
        'name'=>trans('discountCards.name'),
        'code'=>trans('discountCards.code'),
        'discount_type'=>trans('discountCards.discount_type'),
        'value'=>trans('discountCards.value'),
        'limit_for_use'=>trans('discountCards.limit_for_use'),
        'date_start'=>trans('discountCards.date_start'),
        'date_finish'=>trans('discountCards.date_finish'),
        'available'=>trans('discountCards.available'),
        'price_crypt'=> trans('services.price_crypt'),
        'price_value'=> trans('services.price_value'),
        'cabinet_id'=> trans('services.cabinet_id'),
        'duration_day'=> trans('services.duration_day'),
        'duration_time'=> trans('services.duration_time'),
        'break_time'=> trans('services.break_time'),
        'break_time'=> trans('services.break_time'),
        'is_enter_number'=> trans('services.is_enter_number'),
        'chamber_id'=>trans('berths.chamber_id'),
        'description'=>trans('templatesMedicalHistories.description'),
        'appointment  '=>trans('defaultSurveyPlans.appointment'),
        'Patient' => ['first_name' => trans('patients.first_name'),
            'last_name' => trans('patients.last_name'),
            'middle_name' => trans('patients.middle_name'),
            'date_birth' => trans('patients.date_birth'),
            'sex' => trans('patients.sex'),
            'telephone' => trans('patients.telephone'),
            'adress' => trans('patients.adress'),
            'email' => trans('patients.email'),
            'send_sms' => trans('patients.send_sms'),
            'send_sms' => trans('patients.send_sms')
        ],
        
        'users'=>[
            '*'=>trans('tasks.user_id'),
        ],
        'services'=>[
            '*'=>trans('discountCards.services'),
        ],
        'RegistryService' => [
            'insert' => [
                '*' => ['status_id' => trans('status.status'),
                    'user_id' => trans('registryServices.user_id'),
                    'count' => trans('registryServices.count'),
                    'is_paid' => trans('registryServices.is_paid'),
                ],
            ],
            'update' => [
                '*' => ['status_id' => trans('status.status'),
                    'count' => trans('registryServices.is_paid'),
                ],
            ],
        ],
        'OutpatientCardsResultsDiagnose' => [
            'diet' => trans('outpatientCards.diet')
        ],
        'StationaryHistory' => [
            'history' => '',
            'preliminary_diagnosis' => '',
        ],
        'Diary' => [
            'pressure' => trans('stationaryCards.pressure'),
            'temperature' => trans('stationaryCards.temperature'),
            'heartbeat' => trans('stationaryCards.heartbeat'),
            'respiration_rate' => trans('stationaryCards.respiration_rate'),
            'comment' => trans('stationaryCards.comment'),
        ],
        'Discharge' => [
            'survey_finish' => trans('stationaryCards.survey_finish'),
            'diagnosis_finish' => trans('stationaryCards.diagnosis_finish'),
            'status_at_discharge' => trans('stationaryCards.status_at_discharge'),
            'diet' => trans('stationaryCards.diet'),
            'non_pharmacological_therapy' => trans('stationaryCards.non_pharmacological_therapy'),
            'pharmacological_therapy' => trans('stationaryCards.pharmacological_therapy'),
            'physiotherapy' => trans('stationaryCards.physiotherapy')
        ],
        'display_name'=>trans('roles.display_name'),
        'permissions'=>[
          "*"=>trans('roles.display_name'),
        ],
        'user_id'=>trans('users.user')
    ],
    */
];
