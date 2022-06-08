<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?=$atz->site_url['main']?>assets/jquery-3.6.0/jquery-3.6.0.min.js"></script>
<script src="<?=$atz->site_url['main']?>assets/bootstrap-4.6.0/js/bootstrap.bundle.min.js"></script>

<!-- Owl Carousel -->
<script src="<?=$atz->site_url['main']?>assets/owl.carousel-2.3.4/js/owl.carousel.min.js"></script>

<!-- Splide -->
<script src="<?=$atz->site_url['main']?>assets/splide-4.0.1/js/splide.min.js"></script>

<!-- SimplyScroll -->
<script src="<?=$atz->site_url['main']?>assets/jquery-simplyscroll-2.1.1/jquery.simplyscroll.min.js"></script>

<!-- Jquery Validate -->
<script src="<?=$atz->site_url['main']?>assets/jquery-validation-1.19.3/jquery.validate.min.js"></script>

<!-- Rater.js -->
<script src="<?=$atz->site_url['main']?>assets/raterjs/rater.min.js"></script>

<script>
    $("button").click(function(){
        $("p").toggleClass("main");
    });
</script>

<script>
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
        });

        return false;
    });
</script>

<script>
    (function($) {
        $(function() {
            $("#scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
        });
    })(jQuery);

    $().ready(function(e) {
        $('.list-video').change(function(){
          var url='https://www.youtube.com/embed/'+$(this).val();
          $('#ajax_video iframe').attr('src',url);
        })
    });
</script>

<!-- SEO -->
<?=SETTING['Setting_JS']?>