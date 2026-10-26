<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Abilities catalog (code => label)
    |--------------------------------------------------------------------------
    */
    'abilities' => [

    'dashboard.view' => 'عرض لوحة التحكم',
        'roles.view' => 'عرض الأدوار',
        'roles.create' => 'اضافة دور جديد',
        'roles.update' => 'تعديل دور',
        'roles.delete' => 'حذف دور',

        //
        'category.view' => 'عرض الفئات',
        'category.create' => 'إنشاء الفئات',
        'category.update' => 'تهديل الفئات',
        'category.delete' => 'حذف الفئات',
        'category.show' => 'عرض الفئات',
        'category.products' => 'عرض منتجات الفئات',

        // hr
        'hr.view' => 'عرض الموارد البشرية',
        'hr.create' => 'إضافة موظف جديد',
        'hr.update' => 'تعديل موظف',
        'hr.delete' => 'حذف موظف',
        // products
        'product.view' => 'عرض المنتجات',
        'product.create' => 'إضافة منتج جديد',
        'product.update' => 'تعديل منتج',
        'product.delete' => 'حذف منتج',

        //stores
        'store.view' => 'عرض المخازن',
        'store.create' => 'إضافة مخزن جديد',
        'store.update' => 'تعديل مخزن',
        'store.delete' => 'حذف مخزن',
        // 2fa
        '2fa.view' => 'عرض التحقق بخطوتين',
        '2fa.create' => 'إضافة تحقق بخطوتين جديد',
        '2fa.update' => 'تعديل تحقق بخطوتين',
        '2fa.delete' => 'حذف تحقق بخطوتين',

        // admins
        'admin.view' => 'عرض الادمن',
        'admin.create' => 'إضافة ادمن جديد',
        'admin.update' => 'تعديل ادمن',
        'admin.delete' => 'حذف ادمن',


    ],

    /*
    |--------------------------------------------------------------------------
    | Super-admin column on the user model (null = disabled)
    |--------------------------------------------------------------------------
    */
    'super_admin_column' => 'super_admin',

    'models' => [
        'role' => Melbedran\RolePermession\Models\Role::class,
        'role_ability' => Melbedran\RolePermession\Models\RoleAbility::class,
    ],

    'tables' => [
        'roles' => 'roles',
        'role_abilities' => 'role_abilities',
        'role_user' => 'role_user',
    ],

    'morph' => 'authorizable',

    'register_gates' => true,

    /*
    |--------------------------------------------------------------------------
    | Load package migrations automatically
    |--------------------------------------------------------------------------
    */
    'load_migrations' => true,

    'blade' => [
        'enabled' => true,
        'can' => 'canAbility',
        'cannot' => 'cannotAbility',
        'canAny' => 'canAnyAbility',
        'canAll' => 'canAllAbility',
    ],

    /*
    |--------------------------------------------------------------------------
    | Built-in admin UI (Blade)
    |--------------------------------------------------------------------------
    */
    'ui' => [
        'enabled' => true,
        'prefix' => '/admin/dashboard',
        'middleware' => ['web', 'auth:admin'],
        'route_name_prefix' => 'role-permession.',
    ],

];
