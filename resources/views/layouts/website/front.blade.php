<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>بلقيس | متجر</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&family=Amiri:wght@700&display=swap"
        rel="stylesheet">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('website/style.css') }}">
</head>

<body>
    <header>
        <div class="bar">
            <a class="logo" href="#home">بلقيس</a>
            <nav aria-label="القائمة الرئيسية">
                <a href="#home" data-p="home">الرئيسية</a>
                <a href="#products" data-p="products">المنتجات</a>

                @auth
                    <a href="{{ route('user.dashboard') }}" data-p="profile"> <i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login') }}" data-p="login">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" data-p="register" class="cta">إنشاء حساب</a>
                @endauth
            </nav>
            <button class="cart" id="cartBtn" aria-label="السلة">🛒 السلة (<span id="count">0</span>)</button>
        </div>
    </header>

    <main>
        @yield('content')

        <section id="products" class="page">
            <h2 style="margin-top:0">المنتجات</h2>
            <div class="filters" id="filters"></div>
            <div class="grid" id="list"></div>
        </section>

        <section id="cart" class="page">
            <h2 style="margin-top:0">سلة المشتريات</h2>
            <div id="cartBody"></div>
        </section>

        <section id="login" class="page">
            <form class="auth" id="loginForm" novalidate>
                <h2>تسجيل الدخول</h2>
                <label for="le">البريد الإلكتروني</label>
                <input id="le" type="email" autocomplete="email" placeholder="name@example.com">
                <label for="lp">كلمة المرور</label>
                <input id="lp" type="password" autocomplete="current-password">
                <button class="btn" type="submit">دخول</button>
                <div class="msg" id="lm" role="status"></div>
                <div class="alt">ليس لديك حساب؟ <a href="#register">أنشئ حسابًا</a></div>
            </form>
        </section>

        <section id="register" class="page">
            <form class="auth" id="regForm" novalidate>
                <h2>إنشاء حساب</h2>
                <label for="rn">الاسم الكامل</label>
                <input id="rn" autocomplete="name">
                <label for="re">البريد الإلكتروني</label>
                <input id="re" type="email" autocomplete="email" placeholder="name@example.com">
                <label for="rp">كلمة المرور (8 أحرف على الأقل)</label>
                <input id="rp" type="password" autocomplete="new-password">
                <button class="btn" type="submit">إنشاء الحساب</button>
                <div class="msg" id="rm" role="status"></div>
                <div class="alt">لديك حساب؟ <a href="#login">سجّل الدخول</a></div>
            </form>
        </section>
    </main>

    <footer>© بلقيس — جميع الحقوق محفوظة</footer>
    <div class="toast" id="toast" role="status"></div>

    <script>
        var P = [
            { id: 1, n: "سماعات لاسلكية", c: "إلكترونيات", p: 249, e: "🎧", bg: "#5b3a29" },
            { id: 2, n: "ساعة ذكية", c: "إلكترونيات", p: 399, e: "⌚", bg: "#7a4b33" },
            { id: 3, n: "شاحن متنقل 20000", c: "إلكترونيات", p: 129, e: "🔋", bg: "#6b4430" },
            { id: 4, n: "قميص قطن", c: "ملابس", p: 89, e: "👕", bg: "#a8693a" },
            { id: 5, n: "حذاء جلد", c: "ملابس", p: 260, e: "👞", bg: "#8a5a3c" },
            { id: 6, n: "حقيبة ظهر", c: "ملابس", p: 140, e: "🎒", bg: "#92623f" },
            { id: 7, n: "مصباح مكتب خشبي", c: "المنزل", p: 110, e: "💡", bg: "#c68b59" },
            { id: 8, n: "طقم أكواب فخّار", c: "المنزل", p: 75, e: "🍵", bg: "#b27a4d" },
            { id: 9, n: "وسادة مريحة", c: "المنزل", p: 55, e: "🛋️", bg: "#9b6a47" },
            { id: 10, n: "بُنّ أثيوبي مُحمّص", c: "قهوة", p: 68, e: "☕", bg: "#6b4430" },
            { id: 11, n: "إبريق قهوة نحاسي", c: "قهوة", p: 120, e: "🫖", bg: "#a8693a" },
            { id: 12, n: "عطر عود وعنبر", c: "عناية", p: 210, e: "🧴", bg: "#7a4b33" },
            { id: 13, n: "مجموعة عناية بالبشرة", c: "عناية", p: 180, e: "🧼", bg: "#b27a4d" },
            { id: 14, n: "رواية أدبية", c: "كتب", p: 38, e: "📖", bg: "#5b3a29" },
            { id: 15, n: "دفتر غلاف جلدي", c: "كتب", p: 48, e: "📒", bg: "#8a5a3c" },
            { id: 16, n: "سجادة يوغا", c: "رياضة", p: 70, e: "🧘", bg: "#92623f" },
            { id: 17, n: "دمبل قابل للتعديل", c: "رياضة", p: 160, e: "🏋️", bg: "#6b4430" },
            { id: 18, n: "زجاجة مياه حرارية", c: "رياضة", p: 45, e: "🥤", bg: "#a8693a" }
        ];
        var cats = ["الكل", "إلكترونيات", "ملابس", "المنزل", "قهوة", "عناية", "كتب", "رياضة"], cur = "الكل", cart = {};
        try { cart = JSON.parse(localStorage.getItem('cart') || '{}') } catch (e) { }
        function save() { try { localStorage.setItem('cart', JSON.stringify(cart)) } catch (e) { } }
        function find(id) { return P.filter(function (x) { return x.id == id })[0] }
        function card(x) { return '<article class="card"><div class="thumb" style="background:' + x.bg + '">' + x.e + '</div><div class="info"><b>' + x.n + '</b><small>' + x.c + '</small><div class="row"><span class="price">' + x.p + ' ر.س</span><button class="add" data-id="' + x.id + '">أضف للسلة</button></div></div></article>' }
        function draw() {
            document.getElementById('featured').innerHTML = P.filter(function (x) { return [1, 4, 7, 10, 12, 16].indexOf(x.id) > -1 }).map(card).join('');
            document.getElementById('filters').innerHTML = cats.map(function (c) { return '<button class="chip' + (c === cur ? ' on' : '') + '" data-c="' + c + '">' + c + '</button>' }).join('');
            document.getElementById('list').innerHTML = P.filter(function (x) { return cur === "الكل" || x.c === cur }).map(card).join('');
        }
        function drawCart() {
            var ids = Object.keys(cart).filter(function (k) { return cart[k] > 0 }), cnt = 0, tot = 0;
            var rows = ids.map(function (k) {
                var x = find(k), q = cart[k]; cnt += q; tot += x.p * q;
                return '<div class="item"><div class="t" style="background:' + x.bg + '">' + x.e + '</div><div class="d"><b>' + x.n + '</b><br><small>' + x.p + ' ر.س</small></div><div class="qty"><button data-q="-1" data-id="' + k + '" aria-label="إنقاص">−</button><b>' + q + '</b><button data-q="1" data-id="' + k + '" aria-label="زيادة">+</button></div><b>' + (x.p * q) + ' ر.س</b><button class="rm" data-rm="' + k + '">حذف</button></div>'
            }).join('');
            document.getElementById('count').textContent = cnt;
            document.getElementById('cartBody').innerHTML = ids.length ?
                '<div class="cartwrap"><div>' + rows + '</div><div class="sum"><div><span>المجموع الفرعي</span><span>' + tot + ' ر.س</span></div><div><span>الشحن</span><span>' + (tot >= 300 ? 'مجاني' : '25 ر.س') + '</span></div><div class="tot"><span>الإجمالي</span><span>' + (tot + (tot >= 300 ? 0 : 25)) + ' ر.س</span></div><button class="btn" id="checkout">إتمام الطلب</button><a class="btn line" href="#products">متابعة التسوق</a></div></div>'
                : '<div class="empty"><div style="font-size:56px">🛒</div><b>سلتك فارغة</b><br><span style="color:var(--muted)">أضف منتجات من المتجر للبدء</span><br><a class="btn" href="#products">تصفّح المنتجات</a></div>';
        }
        function toast(t) { var el = document.getElementById('toast'); el.textContent = t; el.classList.add('show'); clearTimeout(toast.t); toast.t = setTimeout(function () { el.classList.remove('show') }, 1800) }
        function route() {
            var h = (location.hash || '#home').slice(1); if (!document.getElementById(h)) h = 'home';
            document.querySelectorAll('.page').forEach(function (s) { s.classList.toggle('on', s.id === h) });
            document.querySelectorAll('nav a').forEach(function (a) { a.classList.toggle('on', a.dataset.p === h) });
            window.scrollTo(0, 0);
        }
        document.addEventListener('click', function (e) {
            var t = e.target, a = t.closest('.add'), c = t.closest('.chip'), q = t.closest('[data-q]'), r = t.closest('[data-rm]');
            if (a) { cart[a.dataset.id] = (cart[a.dataset.id] || 0) + 1; save(); drawCart(); toast('تمت الإضافة إلى السلة') }
            if (c) { cur = c.dataset.c; draw() }
            if (q) { var id = q.dataset.id; cart[id] = Math.max(0, (cart[id] || 0) + Number(q.dataset.q)); save(); drawCart() }
            if (r) { delete cart[r.dataset.rm]; save(); drawCart() }
            if (t.id === 'checkout') { cart = {}; save(); drawCart(); toast('تم استلام طلبك، شكرًا لك!') }
        });
        document.getElementById('cartBtn').onclick = function () { location.hash = '#cart' };
        var ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        function say(id, t, good) { var m = document.getElementById(id); m.textContent = t; m.className = 'msg ' + (good ? 'ok' : 'err') }
        document.getElementById('loginForm').onsubmit = function (e) {
            e.preventDefault();
            if (!ok.test(le.value)) return say('lm', 'أدخل بريدًا إلكترونيًا صحيحًا');
            if (!lp.value) return say('lm', 'أدخل كلمة المرور');
            say('lm', 'تم تسجيل الدخول بنجاح', 1); setTimeout(function () { location.hash = '#products' }, 700)
        };
        document.getElementById('regForm').onsubmit = function (e) {
            e.preventDefault();
            if (rn.value.trim().length < 2) return say('rm', 'أدخل اسمك الكامل');
            if (!ok.test(re.value)) return say('rm', 'أدخل بريدًا إلكترونيًا صحيحًا');
            if (rp.value.length < 8) return say('rm', 'كلمة المرور يجب ألا تقل عن 8 أحرف');
            say('rm', 'تم إنشاء حسابك بنجاح', 1); setTimeout(function () { location.hash = '#products' }, 700)
        };
        window.addEventListener('hashchange', route); draw(); drawCart(); route();
    </script>
</body>

</html>