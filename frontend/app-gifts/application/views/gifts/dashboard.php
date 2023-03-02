<script>window.jQuery || document.write('<script src="<?= base_url('assets/jquery/js/jquery.min.js') ?>"><\/script>');</script>

<div class="card border-primary mb-3">
    <div class="card-body">
        <div id="rowGifts" class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
            <div class="col">
                Sedang memproses...
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var base_url = '<?= base_url(); ?>';

    $(document).ready(function () {
        function getGifts() {
            var settings = {
                "url": "http://localhost:8080/folkatech-test/backend/test-rest-server/api/gifts",
                "method": "GET",
                "timeout": 0,
                "data": {
                    // "limit": 2,
                    // "offset": 2
                }
            };

            $.ajax(settings).done(function (response) {
                console.log(response);

                if (response.status) {
                    let giftList = "";

                    for (var i = 0, max = response.data.length; i < max; i++) {
                        let id = response.data[i].id;
                        let title = response.data[i].title;
                        let image = response.data[i].image;
                        let sort_desc = response.data[i].sort_desc;
                        let category = response.data[i].category;
                        let created_date = response.data[i].created_date;
                        let info_produk = response.data[i].info_produk;
                        let points = response.data[i].points;
                        let reviewsLength = response.data[i].reviews.length;
                        let reviewsStars = reviewsLength > 0 ? response.data[i].reviews[0].stars : 0;
                        let reviewsWish = reviewsLength > 0 ? response.data[i].reviews[0].wish : 0;
                        let status = response.data[i].status;
                        let is_new = response.data[i].is_new;
                        let updated_at = response.data[i].updated_at;

                        giftList += createGiftCard(id, title, image, sort_desc, category, created_date, info_produk, points, reviewsLength, reviewsStars, reviewsWish, status, is_new, updated_at);
                    }

                    $('#rowGifts').html(giftList);

                    $('.card-gift').click(function () {
                        let thisUrl = $(this).data('url');
                        console.log(thisUrl);
                        window.open(thisUrl, '_self');
                    });
                }
            });
        }
        function createGiftCard(id, title, image, sort_desc, category, created_date, info_produk, points, reviewsLength, reviewsStars, reviewsWish, status, is_new, updated_at) {
            let stars = "";

            if (reviewsStars > 0) {
                for (var j = 0, maxJ = reviewsStars; j < maxJ; j++) {
                    stars += `<i class="text-warning fas fa-star"></i>`;
                }
            }

            for (var i = 0, maxI = (5 - reviewsStars); i < maxI; i++) {
                stars += `<i class="far fa-star"></i>`;
            }

            let card = `
            <div class="col mb-4">
                <div class="card card-gift ${is_new === "true" ? "is-new" : ""} h-100" data-url="<?= site_url('Gifts') ?>/detail/${id}" role="button">
                    <img src="<?= base_url('assets/image/gifts/') ?>${image}" loading="lazy" width="100" height="auto" class="card-img-top" alt="${title}">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-1 pb-1">${title}</h5>
                        <p class="card-text mb-1 pb-1">${sort_desc}</p>
                        <p class="text-success mb-1 pb-1 text-point">
                            <i class="fas fa-coins"></i> ${points} points
                        </p>
                        <div class="row row-cols-2">
                            <div class="col-8 text-reviews pr-0">
                                <p class="mb-1 pb-1">
                                    ${stars}
                                </p>
                                <p class="mb-0 pb-0">
                                    ${reviewsLength} reviews
                                </p>
                            </div>
                            <div class="col-4 text-wish pl-0">
                                <p class="text-right"><i class="${reviewsWish === "true" ? "fas text-danger" : "far"} fa-heart"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

            return card;
        }

        getGifts();
    });
</script>
