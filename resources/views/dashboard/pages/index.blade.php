@extends('layouts.dashboard.index')

@section('content')
    <!-- رسالة ترحيب -->
    <div class="welcome-banner">
        <div class="welcome-content">
            <img src="{{asset('dashboard/dist/img/muhammed.png')}}" alt="محمد البدران" class="welcome-avatar">
            <div class="welcome-text">
                <h2>مرحباً، محمد البدران 👋</h2>
                <p>نتمنى لك يوماً مثمراً — إليك نظرة سريعة على لوحة التحكم الخاصة بك</p>
            </div>
        </div>
        <div class="welcome-meta">
            <span class="welcome-meta-item"><i class="far fa-calendar-alt"></i> الأربعاء، 1 يوليو 2026</span>
            <span class="welcome-meta-item"><i class="far fa-clock"></i> 09:30 صباحاً</span>
        </div>
    </div>

    <!-- إحصائيات سريعة -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon"><i class="fas fa-users"></i></div>
                <div class="dash-stat-info">
                    <div class="number">1,248</div>
                    <div class="label">إجمالي المستخدمين</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 12% هذا الشهر</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon"><i class="fas fa-shopping-cart"></i></div>
                <div class="dash-stat-info">
                    <div class="number">356</div>
                    <div class="label">الطلبات الجديدة</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 8% هذا الأسبوع</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon"><i class="fas fa-chart-line"></i></div>
                <div class="dash-stat-info">
                    <div class="number">89%</div>
                    <div class="label">معدل الإنجاز</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 3% تحسّن</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon"><i class="fas fa-star"></i></div>
                <div class="dash-stat-info">
                    <div class="number">4.8</div>
                    <div class="label">تقييم العملاء</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 0.2 نقطة</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- بطاقات المحتوى -->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card dash-card">
                        <div class="card-body">
                            <div class="dash-card-icon brown"><i class="fas fa-table"></i></div>
                            <h5 class="card-title">إدارة البيانات</h5>
                            <p class="card-text">استعرض وتحكم بجميع السجلات والمستخدمين من خلال جداول تفاعلية منظمة.</p>
                            <a href="table.html" class="card-footer-link">عرض الجداول <i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card dash-card">
                        <div class="card-body">
                            <div class="dash-card-icon gold"><i class="fas fa-user-circle"></i></div>
                            <h5 class="card-title">الملف الشخصي</h5>
                            <p class="card-text">عدّل معلوماتك الشخصية، مهاراتك، وإعدادات حسابك بكل سهولة.</p>
                            <a href="profile.html" class="card-footer-link">فتح الملف <i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card dash-card">
                        <div class="card-body">
                            <div class="dash-card-icon warm"><i class="fas fa-chart-bar"></i></div>
                            <h5 class="card-title">التقارير والإحصائيات</h5>
                            <p class="card-text">تابع أداء مشروعك من خلال تقارير مرئية وإحصائيات دقيقة ومحدّثة.</p>
                            <a href="#" class="card-footer-link">عرض التقارير <i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card dash-card">
                        <div class="card-body">
                            <div class="dash-card-icon cream"><i class="fas fa-cog"></i></div>
                            <h5 class="card-title">الإعدادات</h5>
                            <p class="card-text">خصّص لوحة التحكم وفق احتياجاتك واضبط الإعدادات العامة للنظام.</p>
                            <a href="#" class="card-footer-link">فتح الإعدادات <i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- الشريط الجانبي للصفحة -->
        <div class="col-lg-4">
            <div class="card quick-action-card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-bolt ml-2"></i> إجراءات سريعة</h5>
                </div>
                <div class="quick-actions">
                    <a href="table.html" class="quick-action-btn">
                        <i class="fas fa-plus-circle"></i>
                        إضافة سجل
                    </a>
                    <a href="profile.html" class="quick-action-btn">
                        <i class="fas fa-user-edit"></i>
                        تعديل الملف
                    </a>
                    <a href="#" class="quick-action-btn">
                        <i class="fas fa-file-export"></i>
                        تصدير تقرير
                    </a>
                    <a href="#" class="quick-action-btn">
                        <i class="fas fa-bell"></i>
                        الإشعارات
                    </a>
                </div>
            </div>

            <div class="card activity-card">
                <div class="card-header">
                    <h5 class="m-0"><i class="fas fa-history ml-2"></i> آخر النشاطات</h5>
                </div>
                <div class="card-body">
                    <div class="activity-item">
                        <span class="activity-dot"></span>
                        <div>
                            <h6>تسجيل دخول جديد</h6>
                            <p>منذ 5 دقائق</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <span class="activity-dot"></span>
                        <div>
                            <h6>تحديث بيانات المستخدمين</h6>
                            <p>منذ ساعة</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <span class="activity-dot"></span>
                        <div>
                            <h6>إنشاء تقرير شهري</h6>
                            <p>منذ 3 ساعات</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <span class="activity-dot"></span>
                        <div>
                            <h6>نسخ احتياطي للبيانات</h6>
                            <p>أمس</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection