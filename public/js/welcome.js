$(function () {
    $("div.products-count a").click(function (event) {
        event.preventDefault();
        $("a.products-actual-count").text($(this).text());
        let count = $(this).text() === "Wszystkie" ? -1 : $(this).text();
        getProducts(count);
    });

    $("a#filter-button").click(function (event) {
        event.preventDefault();
        getProducts($("a.products-actual-count").first().text());
    });

    $(document).on("click", ".add-cart-button", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: WELCOME_DATA.addToCart + $(this).data("id"),
        })
            .done(function () {
                Swal.fire({
                    title: "Dodano!",
                    text: "Produkt dodany do koszyka!",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonText:
                        '<i class="fas fa-cart-plus"></i> Przejdź do koszyka',
                    cancelButtonText:
                        '<i class="fas fa-shopping-bag"></i> Kontynuuj zakupy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = WELCOME_DATA.listCart;
                    }
                });
            })
            .fail(function () {
                Swal.fire("Oops...", "Wystąpił błąd", "error");
            });
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
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">PLN ${product.price}</p>
                            </div>
                            <button class="btn btn-success btn-sm add-cart-button" data-id="${
                                product.id
                            }" ${getDisabled()}><i class="fa-solid fa-cart-shopping"></i> Dodaj do koszyka</button>
                        </div>
                    </div>
                `;
                $("div#products-wrapper").append(html);
            });
        });
    }

    function getImage(product) {
        if (!!product.image_path) {
            return WELCOME_DATA.storagePath + product.image_path;
        }
        return WELCOME_DATA.defaultImage;
    }

    function getDisabled() {
        if (WELCOME_DATA.isGuest) {
            return "disabled";
        }
        return "";
    }
});
