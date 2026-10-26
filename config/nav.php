<?php

return [

    [
        'title'=>'الصفحة الرئيسية',
        'icon'=>'nav-icon fas fa-tachometer-alt',
        'route'=> 'dashboard.index',
        'ability' => 'dashboard.view',
    ],
    [
        'title'=>'الفئات',
        'icon'=>'nav-icon fas fa-list',
        'route'=> 'dashboard.categories.index',
        'ability' => 'category.view',
    ],
    [
        'title'=>'المتاجر',
        'icon'=>'nav-icon fas fa-store',
        'route'=> 'dashboard.stores.index',
        'ability' => 'store.view',
    ],
    [
        'title'=>'المنتجات',
        'icon'=>'nav-icon fas fa-box',
        'route'=> 'dashboard.products.index',
        'ability' => 'product.view',
    ],
    [
        'title'=>'التحقق بخطوتين',
        'icon'=>'nav-icon fas fa-lock',
        'route'=> 'dashboard.admin.2fa',
        'ability' => '2fa.view',

    ],
    [
        'title'=>'الموارد البشرية',
        'icon'=>'nav-icon fas fa-users',
        'route'=> 'dashboard.hr.index',
        'ability' => 'hr.view',
    ],
    [
        'title'=>'  الموظفين',
        'icon'=>'nav-icon fas fa-users',
        'route'=> 'dashboard.admins.index',
        'ability' => 'admin.view',
    ],
    [
        'title'=>'الأدوار والصلاحيات',
        'icon'=>'nav-icon fas fa-user-shield',
        'route'=> 'role-permession.roles.index',
        'ability' => 'roles.view',
    ]

];
