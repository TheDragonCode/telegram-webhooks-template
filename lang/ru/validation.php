<?php

declare(strict_types=1);

return [
    'accepted'        => 'Должно быть принято.',
    'accepted_if'     => 'Должно быть принято, когда :other соответствует :value.',
    'active_url'      => 'Значение поля должно быть действительным URL адресом.',
    'after'           => 'Дата должна быть после :date.',
    'after_or_equal'  => 'Дата должна быть после или равной :date.',
    'alpha'           => 'Здесь могут быть только буквы.',
    'alpha_dash'      => 'Здесь могут быть только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num'       => 'Здесь могут быть только буквы и цифры.',
    'array'           => 'Здесь должен быть массив.',
    'ascii'           => 'Значение поля должно содержать только однобайтовые цифро-буквенные символы.',
    'before'          => 'Дата должна быть до :date.',
    'before_or_equal' => 'Дата должна быть до или равной :date.',
    'between'         => [
        'array'   => 'Количество элементов должно быть между :min и :max.',
        'file'    => 'Размер файла должен быть между :min и :max Кб.',
        'numeric' => 'Значение должно быть между :min и :max.',
        'string'  => 'Количество символов должно быть между :min и :max.',
    ],
    'boolean'           => 'Значение должно быть логического типа.',
    'can'               => 'Значение должно быть авторизованным.',
    'confirmed'         => 'Значение не совпадает с подтверждением.',
    'current_password'  => 'Неверный пароль.',
    'date'              => 'Значение должно быть корректной датой.',
    'date_equals'       => 'Дата должна быть равной :date.',
    'date_format'       => 'Дата должна соответствовать формату :format.',
    'decimal'           => 'Значение должно содержать :decimal цифр десятичных разрядов.',
    'declined'          => 'Должно быть отклонено.',
    'declined_if'       => 'Должно быть отклонено, когда :other равно :value.',
    'different'         => 'Значение должно отличаться от :other',
    'digits'            => 'Количество символов должно быть равным :digits.',
    'digits_between'    => 'Количество символов должно быть между :min и :max.',
    'dimensions'        => 'Изображение имеет недопустимые размеры.',
    'distinct'          => 'Поле содержит повторяющееся значение.',
    'doesnt_end_with'   => 'Значение не должно заканчиваться одним из следующих: :values.',
    'doesnt_start_with' => 'Значение не должно начинаться с одного из следующих: :values.',
    'email'             => 'Электронный адрес должен быть действительным.',
    'ends_with'         => 'Должно заканчиваться одним из следующих значений: :values',
    'enum'              => 'Значение некорректно.',
    'exists'            => 'Значение не существует.',
    'file'              => 'Содержимое должно быть файлом.',
    'filled'            => 'Обязательно для заполнения.',
    'gt'                => [
        'array'   => 'Количество элементов должно быть больше :value.',
        'file'    => 'Размер файла должен быть больше :value Кб.',
        'numeric' => 'Значение должно быть больше :value.',
        'string'  => 'Количество символов должно быть больше :value.',
    ],
    'gte' => [
        'array'   => 'Количество элементов должно быть :value или больше.',
        'file'    => 'Размер файла должен быть :value Кб или больше.',
        'numeric' => 'Значение должно быть :value или больше.',
        'string'  => 'Количество символов должно быть :value или больше.',
    ],
    'image'     => 'Содержимое должно быть изображением.',
    'in'        => 'Значение некорректно.',
    'in_array'  => 'Значение должно присутствовать в :other.',
    'integer'   => 'В значении должно быть целое число.',
    'ip'        => 'В значении должен быть действительный IP-адрес.',
    'ipv4'      => 'В значении должен быть действительный IPv4-адрес.',
    'ipv6'      => 'В значении должен быть действительный IPv6-адрес.',
    'json'      => 'Значение должно быть JSON строкой.',
    'lowercase' => 'Значение этого поля должно быть в нижнем регистре.',
    'lt'        => [
        'array'   => 'Количество элементов должно быть меньше :value.',
        'file'    => 'Размер файла должен быть меньше :value Кб.',
        'numeric' => 'Значение должно быть меньше :value.',
        'string'  => 'Количество символов должно быть меньше :value.',
    ],
    'lte' => [
        'array'   => 'Количество элементов должно быть :value или меньше.',
        'file'    => 'Размер файла должен быть :value Кб или меньше.',
        'numeric' => 'Значение должно быть равным :value или меньше.',
        'string'  => 'Количество символов должно быть :value или меньше.',
    ],
    'mac_address' => 'Значение должно быть корректным MAC-адресом.',
    'max'         => [
        'array'   => 'Количество элементов не может превышать :max.',
        'file'    => 'Размер файла не может быть больше :max Кб.',
        'numeric' => 'Значение не может быть больше :max.',
        'string'  => 'Количество символов не может превышать :max.',
    ],
    'max_digits' => 'Значение не должно содержать больше :max цифр.',
    'mimes'      => 'Должен быть файл одного из следующих типов: :values.',
    'mimetypes'  => 'Должен быть файл одного из следующих типов: :values.',
    'min'        => [
        'array'   => 'Количество элементов должно быть не меньше :min.',
        'file'    => 'Размер файла должен быть не меньше :min Кб.',
        'numeric' => 'Значение должно быть не меньше :min.',
        'string'  => 'Количество символов должно быть не меньше :min.',
    ],
    'min_digits'       => 'Значение должно содержать не меньше :min цифр.',
    'missing'          => 'Значение поля должно отсутствовать.',
    'missing_if'       => 'Значение поля должно отсутствовать, когда :other равно :value.',
    'missing_unless'   => 'Значение поля должно отсутствовать, когда :other не равно :value.',
    'missing_with'     => 'Значение поля должно отсутствовать, если :values указано.',
    'missing_with_all' => 'Значение поля должно отсутствовать, когда указаны все :values.',
    'multiple_of'      => 'Значение должно быть кратным :value',
    'not_in'           => 'Значение некорректно.',
    'not_regex'        => 'Значение поля имеет некорректный формат.',
    'numeric'          => 'В значении должно быть число.',
    'password'         => [
        'letters'       => 'Пароль должен содержать хотя бы одну букву.',
        'mixed'         => 'Пароль должен содержать хотя бы одну прописную и одну строчную буквы.',
        'numbers'       => 'Пароль должен содержать хотя бы одну цифру.',
        'symbols'       => 'Пароль должен содержать хотя бы один символ.',
        'uncompromised' => 'Этот пароль обнаружен в утечке данных. Пожалуйста, выберите другое значение.',
    ],
    'present'              => 'Значение должно быть.',
    'prohibited'           => 'Значение запрещено.',
    'prohibited_if'        => 'Значение запрещено, когда :other равно :value.',
    'prohibited_unless'    => 'Значение запрещено, если :other не входит в :values.',
    'prohibits'            => 'Запрещено присутствие :other.',
    'regex'                => 'Значение поля имеет некорректный формат.',
    'required'             => 'Обязательно для заполнения.',
    'required_array_keys'  => 'Массив обязательно должен иметь ключи: :values',
    'required_if'          => 'Обязательно для заполнения, когда :other равно :value.',
    'required_if_accepted' => 'Обязательно, когда :other принято.',
    'required_unless'      => 'Обязательно для заполнения, когда :other не равно :values.',
    'required_with'        => 'Обязательно для заполнения, когда :values указано.',
    'required_with_all'    => 'Обязательно для заполнения, когда :values указано.',
    'required_without'     => 'Обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Обязательно для заполнения, когда ни одно из :values не указано.',
    'same'                 => 'Значение должно совпадать с :other.',
    'size'                 => [
        'array'   => 'Количество элементов должно быть равным :size.',
        'file'    => 'Размер файла должен быть равен :size Кб.',
        'numeric' => 'Значение должно быть равным :size.',
        'string'  => 'Количество символов должно быть равным :size.',
    ],
    'starts_with' => 'Должно начинаться с одного из следующих значений: :values',
    'string'      => 'Здесь должна быть строка.',
    'timezone'    => 'Должен быть действительный часовой пояс.',
    'ulid'        => 'В значении поля должен быть корректный ULID.',
    'unique'      => 'Такое значение уже существует.',
    'uploaded'    => 'Загрузка файла не удалась.',
    'uppercase'   => 'Значение этого поля должно быть в верхнем регистре.',
    'url'         => 'Значение поля имеет ошибочный формат URL.',
    'uuid'        => 'В значении должен быть корректный UUID.',
    'attributes'  => [
        'address'                  => 'адрес',
        'age'                      => 'возраст',
        'amount'                   => 'количество',
        'area'                     => 'область',
        'available'                => 'доступно',
        'birthday'                 => 'дата рождения',
        'body'                     => 'контент',
        'city'                     => 'город',
        'content'                  => 'контент',
        'country'                  => 'страна',
        'created_at'               => 'создано в',
        'creator'                  => 'создатель',
        'current_password'         => 'текущий пароль',
        'date'                     => 'дата',
        'date_of_birth'            => 'день рождения',
        'day'                      => 'день',
        'deleted_at'               => 'удалено в',
        'description'              => 'описание',
        'district'                 => 'округ',
        'duration'                 => 'продолжительность',
        'email'                    => 'email адрес',
        'excerpt'                  => 'выдержка',
        'filter'                   => 'фильтр',
        'first_name'               => 'имя',
        'gender'                   => 'пол',
        'group'                    => 'группа',
        'hour'                     => 'час',
        'image'                    => 'изображение',
        'last_name'                => 'фамилия',
        'lesson'                   => 'урок',
        'line_address_1'           => 'строка адреса 1',
        'line_address_2'           => 'строка адреса 2',
        'message'                  => 'сообщение',
        'middle_name'              => 'отчество',
        'minute'                   => 'минута',
        'mobile'                   => 'моб. номер',
        'month'                    => 'месяц',
        'name'                     => 'имя',
        'national_code'            => 'национальный код',
        'number'                   => 'номер',
        'password'                 => 'пароль',
        'password_confirmation'    => 'подтверждение пароля',
        'phone'                    => 'номер телефона',
        'photo'                    => 'фотография',
        'postal_code'              => 'индекс',
        'price'                    => 'стоимость',
        'province'                 => 'провинция',
        'recaptcha_response_field' => 'ошибка рекапчи',
        'remember'                 => 'запомнить',
        'restored_at'              => 'восстановлено в',
        'result_text_under_image'  => 'текст под изображением',
        'role'                     => 'роль',
        'second'                   => 'секунда',
        'sex'                      => 'пол',
        'short_text'               => 'короткое описание',
        'size'                     => 'размер',
        'state'                    => 'штат',
        'street'                   => 'улица',
        'student'                  => 'студент',
        'subject'                  => 'заголовок',
        'teacher'                  => 'учитель',
        'terms'                    => 'правила',
        'test_description'         => 'тестовое описание',
        'test_locale'              => 'тестовая локализация',
        'test_name'                => 'тестовое имя',
        'text'                     => 'текст',
        'time'                     => 'время',
        'title'                    => 'наименование',
        'updated_at'               => 'обновлено в',
        'username'                 => 'никнейм',
        'year'                     => 'год',
    ],
];
