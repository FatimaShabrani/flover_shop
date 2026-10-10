<!-- ================================================= -->
<!-- ================= PRODUCTS ====================== -->
<!-- ================================================= -->

<section id="products" class="section">
    <div class="hero compact">
        <div>
            <p class="eyebrow">PRODUCT MANAGEMENT</p>

            <h1>المنتجات</h1>

            <p>أضف وعدّل وتابع مخزون المنتجات Flover.</p>
        </div>

        <button class="primary-btn" id="productsAdd" type="button">
            ＋ إضافة منتج
        </button>
    </div>

    <div class="management-card">
        <div class="management-head">
            <h2>جميع المنتجات</h2>

            <span id="productCount"> 0 منتج </span>
        </div>

        <div class="toolbar">
            <select id="allCategoryFilter">
                <option value="all">كل التصنيفات</option>

                <option value="باقات">باقات</option>

                <option value="ورد طبيعي">ورد طبيعي</option>

                <option value="هدايا">هدايا</option>

                <option value="نباتات">نباتات</option>
            </select>

            <div class="product-search">
                <span> ⌕ </span>

                <input id="allProductSearch" type="search" placeholder="ابحثي عن منتج…" />
            </div>
        </div>

        <div class="table-card plain">
            <table>
                <thead>
                    <tr>
                        <th>المنتج</th>

                        <th>التصنيف</th>

                        <th>السعر</th>

                        <th>المخزون</th>

                        <th>المباع</th>

                        <th>المتبقي</th>

                        <th>الحالة</th>

                        <th>إجراء</th>
                    </tr>
                </thead>

                <tbody id="productsTable">
                    <!-- JavaScript will generate products -->
                </tbody>
            </table>
        </div>
    </div>
</section>