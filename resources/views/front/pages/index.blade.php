@extends('layouts.website.front')


@section('content')

    <section id="home" class="page">
        <div class="hero">
            <div>
                <h1>دفء وأناقة في كل تفصيلة</h1>
                <p>إلكترونيات وملابس ومستلزمات منزل وقهوة وكتب وأكثر. منتجات متنوعة نختارها لك ونوصلها إلى بابك.</p>
                <a class="btn" href="#products">تسوّق المنتجات</a>
            </div>
            <div class="cups" aria-hidden="true">🛍️</div>
        </div>
        <h2>لماذا بلقيس؟</h2>
        <div class="perks">
            <div class="perk"><b>🚚 توصيل سريع</b><span>خلال 2–4 أيام عمل</span></div>
            <div class="perk"><b>🌿 جودة مضمونة</b><span>منتجات مختارة بعناية</span></div>
            <div class="perk"><b>↩️ إرجاع سهل</b><span>خلال 14 يومًا</span></div>
        </div>
        <h2>الأكثر مبيعًا</h2>
        <div class="grid" id="featured"></div>
    </section>

@endsection