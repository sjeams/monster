



<style>

/* 实现了宽度为父容器宽度减去固定的300像素  */
/* div{ 
    width:-webkit-calc(100% - 300px); 
    width:-moz-calc(100% - 300px); 
    width:calc(100% - 300px); 
} */


/* 视频背景 */
.log{ width: 80px;  height:80%;
    filter: drop-shadow(0 0 2px #2b002b) drop-shadow(0 0 15px #141427) drop-shadow(0 0 5px #f0f);-webkit-filter: drop-shadow(0 0 2px #2b002b) drop-shadow(0 0 15px #ff0000) drop-shadow(0 0 5px #f0f);

}
.fullscreenvideo {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    -webkit-transition: 1s opacity;
    transition: 1s opacity;
}
 
.videocontainer{
    position: fixed;
    width: 100%;
    height: 100%;
    overflow: scroll;
    z-index: -100; 
}
 
.videocontainer:before{
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    display: block;
    z-index: -1;
    top: 0;
    left: 0;
    background: rgba(0,0,0,0);
}


/* 布局 */
.header{ position:fixed; margin:0px auto; left:0; right:0;top:0;width:100%; height:40px;  background: #444444; text-align: center; line-height: 40px; z-index: 100; color:  white;}
.content{  position:absolute; margin:40px auto ; left:0; top:0; right:0;bottom:0;  width:calc(100% - 320px);  height:100%; }
.left{ position:fixed; margin:40px 40px; float: left; }
.center{  position:relative; margin:0px auto; 
    box-shadow:2px 2px 6px #000000 inset;  width:100%; height:200px; border-radius: 5px; background: rgba(255, 255, 255, 0.7) ;
 }
.right{ position:fixed; margin:40px 40px; right:10px;bottom:10px; 
    box-shadow:2px 2px 6px rgba(0, 0, 0, 0) inset; width:80px; height:80px; border-radius: 5px; background: rgba(255, 255, 255, 0); 
    }


.foot{ position:fixed; margin:0px auto; left:0; right:0;bottom:0;width:100%; height:20px;  background: #FFFFFF; text-align: center; line-height: 20px; z-index: 100;color:  #000000; }
/* .box2 img {box-shadow:2px 0px 0px #000}  */
.clear{position: absolute; margin:10px 10px; }
.saoma{width: 100%; text-align: center} 
.topBanner{ height: 400px;      border-radius: 5px;  }
.imgwidth{

    /* border: 1px solid blue; */
    position: absolute;
    /* margin-top:0px ; */
    height: 400px;
    width: 100%;
    margin: 0px auto;
    /* background: url(pc/image/lunbo/lunbo5) no-repeat; */
    background-size: cover;
}
</style>
<!-- <link rel="stylesheet" href="https://file.viplgw.cn/ui/book/cn/css/bookIndex.css?v=1.1.2"> -->
<link rel="stylesheet" href="public/css/swiper.min.css">
<script src="public/js/jquery-1.12.2.min.js"></script>
<script src="public/js/swiper.min.js"></script>

<section>
    <div class="header">
           轮回之门官网
    </div> 
    <div class="videocontainer">
        <video class="fullscreenvideo" playsinline="" autoplay="" muted="" loop="">
        <!-- <source src="pc/image/video/background.mov" type="video/mp4"> -->
        </video>
        <div class="left box2"><img src="pc/image/video/lunhui.png" alt="" class="log">  
        <!-- <iframe src="https://zhanyuzhang.github.io/lovely-cat/cat.html" id="catIframe" frameborder="0"></iframe> -->
        </div> 
            <div class="content">
                <!--    轮播-->
                <div class="banner">
                    <div class="swiper-container  topBanner">
                        <div class="swiper-wrapper">
                            <!-- <div class="swiper-slide imgwidth"><a href=""><img src="pc/image/lunbo/lunbo1.jpg" alt=""></a></div> -->
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo1.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo2.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo3.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo4.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo5.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo6.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo7.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo8.jpg" alt="" class="imgwidth"></a></div>
                            <div class="swiper-slide "><a href=""><img src="pc/image/lunbo/lunbo9.jpg" alt="" class="imgwidth"></a></div>

                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination topPagination"></div>
                    </div>
                </div>

                <div class="center box">
                    <div class="clear">最新公告：<br>
                        服务器于2020年9月进行公测！
                    </div>
                </div> 
                
                <div style="height:20px"> </div>
            </div>
            <div class="right">
                <img src="pc/image/kefu/lun1.png" style="width:100%;height:100%"   alt="">
                <div class="saoma">APP下载</div>
            </div> 
    </div>

    <div class="foot">
            轮回工作室-邮箱：359824901@qq.com
    </div> 
</section>

<script>
        var BannerSwiper = new Swiper('.topBanner', {
            slidesPerView: 1,
            loop: true,
            tdFlow:{
                rotate:-30,  //旋转的角度
                stretch:10,  //拉伸
                depth:150,  //深度
                modifier:1, //修正值（该值越大前面的效果越明显）
                slideShadows:true  //页面阴影效果
            },
            pagination: {
                el: '.topPagination',
                clickable: true,
            },

            autoplay: {
                disableOnInteraction: false,//操作之后是否默认停止
                delay: 2000,//1秒切换一次
            },

        });
        // $('.btnActive').click(function () {
        //     $('.btnActive').removeClass('on');
        //     $(this).addClass('on');
        //     $('.hotBookCover').css({'display':'none'});
        //     $('.hotBookCover').eq($(this).index()).css({'display':'flex'});
        // });
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