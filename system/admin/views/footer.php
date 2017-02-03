
</div>
</section>

<footer id="footer">
    Copyright &copy; 2015 Material Admin

    <ul class="footer__menu">
        <li><a href="">Home</a></li>
        <li><a href="">Dashboard</a></li>
        <li><a href="">Reports</a></li>
        <li><a href="">Support</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</footer>

</section>

<!-- Older IE Warning -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="ie-warning__container">
        <ul class="ie-warning__download">
            <li>
                <a href="javascript:if(confirm(%27http://www.google.com/chrome/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.google.com/chrome/%27">
                    <img src="<?php echo \system\config::$site_adr;?>admin/template/img/browsers/chrome.png">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="javascript:if(confirm(%27https://www.mozilla.org/en-US/firefox/new/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?%27))window.location=%27https://www.mozilla.org/en-US/firefox/new/%27">
                    <img src="<?php echo \system\config::$site_adr;?>admin/template/img/browsers/firefox.png">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="javascript:if(confirm(%27http://www.opera.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.opera.com/%27">
                    <img src="<?php echo \system\config::$site_adr;?>admin/template/img/browsers/opera.png">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="javascript:if(confirm(%27https://www.apple.com/safari/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?%27))window.location=%27https://www.apple.com/safari/%27">
                    <img src="<?php echo \system\config::$site_adr;?>admin/template/img/browsers/safari.png">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="javascript:if(confirm(%27http://windows.microsoft.com/en-us/internet-explorer/download-ie  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://windows.microsoft.com/en-us/internet-explorer/download-ie%27">
                    <img src="<?php echo \system\config::$site_adr;?>admin/template/img/browsers/ie.png">
                    <div>IE (New)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<!-- Javascript Libraries -->
<script type="text/javascript">
    var site_adr = "<?php echo \system\config::$site_adr;?>";
    var site_file_admin = "<?php echo \system\config::$admin_file;?>";
    var msg_success = "<?php echo admin\lang::$msg_success;?>";
    var msg_error = "<?php echo admin\lang::$msg_error;?>";
    var msg_info = "<?php echo admin\lang::$msg_info;?>";
</script>
<!-- jQuery -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo \system\config::$site_adr; ?>java/dist/summernote.min.js"></script>
<script src="<?php echo \system\config::$site_adr; ?>java/dist/lang/summernote-ru-RU.js"></script>
<script src="<?php echo \system\config::$site_adr; ?>java/dist/plugin/specialchars/summernote-ext-specialchars.js"></script>
<!-- Malihu ScrollBar -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

<!-- Moment -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/moment/min/moment.min.js"></script>

<!-- NoUiSlider -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/nouislider/distribute/nouislider.min.js"></script>

<!-- Bootstrap Date/Time Picker -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/locales/ru.js"></script>

<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Select 2 -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Simple File Input -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/fileinput/fileinput.min.js"></script>

<!-- jQuery Mask -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<!-- Farbtastic Color Picker -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/farbtastic/farbtastic.min.js"></script>

<!-- FullCalendar -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Simple Weather -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>

<!-- Salvattore -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>

<!-- Flot Charts -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/flot/jquery.flot.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/flot/jquery.flot.resize.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>

<!-- Sparkline Charts -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- EasyPie Charts -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- Bootgrid -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.min.js"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="<?php echo \system\config::$site_adr;?>admin/template/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->

<!-- Demo Only -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/flot-charts/curved-line.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/flot-charts/line.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/easy-pie-charts.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/misc.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/sparkline-charts.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/calendar.js"></script>
<script src="<?php echo \system\config::$site_adr;?>admin/template/demo/js/data-table.js"></script>



<!-- Site Functions & Actions -->
<script src="<?php echo \system\config::$site_adr;?>admin/template/js/app.min.js"></script>
</body>
</html>
