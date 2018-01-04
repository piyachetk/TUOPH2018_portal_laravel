@extends('layouts.app')

@section("title")
    หน้าแรก
@endsection

@section('style')

@endsection

@section("pre-content")
    <div id="header">
        <div class="container">
            <div class="th">
                <h3 class="title left-item">ต.อ. นิทรรศ</h3>
                <h3 class="subtitle right-item">๘ ทศวรรษ<wbr><span class="nobr">เตรียมอุดมศึกษา</span></h3>
            </div>
            <h3 class="title en">Triam Udom <span class="nobr">Open House</span></h3>
            <br />
            <h4 class="subtitle date hide-on-small-and-down">11-13 มกราคม 2561</h4>
        </div>
    </div>
    {{--
    <div class="pink lighten-2 white-text" style="padding-top:60px;padding-bottom:40px;line-height:2.5rem;">
        <div class="container center">
            <h3 style="line-height: 150% !important;">ต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา</h3>
        </div>
    </div>
    --}}
@endsection

@section("content")
    <div class="section center-align fullpage" id="s-intro">
        <div class="container">
            @if(session()->has('error'))
                <div class="z-depth-1 card-panel red white-text" style="max-width:800px; margin: 3rem auto 3rem;">
                    {{ session()->get('error') }}
                </div>
            @endif

            @if(session()->has('status'))
                <div class="z-depth-1 card-panel green white-text" style="max-width:800px; margin: 3rem auto 3rem;">
                    {{ session()->get('status') }}
                </div>
            @endif

            <img class="responsive-img" src="/OpenHouse_Logo.png" alt="Triam Udom Open House Logo" width="360" />
            <p class="theme-color">งานนิทรรศการที่ยิ่งใหญ่ที่สุดในประวัติศาสตร์โรงเรียน<span class="nobr">เตรียมอุดมศึกษา</span><br />
                พบกับกิจกรรมที่น่าสนใจต่างๆ อาทิ การแนะนำโรงเรียน การแสดงผลงานนักเรียน นิทรรศการวิชาการ
                กิจกรรมชมรม การแสดง การแข่งขัน การแนะแนวการศึกษาต่อในแต่ละแผนการเรียน</p>
            <p>11-13 มกราคม 2561<br/>
               เวลา 08.00 - 16.00 น.</p>

            <br />
            {{--
            <p style="font-size:1rem">
                ท่านสามารถลงทะเบียนเพื่อรับเกียรติบัตรในการเข้าร่วมงาน โดยท่านสามารถเข้าถึงงานนิทรรศการได้มากขึ้นผ่าน<a href="/redirectApp">แอปพลิเคชั่น</a>
            </p>
            --}}
            @if(\App\Http\Controllers\UserController::isLoggedIn())
                @if(!\App\Http\Controllers\UserController::getUserData()['registered'])
                    <a href="/register" class="waves-effect waves-light btn login">ลงทะเบียนเข้าร่วมงาน</a>
                @else
                    {{-- <a href="/register" class="waves-effect waves-light btn blue disabled fullwidth">คุณได้ลงทะเบียนแล้ว</a> --}}
                    <a href="/logout" class="waves-effect waves-light btn indigo darken-3 logout hide-on-small-only">ลงทะเบียนเรียบร้อยแล้ว ออกจากระบบ</a>
                    <a href="/logout" class="waves-effect waves-light btn indigo darken-3 logout hide-on-med-and-up">ออกจากระบบ</a>
                @endif
            @else
                {{-- <a href="/register" class="waves-effect waves-light btn blue disabled fullwidth">คุณสามารถลงทะเบียนเมื่อเข้าสู่ระบบแล้วเท่านั้น</a> --}}
                <a href="/login" class="waves-effect waves-light btn login">ลงทะเบียนเข้าร่วมงาน</a>
            @endif
        </div>
        <br /><br />
    </div>
    <br/>

    <div class="section" id="s-exhibition">
        <h4 class="center theme-color">นิทรรศการ</h4>
        <br/>

        <div class="row" style="line-height: 32px;">
            <div class="col s12 m4">
                แผนการเรียนวิทย์คณิต	<br/>
                แผนการเรียนวิทย์คณิต-ฝรั่งเศส	<br/>
                แผนการเรียนวิทย์คณิต-เยอรมัน	<br/>
                แผนการเรียนวิทย์คณิต-สเปน	<br/>
                แผนการเรียนวิทย์คณิต-ญี่ปุ่น	<br/>
                แผนการเรียนวิทย์คณิต-จีน	<br/>
                แผนการเรียนวิทย์คณิต-เกาหลี	<br/>
                ห้องเรียนพิเศษคณิตศาสตร์	<br/>
                ห้องเรียนพิเศษวิทยาศาสตร์	<br/>
                ชมรมวิทยาศาสตร์	<br/>
                ชมรมสังคมศึกษา	<br/>
                ชมรมภาษาไทย	<br/>
                ชมรมห้องสมุด	<br/>
                ชมรมศาสนาและวัฒนธรรมไทย	<br/>
                ชมรมวาทศิลป์	<br/>
            </div>
            <div class="col s12 m4">
                แผนการเรียนภาษา-คณิต	<br/>
                แผนการเรียนภาษา-ฝรั่งเศส	<br/>
                แผนการเรียนภาษา-เยอรมัน	<br/>
                แผนการเรียนภาษา-สเปน	<br/>
                แผนการเรียนภาษา-ญี่ปุ่น	<br/>
                แผนการเรียนภาษา-จีน	<br/>
                แผนการเรียนภาษา-เกาหลี	<br/>
                โครงการความสามารถพิเศษภาษาไทย	<br/>
                โครงการความสามารถพิเศษภาษาอังกฤษ	<br/>
                ชมรมวรรณศิลป์ ต.อ.	<br/>
                ชมรมศิลปะ	<br/>
                ชมรมผู้บำเพ็ญประโยชน์	<br/>
                ชมรมผู้นำเยาวชน	<br/>
                ชมรมอนุรักษ์ธรรมชาติ	<br/>
                ชมรมเพาะพันธุ์ไม้	<br/>
            </div>
            <div class="col s12 m4">
                ชมรมครอสเวิร์ด	<br/>
                ชมรมถ่ายภาพ	<br/>
                ชมรมสิ่งละพันอันละน้อย	<br/>
                ชมรมค้นพบตนเอง	<br/>
                ชมรมสร้างสรรค์หนังสือ	<br/>
                ชมรมการ์ตูน	<br/>
                ชมรมนิเทศศิลป	<br/>
                ชมรมของเล่นเพื่อการเรียนรู้	<br/>
                ชมรมเศรษฐศาสตร์	<br/>
                ชมรมโลกทั้งระบบ	<br/>
                ชมรมโลกศาสตร์	<br/>
                ชมรมสีสรรพ์ภาษาต่างประเทศที่ 2	<br/>
                คณะกรรมการนักเรียน	<br/>
                กลุ่มนักเรียนเอไอซี	<br/>
                งานแนะแนว	<br/>
            </div>
        </div>
        {{--
        <div class="row">
            <div class="col s12 m6">
                <a href="/plan-auditorium.jpg" class="waves-effect waves-light btn fullwidth green">บริเวณหอประชุม</a>
            </div>
            <div class="col s12 m6">
                <a href="/plan70.jpg" class="waves-effect waves-light btn fullwidth teal">ลานอเนกประสงค์ 70 ปีต.อ.</a>
            </div>
            <div class="col s12 m6">
                <a href="/plan-library.jpg" class="waves-effect waves-light btn fullwidth blue">บริเวณห้องสมุด</a>
            </div>
            <div class="col s12 m6">
                <a href="/plan-60.jpg" class="waves-effect waves-light btn fullwidth cyan">บริเวณหน้าตึก 60 ปี</a>
            </div>
        </div>
        --}}
    </div>
    <div class="divider"></div>

    <div class="section center-align fullpage" id="s-show">
        <div class="container">
            <h4 class="center theme-color">การแสดง</h4>
            <div class="row" style="line-height: 32px;">
                <div class="col s12 m6">
                    <h5>ลานอเนกประสงค์ 70 ปี ต.อ.</h5>
                    คณะคทากร
                    คณะผู้นำเชียร์โรงเรียน
                    คณะผู้นำเชียร์ตึก
                    คัลเลอร์การ์ด
                    ชมรมดนตรีสากล
                    ชมรมนิเทศศิลป
                    ชมรมเชียร์
                    ชมรมนาฏศิลป์
                    ชมรมสีสรรพ์ภาษาต่างประเทศที่ 2 (ภาษาญี่ปุ่น)
                    นักเรียนสายการเรียนต่างๆ
                    แผนการเรียนภาษา-ญี่ปุ่น
                    กสร.ภาษาต่างประเทศที่ 2
                    กสร.สุขศึกษาและพลศึกษา
                </div>
                <div class="col s12 m6">
                    <h5>หอประชุมใหญ่</h5>
                    ชมรมภาพยนตร์สั้น ชมรมนิเทศศิลป ชมรมสันทนากร	<br/>
                    ชมรมดุริยางค์และวงดนตรีร่วมสมัย	<br/>
                    ชมรมภาษาอังกฤษ (English Drama) และชมรมขับร้องประสานเสียง	<br/>
                    ชมรมขับร้องประสานเสียงภาษาฝรั่งเศส ตึกศิลปะ	<br/>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <a href="/timetable_ground.pdf" class="waves-effect waves-light btn disabled fullwidth pink">ตารางการแสดง ลาน 70 ปี ต.อ.</a>
                </div>
                <div class="col s12 m6">
                    <a href="/timetable_hall.pdf" class="waves-effect waves-light btn fullwidth red">ตารางการแสดง หอประขุมใหญ่</a>
                </div>
            </div>
        </div>
    </div>
    <div class="divider"></div>

    <div class="section" id="s-competition">
        <h4 class="center theme-color">การแข่งขัน</h4>
        <div class="row" style="line-height: 32px;">
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">TUMSO 16th</h5>
                    <p class="light">การแข่งขันคณิตศาสตร์และวิทยาศาสตร์ระหว่างโรงเรียน ครั้งที่ 16<br/>
                        <a style="margin-top: 8px;" href="https://tumso.triamudom.cc" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">TUGSA 8th</h5>
                    <p class="light">การแข่งขันตอบปัญหาสังคมศึกษาระดับชั้นมัธยมศึกษาตอนต้น<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/tugsaoftriamudom/" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">การแข่งขันกฎหมาย</h5>
                    <p class="light">การแข่งขันตอบปัญหากฎหมาย ระดับมัธยมศึกษาตอนปลาย ครั้งที่ 14<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/%E0%B8%8A%E0%B8%A1%E0%B8%A3%E0%B8%A1%E0%B8%81%E0%B8%8E%E0%B8%AB%E0%B8%A1%E0%B8%B2%E0%B8%A2%E0%B8%99%E0%B9%88%E0%B8%B2%E0%B8%A3%E0%B8%B9%E0%B9%89-%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%AD%E0%B8%B8%E0%B8%94%E0%B8%A1%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2-122742547806407/" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
        </div>
        <br/><br/>
        <div class="row" style="line-height: 32px;">
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">TUENT Dancing Contest 2018</h5>
                    <p class="light">การแข่งขันเต้น "Feet On Fire"<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/EntertainerClub/" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">Triam Debate</h5>
                    <p class="light">การแข่งขันโต้วาทีภาษาอังกฤษ 2018 Triam Debate Challenge<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/triamdebate/" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
        </div>

    </div>
    <div class="divider"></div>

    <div class="section center-align fullpage" id="s-map">
        <div class="container">
            <h4>สถานที่ <i class="material-icons">map</i></h4>
            <b>โรงเรียนเตรียมอุดมศึกษา</b><br/>
            227 ถนนพญาไท เขตปทุมวัน กรุงเทพมหานคร 10330<br />
            (<a class="modal-trigger" href="#modal-direction">การเดินทาง</a> | <a href="/birdmap.jpg">แผนผัง</a>)
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.611217557155!2d100.53043846420802!3d13.741972256501489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ed3828ba8e5%3A0xf0db3be87e158217!2zVHJpYW0gVWRvbSBTdWtzYSBTY2hvb2wg4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4LmA4LiV4Lij4Li14Lii4Lih4Lit4Li44LiU4Lih4Lio4Li24LiB4Lip4Liy!5e0!3m2!1sth!2sth!4v1471690441533"
                    frameborder="0" allowfullscreen style="border:0; height:220px; width:100%"></iframe>
        </div>
    </div>

    <div id="modal-direction" class="modal">
        <div class="modal-content">
            <h4>การเดินทาง</h4>
            <ul>
                <li>
                    <b>รถประจำทาง</b> มีป้ายรถประจำทางอยู่ทั้งสามประตูของโรงเรียน<br/>
                    ถนนพญาไท: 21, 25, 29, 34, 36, 40, 47, 50, 93, 113, ปอ.1, ปอ.2, ปอ.29,ปอ.พ.3, ปอ.พ.5, ปอ.พ.6, ปอ.พ.9, ปอ.พ.11<br/>
                    ถนนอังรีดูนังต์: 16, 21, 45, ปอ.พ.1
                </li>
                <li>
                    <b>รถไฟฟ้า BTS สถานีสยาม</b> โดยสามารถเดินต่อมายังโรงเรียนเตรียมอุดมศึกษาได้ทั้งฝั่งถนนพญาไท (900 เมตร) และถนนอังรีดูนังต์ (500-800 เมตร)
                    <!-- หรือโดยสารรถโดยสารภายในจุฬาลงกรณ์มหาวิทยาลัย --> หรือใช้บริการรถจักรยานยนต์รับจ้าง
                </li>
                <li>
                    <b>รถไฟฟ้า MRT สถานีสามย่าน</b> โดยสามารถเดินต่อมายังโรงเรียนเตรียมอุดมศึกษาได้ทั้งฝั่งถนนพญาไท (800 เมตร) และถนนอังรีดูนังต์ (1200 เมตร)
                    <!-- หรือโดยสารรถโดยสารภายในจุฬาลงกรณ์มหาวิทยาลัย --> หรือใช้บริการรถจักรยานยนต์รับจ้าง
                </li>
                <!-- li>
                    <b>รถโดยสารภายในจุฬาลงกรณ์มหาวิทยาลัย</b> ป้ายโรงเรียนเตรียมอุดมศึกษา (สาย 1), ป้ายโรงเรียนสาธิตฯปทุมวัน (สาย 1, 4), ป้ายคณะอักษรศาสตร์ (ทุกสาย;
                    ใช้ประตูเชื่อมโรงเรียนสาธิตฯปทุมวัน) (<a href="http://www.chula.ac.th/about/map-and-direction/cu-shuttle-bus">ข้อมูลเพิ่มเติม</a>)
                </li -->
            </ul>
            หมายเหตุ: ในวันงาน โรงเรียนไม่อนุญาตให้บุคคลภายนอกนำรถส่วนตัวเข้ามาจอดภายในโรงเรียน
            <br/><br/>
            <h5>ประตูโรงเรียน</h5>
            <ul>
                <li><b>ประตูถนนพญาไท (ตึก 1)</b> ใกล้กับคณะสถาปัตยกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</li>
                <li><b>ประตูถนนอังรีดูนังต์ ตึก 3</b> เชื่อมต่อกับโรงเรียนสาธิต มศว ปทุมวัน และคณะอักษรศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</li>
                <li><b>ประตูถนนอังรีดูนังต์ ตึก 50 ปี</b> ใกล้เคียงกับคณะสัตวแพทยศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย <i>(เปิดบางเวลาเท่านั้น)</i></li>
            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ปิด</a>
        </div>
    </div>

@endsection

@section('startup-js')
    $('.modal').modal();
    styleScroll();
    $(document).scroll(function () {
    styleScroll();
    });
@endsection

@section('script')
    <script>
        function styleScroll() {
            if ($(document).scrollTop() <= 100) {
                $('nav').css('box-shadow', 'unset');
            } else {
                $('nav').css('box-shadow', '0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)');
            }
            if ($(document).scrollTop() <= 220) {
                $('.brand-logo, .navul').slideUp();
            } else {
                $('.brand-logo, .navul').slideDown();
            }
        }
    </script>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=249638338487933";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection