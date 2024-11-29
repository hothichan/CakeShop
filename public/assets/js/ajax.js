

$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    //remove to cart
    $(document).on("click", ".btn_cart_remove", function () {
        if (
            confirm(
                "Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?"
            )
        ) {
            var itemCartId = $(this).data("item_cart_id");
            var removeToCartUrl = $(this).data("url");
            $.ajax({
                url: removeToCartUrl,
                type: "POST",
                data: {
                    _token: csrfToken,
                    item_cart_id: itemCartId,
                },
                success: function (response) {
                    alert(response.message);
                    $("#cartList").html(response.html);
                    var totalCart = parseInt($("#countItemCart").text()) - 1;
                    $("#countItemCart").text(totalCart);
                }.bind(this),
                error: function (response) {
                    alert(response.error);
                },
            });
        }
    });

    //add to cart
    $(document).on("click", ".addToCart", function () {
        var productId = $(this).data("product_id");
        var addToCartUrl = $(this).data("url");
        $.ajax({
            url: addToCartUrl,
            type: "POST",
            data: {
                _token: csrfToken,
                product_id: productId,
            },
            success: function (response) {
                alert(response.message);
                window.location.reload();
            }.bind(this),
            error: function (response) {
                alert(response.error);
            },
        });
    });

    //favorite item
    $(document).on("click", ".favorited", function () {
        var productId = $(this).data("product_id");
        var favoriteUrl = $(this).data("url");
        $.ajax({
            url: favoriteUrl,
            type: "POST",
            data: {
                _token: csrfToken,
                product_id: productId,
            },
            success: function (response) {
                if ($(this).css("background-color") === "rgb(188, 129, 87)") {
                    alert(response.message)
                    $(this).css("background-color", "#ffffff");
                } else {
                    alert(response.message)
                    $(this).css("background-color", "#bc8157");
                }
                // window.location.reload();
            }.bind(this),
            error: function (response) {
                alert(response.error);
            },
        });
    });

    //price filter
    $(document).on("click", ".price_filter", function () {
        var jsInputMin = $(".js-input-from").val();
        var jsInputMax = $(".js-input-to").val();
        var urlPriceFilter = $(this).data("price_filter");

        let url = window.location.pathname;
        let id = url.split("/shop/")[1];
        if (id) {
            $.ajax({
                url: urlPriceFilter,
                type: "POST",
                data: {
                    _token: csrfToken,
                    min_price: jsInputMin,
                    max_price: jsInputMax,
                    category_id: id,
                },
                success: function (response) {
                    $("#listItem").html(response.html);
                },
                error: function (response) {
                    alert(response.error);
                },
            });
        } else {
            $.ajax({
                url: urlPriceFilter,
                type: "POST",
                data: {
                    _token: csrfToken,
                    min_price: jsInputMin,
                    max_price: jsInputMax,
                },
                success: function (response) {
                    $("#listItem").html(response.html);
                },
                error: function (response) {
                    alert(response.error);
                },
            });
        }
    });

    //search items
    $(".sidebars_search").on("submit", function (e) {
        e.preventDefault(); // Chặn hành động mặc định của form
    });

    $(document).on("click", ".search_btn", function () {
        var searchValue = $(".name_item").val();
        var urlSearchName = $(this).data("search_name");
        $.ajax({
            url: urlSearchName,
            type: "POST",
            data: {
                _token: csrfToken,
                itemName: searchValue,
            },
            success: function (response) {
                $("#listItem").html(response.html);
            },
            error: function (response) {
                alert(response.error);
            },
        });
    });

    // SortBy
    $(document).on("change", "#SortBy", function () {
        var sortByValue = $(this).val();
        var urlSortBy = $(this).data("sort");
        $.ajax({
            url: urlSortBy,
            type: "POST",
            data: {
                _token: csrfToken,
                sort_by_value: sortByValue,
            },
            success: function (response) {
                $("#listItem").html(response.html);
            },
            error: function (response) {
                alert(response.error);
            },
        });
    });

    //comments
    $("#comments_prod").on("submit", function (e) {
        e.preventDefault(); // Chặn hành động mặc định của form
    });
    $(document).on("click", ".review_btn", function () {
        var selectedValue = $('input[name="star"]:checked').val();
        var cmt_content = $(".comment_content").val();
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            data: {
                _token: csrfToken,
                rating: selectedValue,
                comment: cmt_content,
                product_id: $(this).data("product_id"),
            },
            success: function (response) {
                $("#comments_prod").html(response.html);
            },
            error: function (response) {
                alert(response.error);
            },
        });
    });
});
