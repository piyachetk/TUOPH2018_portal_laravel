@extends('layouts.app')

@section("title")
    หน้าแรก
@endsection

@section('style')
    .fullwidth {
        width: 100%
    }

    .btn.fullwidth {margin-bottom:0.3rem}
@endsection

@section("pre-content")
    <div class="pink lighten-2 white-text" style="padding-top:60px;padding-bottom:40px;line-height:2.5rem;">
        <div class="container center">
            <h3 style="line-height: 150% !important;">ต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา</h3>
        </div>
    </div>
@endsection

@section("content")
<div class="container">
    <div class="section">

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

        <!--Information here-->

            <div class="center-align">
                <h5>11-13 มกราคม 2561</h5>
                <h5>เวลาประมาณ 9.00 - 16.00 น.</h5>
                <p style="font-size:1.4rem">พบกับการแสดง นิทรรศการ และบูธจากหน่วยงานต่างๆภายในโรงเรียน การแสดงผลงานนักเรียน การแนะนำโรงเรียน การแข่งขันและนิทรรศการวิชาการ
                    และการแนะนำแผนการเรียนต่างๆของโรงเรียน</p>
                <p style="font-size:1rem">
                    ท่านสามารถลงทะเบียนเพื่อรับเกียรติบัตรในการเข้าร่วมงาน โดยท่านสามารถเข้าถึงงานนิทรรศการได้มากขึ้นผ่าน<a href="/redirectApp">แอปพลิเคชั่น</a>
                </p>
                @if(\App\Http\Controllers\UserController::isLoggedIn())
                    @if(!\App\Http\Controllers\UserController::getUserData()['registered'])
                        <a href="/register" class="waves-effect waves-light btn blue fullwidth">ลงทะเบียน</a>
                    @else
                        <a href="/register" class="waves-effect waves-light btn blue disabled fullwidth">คุณได้ลงทะเบียนแล้ว</a>
                    @endif
                @else
                    <a href="/register" class="waves-effect waves-light btn blue disabled fullwidth">คุณสามารถลงทะเบียนเมื่อเข้าสู่ระบบแล้วเท่านั้น</a>
                @endif
            </div>

            <br/>

            <div class="divider"></div>

            <div class="section" id="s-exhibition">
                <h4 class="center">นิทรรศการ</h4>
                <br/>
                <div class="row" style="line-height: 32px;">
                    <div class="col s12 m4">
                        <!--b>หน้าตึก 60 ปี</b><br/-->
                        แผนการเรียนภาษา-คณิต<br/>
                        แผนการเรียนภาษา-จีน<br/>
                        แผนการเรียนภาษา-ญีปุ่น<br/>
                        แผนการเรียนภาษา-สเปน<br/>
                        แผนการเรียนภาษา-เยอรมัน<br/>
                        แผนการเรียนภาษา-ฝรั่งเศส<br/>
                        ชมรมสันทนากร<br/>
                        ชมรมวรรณศิลป์ ต.อ.<br/>
                        ชมรมสิ่งละอันพันละน้อย<br/>
                        ชมรมเพาะพันธุ์ไม้<br/>
                        ชมรมอนุรักษ์ธรรมชาติ<br/>
                        ชมรมผู้บำเพ็ญประโยชน์<br/>
                        ชมรมครอสเวิร์ด
                    </div>
                    <div class="col s12 m4">
                        <!--b>หลังตึก 60 ปี</b><br/-->
                        ชมรมค้นพบตัวเอง<br/>
                        <!--b>หน้าตึกเฉลิมพระเกียรติ 72 พรรษา</b><br/-->
                        ห้องเรียนพิเศษคณิตศาสตร์<br/>
                        ห้องเรียนพิเศษวิทยาศาสตร์<br/>
                        โครงการความสามารถพิเศษภาษาอังกฤษ
                        <!--b>หลังห้องสมุด</b><br/-->
                        แผนการเรียนวิทย์-คอมพิวเตอร์<br/>
                        แผนการเรียนวิทย์-คุณภาพชีวิต<br/>
                        แผนการเรียนวิทย์-คณิตศาสตร์ประยุกต์<br/>
                        แผนการเรียนวิทย์-บริหารจัดการ<br/>
                        แผนการเรียนวิทย์-ภาษาจีน<br/>
                        แผนการเรียนวิทย์-ภาษาญี่ปุ่น<br/>
                        แผนการเรียนวิทย์-ภาษาเยอรมัน<br/>
                        แผนการเรียนวิทย์-ภาษาฝรั่งเศส<br/>
                        ชมรมการ์ตูน<!-- M -->
                    </div>
                    <div class="col s12 m4">
                        <!--b>ลานอเนกประสงค์ 70 ปีต.อ.</b><br/-->
                        ชมรมนาฏศิลป์<br/>
                        ชมรมดนตรีไทย<br/>
                        <!--b>หน้าหอประชุมใหญ่-ตึกปฏิบัติการวิทยาศาสตร์</b><br/-->
                        ชมรมนิเทศศิลป<br/>
                        ชมรมสร้างสรรค์หนังสือ<br/>
                        กลุ่มนักเรียนเอไอซี<br/>
                        ตลาดหลักทรัพย์แห่งประเทศไทย<br/>
                        ชมรมถ่ายภาพ<br/>
                        <!--b>ลานจามจุรีศรีโพธิ์</b><br/-->
                        ชมรมศาสนาและวัฒนธรรมไทย<br/>
                        ชมรมผู้นำเยาวชนสาธารณสุขฯ<br/>
                        <!--b>สนามหญ้าระหว่างตึก 1 และตึก 2</b><br/-->
                        โครงการความสามารถพิเศษภาษาไทย<br/>
                        งานแนะแนว<br/>
                        ชมรมสีสรรพ์ภาษาต่างประเทศที่ 2<br/>
                        ชมรมห้องสมุด<!-- M -->
                    </div>
                </div>
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
            </div>
            <div class="divider"></div>
            <!-- กลุ่มสาระการเรียนรู้วิทยาศาสตร์<br />
        กลุ่มสาระการเรียนรู้ศิลปะ<br />
        กลุ่มสาระการเรียนรู้สุขศึกษาและพลศึกษา<br />
        กลุ่มสาระการเรียนรู้ภาษาต่างประเทศที่ 2 -->

            <div class="section center-align" id="s-show">
                <h4 class="center">การแสดง</h4>
                <br/>
                <div class="row" style="line-height: 32px;">
                    <div class="col s12 m6">
                        <!-- b>ลานอเนกประสงค์ 70 ปีต.อ.</b><br/ -->
                        ชมรมนาฏศิลป์
                        ชมรมดนตรีสากล
                        คณะผู้นำเชียร์
                        ชมรมเชียร์
                        คัลเลอร์การ์ด
                        คทากร
                        ตลาดหลักทรัพย์แห่งประเทศไทย
                        ชมรมนิเทศศิลป์
                    </div>
                    <div class="col s12 m6">
                        <!--b>หอประชุมใหญ่</--b><br/-->
                        ชมรมสันทนากร
                        ชมรมขับร้องประสานเสียง
                        ชมรมภาษาอังกฤษ (English Drama)
                        ชมรมภาพยนตร์สั้นและสื่อโทรทัศน์
                        ชมรมดุริยางค์
                        กิจกรรมเปิดมุมหนังสือจิตร ภูมิศักดิ์
                        <!-- ชมรมนิเทศศิลป -->
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6">
                        <a href="/timetable-1.png" class="waves-effect waves-light btn fullwidth pink">เวลาการแสดง ลาน 70 ปีต.อ.</a>
                    </div>
                    <div class="col s12 m6">
                        <a href="/timetable-2.png" class="waves-effect waves-light btn fullwidth red">เวลาการแสดง หอประขุมใหญ่</a>
                    </div>
                </div>
            </div>

            <div class="divider"></div>
            <div class="section" id="s-competition">
                <h4 class="center">การแข่งขัน</h4>
                <div class="row" style="line-height: 32px;">
                    <div class="col s12 l4">
                        <div class="icon-block center-align">
                            <h5 class="center en">TUMSO</h5>
                            <p class="light">การแข่งขันคณิตศาสตร์และวิทยาศาสตร์ระหว่างโรงเรียน ครั้งที่ 16<br/><a style="margin-top: 8px;" href="https://tumso.triamudom.cc" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                        </div>
                    </div>
                    <div class="col s12 l4">
                        <div class="icon-block center-align">
                            <h5 class="center en">TUGSA</h5>
                            <p class="light">การแข่งขันตอบปัญหา วิชาสังคมศึกษา <br/><a style="margin-top: 8px;" href="https://www.facebook.com/tugsaoftriamudom/" class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                        </div>
                    </div>
                    <div class="col s12 l4">
                        <div class="icon-block center-align">
                            <h5 class="center">การแข่งขันกฎหมาย</h5>
                            <p class="light">การแข่งขันตอบปัญหากฎหมาย ระดับมัธยมศึกษาตอนปลาย ครั้งที่ 14</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>

            <div class="section" id="s-more">
                <div class="row">
                    <div class="col s12 l8 center">
                        <h4>สถานที่ <i class="material-icons">map</i></h4>
                        <b>โรงเรียนเตรียมอุดมศึกษา</b><br/>
                        227 ถนนพญาไท เขตปทุมวัน กรุงเทพมหานคร 10330 (<a class="modal-trigger" href="#modal-direction">การเดินทาง</a> | <a href="/birdmap.jpg">แผนผัง</a>)
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.611217557155!2d100.53043846420802!3d13.741972256501489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ed3828ba8e5%3A0xf0db3be87e158217!2zVHJpYW0gVWRvbSBTdWtzYSBTY2hvb2wg4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4LmA4LiV4Lij4Li14Lii4Lih4Lit4Li44LiU4Lih4Lio4Li24LiB4Lip4Liy!5e0!3m2!1sth!2sth!4v1471690441533"
                                frameborder="0" allowfullscreen style="border:0; height:220px; width:100%"></iframe>
                    </div>
                    <div class="col s12 l4 center">
                        <h4>ติดตาม <i class="material-icons">public</i></h4>
                        <div class="fb-page" data-href="https://www.facebook.com/TriamUdomOPH/" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/TriamUdomOPH/"><a href="https://www.facebook.com/TriamUdomOPH/">Triamudom Openhouse</a></blockquote>
                            </div>
                        </div>
                    </div>
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

    </div>
    <br><br>
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