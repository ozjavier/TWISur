(function () {
  function initFeatures() {
    var el = document.querySelector(".features-slider");
    if (!el || el.dataset.blazeInit === "1") return;

    var instance = null;
    var mq = window.matchMedia("(max-width: 1023px)");

    function sync() {
      if (mq.matches && !instance) {
        instance = new BlazeSlider(el, {
          all: {
            slidesToShow: 1,
            slidesToScroll: 1,
            slideGap: "1rem",
            loop: true,
            enableAutoplay: false,
            transitionDuration: 400,
          },
          "(min-width: 768px)": { slidesToShow: 2 },
        });
        el.dataset.blazeInit = "1";
        if (typeof lucide !== "undefined") lucide.createIcons();
      } else if (!mq.matches && instance) {
        instance.destroy();
        instance = null;
        el.dataset.blazeInit = "";
      }
    }
    sync();
    (mq.addEventListener ? mq.addEventListener : mq.addListener).call(
      mq,
      "change",
      sync,
    );
  }

  // Reintenta hasta que BlazeSlider esté definido (máx ~3s)
  var tries = 0;
  (function waitForBlaze() {
    if (typeof BlazeSlider !== "undefined") return initFeatures();
    if (tries++ > 60) return; // se rinde tras ~3s
    setTimeout(waitForBlaze, 50);
  })();
})();
