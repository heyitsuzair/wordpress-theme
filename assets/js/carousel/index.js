(function ($) {
  class SlickCarousel {
    constructor() {
      this.initiateCarousel();
    }

    initiateCarousel() {
      $(document).ready(function () {
        $(".post-carousel").slick({
          autoplay: true,
          dots: true,
        });
      });
    }
  }

  new SlickCarousel();
})(jQuery);
