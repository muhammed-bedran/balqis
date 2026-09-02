<?php

return [

    [
        'title'=>'الصفحة الرئيسية',
        'icon'=>'nav-icon fas fa-tachometer-alt',
        'route'=> 'dashboard.index',
    ],
    [
        'title'=>'الفئات',
        'icon'=>'nav-icon fas fa-list',
        'route'=> 'dashboard.categories.index',
    ],
    [
        'title'=>'المتاجر',
        'icon'=>'nav-icon fas fa-store',
        'route'=> 'dashboard.stores.index',
    ],
    [
        'title'=>'المنتجات',
        'icon'=>'nav-icon fas fa-box',
        'route'=> 'dashboard.products.index',
    ],
    [
        'title'=>'التحقق بخطوتين',
        'icon'=>'nav-icon fas fa-lock',
        'route'=> 'dashboard.admin.2fa',
    ],

];
