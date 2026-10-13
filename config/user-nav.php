<?php

return [

    [
        'title'=>'الصفحة الرئيسية',
        'icon'=>'nav-icon fas fa-tachometer-alt',
        'route'=> 'user.dashboard',
    ],
    [
        'title' => 'التحقق بخطوتين',
        'icon' => 'nav-icon fas fa-lock',
        'route' => 'user.2fa',
    ],
    [
        'title'=>'متجري الإلكتروني',
        'icon'=>'nav-icon fas fa-store',
        'route'=> 'user.store.edit',
    ],
    [
        
        'title'=>'المنتجات',
        'icon'=>'nav-icon fas fa-box',
        'route'=> 'user.products.index',
    ],
    [
        'title'=>'الفريق',
        'icon'=>'nav-icon fas fa-users',
        'route'=> 'user.teams.index',
    ]
  

];
