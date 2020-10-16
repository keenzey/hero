    <footer class="mt-auto bg-white pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase"><?php echo escape_with_html(BASE_title); ?> Network</h5>
                    <p>Entertainment content from all over the web.</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5>Privacy & Terms</h5>
                    <ul class="list-unstyled">
                        <li><a href="">DMCA</a></li>
                        <li><a href="">Privacy</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5>Links</h5>
                    <ul class="list-unstyled">

                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-3"> © Copyright : <a target="_blank" rel="noopener" href="https://www.youtube.com"> youtube.com</a></div>
    </footer>
    <script>
        var cb = function() { var link = document.createElement('link'); link.rel = 'stylesheet'; link.href = 'https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css'; var h = document.getElementsByTagName('head')[0]; h.appendChild(link); if (link.addEventListener) { link.addEventListener('load', function() { document.getElementById('preloading').style.display = "none"; }, false); } }; var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame; if (raf) raf(cb); else window.addEventListener('load', cb);
    </script>
    <script async="" src="<?php echo BASE_url; ?>/js/app.js"></script>
    <script type="text/javascript" src="<?php echo BASE_ads_js; ?>"></script>
    <script>
        window.onload = function() {
            $(document).ready(function()
            {
                search_record();
            })
        };
        function search_record()
        {
            $("form").bind("keypress", function (e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
           $(document).on('click','#btn_search',function()
           {
                var squery = $('#nsearch-input').val();
                if(squery !== "")
                {
                    window.location.href = '/search/?s='+encodeURI(squery);
                }
           })
          
        }
    </script>
    <script type="text/javascript">
        if(!Histats_variables){var Histats_variables=[];}
        Histats_variables.push("tags","<?php echo BASE_url; ?>");
        var _Hasync= _Hasync|| [];
        _Hasync.push(['Histats.start', '1,4360507,4,0,0,0,00000000']);
        _Hasync.push(['Histats.fasi', '1']);
        _Hasync.push(['Histats.track_hits', '']);
        (function() {
        var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
        hs.src = ('//s10.histats.com/js15_as.js');
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
        })();
    </script>