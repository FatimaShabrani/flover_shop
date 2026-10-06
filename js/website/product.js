fetch("../../php/products.php")
    .then(response => response.json())
    .then(products => {

        const productsContainer = document.getElementById("productsContainer");

        productsContainer.innerHTML = "";

        products.forEach(product => {

            productsContainer.innerHTML += `
                <div class="product_cards">

                    <div class="bouquet_image">
                        <img
                            src="../../images/${product.image}"
                            alt="${product.name}"
                        />
                    </div>

                    <div class="bouquet-content">

                        <div class="bouquet-info">
                            <h3>${product.name}</h3>
                            <span class="stems">❀ Fresh flowers</span>
                        </div>

                        <p class="short-description">
                            ${product.category}
                        </p>

                        <p class="product-stock">
    ${product.stock > 0
        ? `Available: ${product.stock}`
        : `Out of Stock`
    }
</p>

                        <p class="description">
                            ${product.description}
                        </p>

                        <div class="card-bottom">

                            <div class="price">
                                <span>${product.price}</span>
                                <small>JOD</small>
                            </div>
<a href="product.php?id=${product.id}" class="details">
    View details
    <span>→</span>
</a>

                        </div>

                    </div>

                </div>
            `;

        });

    });