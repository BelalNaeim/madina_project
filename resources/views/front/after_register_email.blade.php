@extends('layouts.front.after_auth')

@section('title', 'شكراً لتسجيل حسابكم - مشاريع المدينة')
@section('content')

    <div class="layer"></div>

    <main>
        <section id="hero" class="login">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8" style="margin-top:50px;">
                        <h3 style="color:white; font-weight:bold;">مشاريع المدينة منصة إعلامية تختص برصد أخبار وتحديثات
                            مشاريع المدينة المنورة</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div id="login">
                            <div class="text-center"><a href="https://imgbb.com/"><img
                                        src="https://i.ibb.co/KbynpWs/logo-sticky.png" alt="logo-sticky" border="0"
                                        alt="Image"></a>
                            </div>
                            <hr>
                            <p style="font-size:17px; text-align:center;">حسابكم مسجل لدينا بالفعل لكن لم تقوموا بتفعيل
                                حسابكم بعد</p>
                            <center>
                                <p style="color:red; font-size:20px; font-weight:bold;">رسوم الإشتراك 199 ريال/ الشهر</p>
                            </center>
                            <center>
                                <p style="font-size:17px;">لتفعيل حسابكم برجاء التواصل معنا عبر :</p>
                                <a href="https://wa.me/+966507017493" target="_blank" class="btn btn-success">رسائل
                                    الواتساب</a>
                                <a href="mailto:Info@medprojects.co" target="_blank" class="btn btn-primary">البريد
                                    الإلكتروني</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <br /><br /><br /><br /><br /><br />
        </section>
    </main><!-- End main -->

@endsection
