<script>window.jQuery || document.write('<script src="<?= base_url('assets/jquery/js/jquery.min.js') ?>"><\/script>');</script>

<div class="card border-primary mb-3">
    <div class="card-body">
        <div id="rowDetailGifts" class="row row-cols-1">
            <div class="col">
                Sedang memproses...
            </div>
            <!--
            <div class="col">
                <div class="card card-gift-detail is-new h-100">
                    <img src="<!?= base_url('assets/image/gifts/samsung-s9.webp') ?>" loading="lazy" width="100" height="auto" class="card-img-top" alt="Samsung S9">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-1 pb-1">Samsung Galaxy S9</h5>
                        <p class="card-text mb-1 pb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="reviews my-2 border-top border-bottom">
                            <div class="row row-reviews row-cols-3 py-2">
                                <div class="col-4 text-reviews border-right text-center">
                                    <p class="text-warning mb-1 pb-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <p class="mb-0 pb-0">
                                        160 reviews
                                    </p>
                                </div>
                                <div class="col-4 text-point text-center">
                                    <p class="text-success mb-0 pb-0">
                                        <i class="fas fa-coins"></i> 200.000 points
                                    </p>
                                </div>
                                <div class="col-4 text-wish border-left text-center">
                                    <p class="mb-1">
                                        <i class="fas fa-heart text-danger"></i>
                                    </p>
                                    <p class="mb-0">
                                        Add to Wishlist
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="info-produk">
                            <p class="info-title font-weight-bold mb-1 pb-1">
                                Info Produk
                            </p>
                            <p class="info-desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus tincidunt velit, eu facilisis enim blandit vel. Praesent quis quam nec nulla ultricies hendrerit vel at dui. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            </p>
                        </div>
                        <div class="row row-cols-2">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" id="button-addon3">
                                        <button class="btn btn-secondary" type="button">&minus;</button>
                                    </div>
                                    <input type="number" min="1" class="form-control text-center" placeholder="X" value="1" aria-label="Quantity" aria-describedby="button-addon3">
                                    <div class="input-group-append" id="button-addon4">
                                        <button class="btn btn-secondary" type="button">&plus;</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-outline-success rounded-pill">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-block btn-success rounded-pill">
                            Redeem
                        </button>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
</div>

<script type="text/javascript">
    var base_url = '<?= base_url(); ?>';

    $(document).ready(function () {
        function getDetailGifts(giftId) {
            var settings = {
                "url": "http://localhost:8080/folkatech-test/backend/test-rest-server/api/gifts",
                "method": "GET",
                "timeout": 0,
                "data": {
                    "id": giftId,
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

                        giftList += createDetailGiftCard(id, title, image, sort_desc, category, created_date, info_produk, points, reviewsLength, reviewsStars, reviewsWish, status, is_new, updated_at);
                    }

                    $('#rowDetailGifts').html(giftList);

                    $('.card-gift').click(function () {
                        let thisUrl = $(this).data('url');
                        console.log(thisUrl);
                        window.open(thisUrl, '_self');
                    });
                }
            });
        }
        function createDetailGiftCard(id, title, image, sort_desc, category, created_date, info_produk, points, reviewsLength, reviewsStars, reviewsWish, status, is_new, updated_at) {
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
                <div class="card card-gift-detail ${is_new === "true" ? "is-new" : ""} h-100" data-url="<?= site_url('Gifts') ?>/detail/${id}" role="button">
                    <img src="<?= base_url('assets/image/gifts/') ?>${image}" loading="lazy" width="100" height="auto" class="card-img-top" alt="${title}">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-1 pb-1">${title}</h5>
                        <p class="card-text mb-1 pb-1">${sort_desc}</p>
                        <div class="reviews my-2 border-top border-bottom">
                            <div class="row row-reviews row-cols-3 py-2">
                                <div class="col-4 text-reviews border-right text-center">
                                    <p class="mb-1 pb-1">
                                        ${stars}
                                    </p>
                                    <p class="mb-0 pb-0">
                                        ${reviewsLength} reviews
                                    </p>
                                </div>
                                <div class="col-4 text-point text-center">
                                    <p class="text-success mb-0 pb-0">
                                        <i class="fas fa-coins"></i> ${points} points
                                    </p>
                                </div>
                                <div class="col-4 text-wish border-left text-center">
                                    <p class="mb-1">
                                        <i class="${reviewsWish === "true" ? "fas text-danger" : "far"} fa-heart"></i>
                                    </p>
                                    <p class="mb-0">
                                        Add to Wishlist
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="info-produk">
                            <p class="info-title font-weight-bold mb-1 pb-1">
                                Info Produk
                            </p>
                            <p class="info-desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus tincidunt velit, eu facilisis enim blandit vel. Praesent quis quam nec nulla ultricies hendrerit vel at dui. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            </p>
                        </div>
                        <div class="row row-cols-2">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" id="button-addon3">
                                        <button class="btn btn-secondary" type="button">&minus;</button>
                                    </div>
                                    <input type="number" min="1" class="form-control text-center" placeholder="X" value="1" aria-label="Quantity" aria-describedby="button-addon3">
                                    <div class="input-group-append" id="button-addon4">
                                        <button class="btn btn-secondary" type="button">&plus;</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-outline-success rounded-pill">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-block btn-success rounded-pill">
                            Redeem
                        </button>
                    </div>
                </div>
            </div>`;

            return card;
        }

        let giftId = "<?= $this->uri->segment(3) ?>";

        if (giftId !== "") {
            getDetailGifts(giftId);
        }
    });
</script>
