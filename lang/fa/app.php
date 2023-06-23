<?php

use App\Models\User;

return [
    'login' => [
        'login_to_your_account' => 'ورود به ناحیه کاربری',
        'remember' => 'مرا به خاطر بسپار',
        'sign_in' => 'ورود',
    ],
    'dashboard' => [
        'home' => 'خانه',
        'enable_dark_mode' => 'فعال سازی حالت تاریک',
        'enable_light_mode' => 'فعال سازی حالت روشن',
        'built_with' => 'Built with the :title theme.',
        'rights_reserved' => 'All rights reserved.',
    ],
    'auth' => [
        'user' => 'کاربر',
        'users' => 'کاربران',
        'role' => 'نقش',
        'name' => 'نام',
        'email' => 'پست الکترونیک',
        'email_address' => 'نشانی پست الکترونیک',
        'password' => 'گذرواژه',
        'show_password' => 'نمایش گذرواژه',
        'hide_password' => 'عدم نمایش گذرواژه',
        'generate_password' => 'ایجاد گذواژه',
        'roles' => [
            User::CUSTOMER => 'مشتری',
            User::CUSTOMER . 's' => 'مشتریان',
            User::ADMIN => 'ادمین',
            User::ADMIN . 's' => 'ادمین ها',
        ],
        'login' => 'ورود',
        'logout' => 'خروج',
    ],
    'inbounds' => [
        'inbound' => 'ورودی',
        'inbounds' => 'ورودی ها',
        'link' => 'لینک',
        'description' => 'توضیحات',
        'title' => 'عنوان',
        'ip' => 'IP',
        'port' => 'Port',
        'assign_inbounds' => 'تخصیص ورودی به :user',
        'date' => 'Date',
        'available_inbounds' => 'ورودی های موجود (کانفیگ های VPN)',
        'inbounds_in_use' => ':count ورودی فعال',
        'inbounds_not_in_use' => ':count ورودی غیرفعال',
        'quota' => 'روز باقی مانده',
    ],
    'pageComponents' => [
        'new' => 'جدید',
        'add' => 'افزودن',
        'edit' => 'ویرایش',
        'delete' => 'حذف',
        'copy' => 'کپی',
        'actions' => 'عملیات',
        'index' => 'ردیف',
        'submit' => 'ثبت',
        'cancel' => 'انصراف',
        'copied' => 'در کلیپبورد شما کپی شد',
        'not_copied' => 'عملیات کپی کردن با خطا مواجه شد',
    ],
];
