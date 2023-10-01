$(function () {
    $("div.products-count a").click(function (event) {
        event.preventDefault();
        $("a.products-actual-count").text($(this).text());
        getProducts($(this).text());
    });

    $("a#filter-button").click(function () {
        getProducts($("a.products-actual-count").text());
    });

    function getProducts(paginate) {
        const form = $("form.sidebar-filter").serialize();
        $.ajax({
            method: "GET",
            url: "/",
            data: form + "&" + $.param({ paginate: paginate }),
        }).done(function (response) {
            $("div#products-wrapper").empty();

            $.each(response.data, function (index, product) {
                const html = `
                    <div class="col">
                        <div class="card" >
                            <img src="${getImage(
                                product
                            )}" class="card-img-top" alt="ProductImg" style="object-fit: cover; height:240px;">
                            <div class="card-body text-center">
                                <h5 class="card-title>${product.name}</h5>
                                <p class="card-text">PLN ${product.price}</p>
                            </div>
                        </div>
                    </div>
                `;
                $("div#products-wrapper").append(html);
            });
        });
    }
    function getImage(product) {
        if (!!product.image_path) {
            return storagePath + product.image_path;
        }
        return defaultImage;
    }

    // function getImage(product) {
    //     if (!!product.image_path) {
    //         return WELCOME_DATA.storagePath + product.image_path;
    //     }
    //     return WELCOME_DATA.defaultImage;
    // }

    // function getDisabled() {
    //     if (WELCOME_DATA.isGuest) {
    //         return " disabled";
    //     }
    //     return "";
    // }
});
