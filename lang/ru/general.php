<?php

return [
    'actions' => 'Действия',
    'more_than' => 'более',
    'date' => 'Дата',
    'to' => 'до',
    'no_files' => 'нет доступных документов',
    'welcome' => 'Добро пожаловать, ',
    'months' => 'Месяцы',

    'customer' => [
        'new_customer' => 'Новый Клиент',
        'customers' => 'Клиенты',
        'customer_number' => 'Номер Клиента',
        'create_new_customer' => 'Создать Нового Клиента',
        'add_customer' => 'Добавить Клиента',
        'edit_customer' => 'Редактировать Клиента',
        'customer_profile' => 'Профиль Клиента',
        'customer_details' => 'Данные Клиента',
        'customer_orders' => 'Заказы Клиента',
        'alerts' => [
            'customer_successfully_created' => 'Новый клиент был успешно создан!',
            'customer_successfully_updated' => 'Данные клиента были успешно сохранены!',
            'customer_successfully_deleted' => 'Данные клиента были успешно удалены!',
        ],
    ],

    'courier' => [
        'new_courier' => 'Новый Курьер',
        'couriers' => 'Курьеры',
        'courier_number' => 'Номер Курьера',
        'create_new_courier' => 'Создать Нового Курьера',
        'add_courier' => 'Добавить Курьера',
        'edit_courier' => 'Редактировать Курьера',
        'courier_profile' => 'Профиль Курьера',
        'courier_details' => 'Данные Курьера',
        'courier_orders' => 'Заказы Курьера',
        'all_couriers' => 'Все Курьеры',
        'alerts' => [
            'courier_successfully_created' => 'Новый курьер был успешно создан!',
            'courier_successfully_updated' => 'Данные курьера были успешно сохранены!',
            'courier_successfully_deleted' => 'Данные курьера были успешно удалены!',
        ],
    ],

    'user' => [
        'users' => 'Операторы',
        'new_user' => 'Новый Оператор',
        'user_profile' => 'Профиль Оператора',
        'add_user' => 'Добавить Оператора',
        'edit_user' => 'Редактировать Оператора',
        'create_new_user' => 'Создать Нового Оператора',
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'id_number' => 'Номер Т.З',
        'city' => 'Город',
        'country' => 'Страна',
        'address' => 'Адрес',
        'zip' => 'Индекс',
        'email' => 'Эл. Почта',
        'password' => 'Пароль',
        'phone' => 'Телефон',
        'mobile' => 'Мобильный',
        'created_at' => 'Добавлен',
        'status' => 'Статус',
        'remarks' => 'Примечания',
        'profile' => 'Профиль',
        'car_number' => 'Номер Машины',
        'statuses' => [
            'active' => 'активный',
            'inactive' => 'неактивный',
        ],
        'alerts' => [
            'user_successfully_created' => 'Новый оператор был успешно создан!',
            'user_successfully_updated' => 'Данные оператора были успешно сохранены!',
        ],
    ],

    'order' => [
        'orders' => 'Заказы',
        'recipient' => 'Получатель',
        'customer' => 'Заказчик',
        'courier' => 'Курьер',
        'general_details' => 'Общие Данные',
        'recipient_details' => 'Данные Получателя',
        'customer_details' => 'Данные Заказчика',
        'courier_details' => 'Данные Курьера',
        'contact_details' => 'Контактная Информация',
        'payment_details' => 'Информация Платежа',
        'additional_details' => 'Дополнительная Информация',
        'order_number' => 'Номер Заказа',
        'order_details' => 'Информация Заказа',
        'order_status' => 'Статус Заказа',
        'add_order' => 'Добавить Заказ',
        'edit_order' => 'Редактировать Заказ',
        'new_order' => 'Новый Заказ',
        'price' => 'Цена',
        'barcode' => 'Баркод',
        'weight' => 'Вес',
        'documents' => 'Документы',
        'files' => 'Файлы',
        'upload' => 'Загрузка',
        'create_new_order' => 'Создать Новый Заказ',
        'customer_details' => 'Данные Заказчика',
        'prepayment' => 'Предоплата',
        'payment' => 'Оплата',
        'discount' => 'Скидка',
        'box' => 'коробка',
        'boxes' => 'Коробки',
        'no_orders' => 'Нет доступных заказов!',
        'orders_by_status' => 'Статусы',
        'statuses' => [
            'call' => 'Заказ Принят',
            'supply' => 'Картон Доставлен',
            'pickup' => 'Посылка Принята',
            'arrived' => 'Доставлено На Склад',
            'absorbed' => 'Посылка Оформлена',
            'waiting' => 'Ожидание Контейнера',
            'packaged' => 'Посылка Погружена',
            'taxes' => 'Таможенное Оформление',
            'transfer' => 'Посылка В Пути',
            'taxes_destination' => 'На Таможне Страны Доставки',
            'arrived_destination' => 'На Складе Страны Доставки',
            'delivered' => 'Посылка Доставлена',
        ],
        'alerts' => [
            'order_successfully_created' => 'Новый заказ был успешно создан!',
            'order_successfully_updated' => 'Данные заказа были успешно сохранены!',
        ],

    ],

    'report' => [
        'reports' => 'Отчеты',
    ],

    'payment' => [
        'income' => 'Доход',
        'total_income' => 'Общий Доход',
        'income_by_months' => 'Доход За Период',
        'income_by_month' => 'Доход По Месяцам'
    ],


    'alert_titles' => [
        'success' => 'Подтверждение!',
        'error' => 'Ошибка!',
        'warning' => 'Предупреждение!',
    ],

    'alerts' => [
        'operation_failed' => 'Данное действие по технической ошибке было не выполнено!',
        'fields_are_required' => 'поля обязательны для заполнения',
        'file_successfully_deleted' => 'Документ был успешно удален!',
        'operation_failed' => 'Данное действие невозможно!',
        "customer_has_orders" => 'У клиента есть активные заказы.',
        "courier_has_orders" => 'У курьера есть активные заказы.',
        'user_disabled' => 'Ваш аккаунт деактивирован, обратитесь к администратору!'
    ],

    'month' => [
        'January' => 'Январь',
        'February' => 'Февраль',
        'March' => 'Март',
        'April' => 'Апрель',
        'May' => 'Май',
        'June' => 'Июнь',
        'July' => 'Июль',
        'August' => 'Август',
        'September' => 'Сентябрь',
        'October' => 'Октябрь',
        'November' => 'Ноябрь',
        'December' => 'Декабрь',
    ]
];
