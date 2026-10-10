<section id="overview" class="section active-section">
    <!-- Hero -->

    <div class="hero">
        <div>
            <p class="eyebrow">FLOVER ADMIN</p>

            <h1>حديقتك، في لمحة</h1>

            <p>أهلاً ، يوم جديد مليء بالورد.</p>
        </div>

        <button class="primary-btn" id="heroAdd" type="button">
            ＋ إضافة منتج جديد
        </button>
    </div>

    <!-- ================= STATISTICS ================= -->

    <div class="stats-grid">
        <!-- Low Stock -->

        <div class="stat-card">
            <span class="stat-icon"> ❀ </span>

            <div>
                <small> منتجات منخفضة المخزون </small>

                <strong id="lowStockStat"> 44 </strong>

                <em> تحتاج إلى عنايتك </em>
            </div>
        </div>

        <div class="stat-card">
            <span class="stat-icon"> د.أ </span>

            <div>
                <small> الإيرادات اليوم </small>

                <strong> 486 JOD </strong>
            </div>
        </div>

        <div class="stat-card">
            <span class="stat-icon"> ↗ </span>

            <div>
                <small> طلبات اليوم </small>

                <strong> 12 </strong>

                <em> ٤ طلبات قيد التحضير </em>
            </div>
        </div>

        <div class="stat-card">
            <span class="stat-icon"> ✿ </span>

            <div>
                <small> اجمالي المنتجات </small>

                <strong id="totalProductsStat"> 48 </strong>

                <em> باقة بعناية وحب </em>
            </div>
        </div>
    </div>

    <div class="section-heading">
        <div>
            <h2>باقاتكِ المختارة</h2>

            <p>تفاصيل صغيرة، تصنع لحظات لا تُنسى.</p>
        </div>

        <a href="#products" data-section="products"> عرض الكل ← </a>
    </div>

    <!-- ================= FILTERS ================= -->

    <div class="toolbar">
        <select id="categoryFilter">
            <option value="all">كل التصنيفات</option>

            <option value="باقات">باقات</option>

            <option value="ورد طبيعي">ورد طبيعي</option>

            <option value="هدايا">هدايا</option>

            <option value="نباتات">نباتات</option>
        </select>

        <select id="stockFilter">
            <option value="all">كل حالات المخزون</option>

            <option value="available">متوفر</option>

            <option value="low">مخزون منخفض</option>

            <option value="out">نفد المخزون</option>
        </select>

        <div class="product-search">
            <span> ⌕ </span>

            <input id="productSearch" type="search" placeholder="البحث عن المنتج…" />
        </div>
    </div>

    <div id="productGrid" class="product-grid">
        <!-- JavaScript will generate products here -->
    </div>

    <div class="section-heading orders-heading">
        <div>
            <h2>أحدث الطلبات</h2>

            <p>تابع آخر حركة في متجرك</p>
        </div>

        <a href="#orders" data-section="orders"> عرض الكل ← </a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>رقم الطلب</th>
                    <th>العميل</th>
                    <th>المنتج</th>
                    <th>الإجمالي</th>
                    <th>الحالة</th>
                </tr>
            </thead>

            <tbody id="recentOrders">
                <!-- JavaScript will generate orders -->
            </tbody>
        </table>
    </div>
</section>