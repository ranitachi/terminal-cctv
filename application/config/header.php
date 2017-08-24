<div class="header">
    <div class="header-banner">
        <div class="container">
            <div class="top-menu">
                <span class="menu"></span>
                <ul>
                    <li><a href="<?PHP echo $url_home; ?>" class="scroll" style="padding:0px">HOME</a></li>
                    <li><a href="<?PHP echo $url_about; ?>" class="scroll" style="padding:0px">ABOUT</a></li>
                    <li><a href="<?PHP echo $url_contact; ?>" class="scroll" style="padding:0px">CONTACT</a></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <!--script-nav-->
            <script>
                $("span.menu").click(function () {
                    $(".top-menu ul").slideToggle("slow", function () {
                    });
                });
            </script>
            
            <div class="header-banner-info text-center" id="HOME">
                <a href="#">
                    <img src="<?PHP echo $dir_images; ?>/logo.png" alt="" /></a>
                <h3>HELLO</h3>
                <h1>my name is <span>Yoanes,</span> </h1>
                <p>I'm a Web Developer, born in Jekardah - Indonesia. </p>
                <span class="line"></span>
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/yoanes.b.satryapratama"><i class="facebook"></i></a></li>
                </ul>
                <label></label>
                <ul class="details">
                    <li>Age     :     <a href="#">26</a></li>
                    <li>Country     :     <a href="#">INDONESIA</a></li>
                    <li>Working at     :     <a href="#">FREELANCE</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>