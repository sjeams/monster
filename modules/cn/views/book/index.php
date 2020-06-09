<link rel="stylesheet" href="https://file.viplgw.cn/ui/book/cn/css/bookIndex.css?v=1.1.1">
<link rel="stylesheet" href="https://file.viplgw.cn/ui/public/css/swiper.min.css">
<script src="https://file.viplgw.cn/ui/public/js/jquery-1.12.2.min.js"></script>
<script src="https://file.viplgw.cn/ui/public/js/swiper.min.js"></script>

<section>
    <!--    轮播-->
    <div class="banner">
        <div class="swiper-container  topBanner">
            <div class="swiper-wrapper">
                <!-- <div class="swiper-slide"><img src="https://gre.viplgw.cn//files/attach/images/20200509/1588989306694001.jpg" alt=""></div>
                <div class="swiper-slide"><img src="https://gre.viplgw.cn//files/attach/images/20200509/1588989306694001.jpg" alt=""></div> -->
                <?php   foreach($banner as $ban){ ?>
                    <div class="swiper-slide"><a href="<?php  echo $ban['content']?>"><img src="<?php  echo $ban['image']?>" alt=""> </a> </div>
                <?php   } ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination topPagination"></div>
        </div>
    </div>

</section>
<script>
    var BannerSwiper = new Swiper('.topBanner', {
        slidesPerView: 1,
        loop: true,
        pagination: {
            el: '.topPagination',
            clickable: true,
        },
        autoplay: {
            disableOnInteraction: false,//操作之后是否默认停止
            delay: 2000,//1秒切换一次
        },
    });
    $('.btnActive').click(function () {
        $('.btnActive').removeClass('on');
        $(this).addClass('on');
        $('.hotBookCover').css({'display':'none'});
        $('.hotBookCover').eq($(this).index()).css({'display':'flex'});
    });
    var  TeacherSwiper = new Swiper('.teacherCoverContainer', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop : true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>