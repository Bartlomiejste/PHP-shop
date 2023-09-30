$(function () {
    $("a#filter-button").click(function () {
        const form = $("form.sidebar-filter").serialize();
        $.ajax({
            method: "GET",
            url: "/",
            data: form,
        })
            .done(function (response) {
                $("div#products-wrapper").empty();

                $.each(response.data, function (index, product) {
                    const html = `
                    <div class="col">
                        <div class="card">
                            <img src="${getImage(
                                product
                            )}" class="card-img-top" alt="ProductImg">
                            <div class="card-body text-center">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">PLN ${product.price}</p>
                            </div>
                        </div>
                    </div>
                `;
                    $("div#products-wrapper").append(html);
                });
            })

            .fail(function (response) {
                alert("Error");
            });
    });

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
