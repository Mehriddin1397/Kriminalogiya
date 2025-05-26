<div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 footer__link">
                <h4 class="text-light mb-4">{{__('lan.address')}}</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>@if($contact)
                        {{$contact->address}}
                    @endif</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="tel:@if($contact){{$contact->phone}}@endif"
                                                                       class="">@if($contact)
                            {{$contact->phone}}
                        @endif</a></p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>@if($contact)
                        {{$contact->email}}
                    @endif</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>kti@iiv.uz</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" target="_blank"
                       href="@if($contact) {{$contact->telegram_link}} @endif"><i class="fab fa-telegram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                       href="@if($contact) {{$contact->facebook_link}} @endif"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                       href="@if($contact) {{$contact->youtube_link}} @endif "><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                       href="@if($contact) {{$contact->whatsapp_link}} @endif"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-light mb-4">{{__('lan.services')}}</h4>
                <a class="btn btn-link" href="{{route('categoryId',34)}}">{{__('lan.ish_qab')}}</a>
                <a class="btn btn-link" href="{{route('show',['category_id'=>30,'id'=>3])}}">{{__('lan.dis_mav')}}</a>
                <a class="btn btn-link" href="{{route('categoryId',31)}}">{{__('lan.tadqiq')}}</a>
                <a class="btn btn-link" href="{{route('show',['category_id'=>35,'id'=>1])}}">{{__('lan.pul_xiz')}}</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-light mb-4">{{__('lan.sayt_xaritasi')}}</h4>
                <a class="btn btn-link" href="{{route('categoryId',14)}}">{{__('lan.maqolalar')}}</a>
                <a class="btn btn-link" href="{{route('categoryId',15)}}">{{__('lan.kitobxonlik')}}</a>
                <a class="btn btn-link" href="{{route('categoryId',22)}}">{{__('lan.xor_yan')}}</a>
                <a class="btn btn-link" href="{{route('categoryId',8)}}">{{__('lan.mah_yan')}}</a>
            </div>
            <div>
                <!-- START WWW.UZ TOP-RATING -->
                <SCRIPT language="javascript" type="text/javascript">
                    <!--
                    top_js = "1.0";
                    top_r = "id=47852&r=" + escape(document.referrer) + "&pg=" + escape(window.location.href);
                    document.cookie = "smart_top=1; path=/";
                    top_r += "&c=" + (document.cookie ? "Y" : "N")
                    //-->
                </SCRIPT>
                <SCRIPT language="javascript1.1" type="text/javascript">
                    <!--
                    top_js = "1.1";
                    top_r += "&j=" + (navigator.javaEnabled() ? "Y" : "N")
                    //-->
                </SCRIPT>
                <SCRIPT language="javascript1.2" type="text/javascript">
                    <!--
                    top_js = "1.2";
                    top_r += "&wh=" + screen.width + 'x' + screen.height + "&px=" +
                        (((navigator.appName.substring(0, 3) == "Mic")) ? screen.colorDepth : screen.pixelDepth)
                    //-->
                </SCRIPT>
                <SCRIPT language="javascript1.3" type="text/javascript">
                    <!--
                    top_js = "1.3";
                    //-->
                </SCRIPT>
                <SCRIPT language="JavaScript" type="text/javascript">
                    <!--
                    top_rat = "&col=80312D&t=ffffff&p=F4AD00";
                    top_r += "&js=" + top_js + "";
                    document.write('<a href="http://www.uz/ru/res/visitor/index?id=47852" target=_top><img src="img/111.jpg?' + top_r + top_rat + '" width=88 height=31 border=0 alt="Топ рейтинг www.uz"></a>')//-->
                </SCRIPT>
                <NOSCRIPT><A href="http://www.uz/ru/res/visitor/index?id=47852" target=_top><IMG height=31
                                                                                                 src="img/111.jpg"
                                                                                                 width=88 border=0
                                                                                                 alt="Топ рейтинг www.uz"></A>
                </NOSCRIPT><!-- FINISH WWW.UZ TOP-RATING -->

            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom"
                              href="https://kti.iiv.uz">Kriminalogiya</a>, {{__('lan.bar_huq_him')}}
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://mekhriddin.vercel.app/">Mehriddin Soyibov</a>
                </div>
            </div>
        </div>
    </div>
</div>
