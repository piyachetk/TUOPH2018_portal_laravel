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
                <h3 class="subtitle right-item">๘ ทศวรรษ
                    <wbr>
                    <span class="nobr">เตรียมอุดมศึกษา</span></h3>
            </div>
            <h3 class="title en">Triam Udom <span class="nobr">Open House</span></h3>
            <br/>
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
    <div class="section center-align fullpage" id="s-thankyou">
        <h5 class="theme-color">ขอขอบคุณที่เข้าร่วมงาน</h5>
        <p>ทางคณะผู้จัดงาน ขอขอบคุณทุกท่านที่ให้ความสนใจ และเข้าร่วมกิจกรรม<br/>
            "ต.อ. นิทรรศ ๘ ทศวรรษ<wbr><span class="nobr">เตรียมอุดมศึกษา</span>" ในครั้งนี้ <br/>
            ทางคณะผู้จัดงานหวังเป็นอย่างยิ่งว่า ทุกท่านจะได้รับความสุข และรู้จักโรงเรียนเตรียมอุดมศึกษาในมุมมองต่างๆ มากยิ่งขึ้น<br/><br/>
            แล้วพบกันใหม่ปีหน้า<br/>
            #TriamUdom<wbr>OpenHouse2018
        </p>
        <sub>คณะกรรมการงานกิจกรรมพัฒนาผู้เรียน</sub>
        <br/><br/>
    </div>

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

            @php
                $data = \App\Http\Controllers\UserController::getUserData();
            @endphp

            @if($data != null && $data['registered'] && !session()->has('status'))
                <div class="z-depth-1 card-panel green white-text" style="max-width:800px; margin: 3rem auto 3rem;">
                    รหัสยืนยันการลงทะเบียนของคุณคือ <span style="font-size: 2rem">{{ $data['id'] }}</span><br/>
                    <span style="font-size: 0.8em">กรุณาแจ้งรหัสนี้ ณ จุดลงทะเบียน เพื่อรับเกียรติบัตรและสูจิบัตรงาน</span>
                </div>
            @endif

            <img class="responsive-img" src="/OpenHouse_Logo.png" alt="Triam Udom Open House Logo" width="360"/>
            <p class="theme-color">งานนิทรรศการที่ยิ่งใหญ่ที่สุดในประวัติศาสตร์โรงเรียน<span class="nobr">เตรียมอุดมศึกษา</span><br/>
                พบกับกิจกรรมที่น่าสนใจต่างๆ อาทิ การแนะนำโรงเรียน การแสดงผลงานนักเรียน
                กิจกรรมชมรม การแสดง คอนเสิร์ต การแข่งขัน การแนะแนวการศึกษาต่อในแต่ละแผนการเรียน</p>
            <p>11-13 มกราคม 2561<br/>
                เวลา 08.00 - 16.00 น.</p>

            <br/>
            {{--
            <p style="font-size:1rem">
                ท่านสามารถลงทะเบียนเพื่อรับเกียรติบัตรในการเข้าร่วมงาน โดยท่านสามารถเข้าถึงงานนิทรรศการได้มากขึ้นผ่าน<a href="/redirectApp">แอปพลิเคชั่น</a>
            </p>
            --}}
            @if($data != null)
                @if(!$data['registered'])
                    <a href="/register" class="waves-effect waves-light btn login disabled">ลงทะเบียนเข้าร่วมงาน</a>
                @else
                    <a href="/logout" class="waves-effect waves-light btn indigo darken-3 logout hide-on-small-only">ลงทะเบียนเรียบร้อยแล้ว
                        ออกจากระบบ</a>
                    <a href="/logout" class="waves-effect waves-light btn indigo darken-3 logout hide-on-med-and-up">ออกจากระบบ</a>
                @endif
            @else
                <a href="/login" class="waves-effect waves-light btn login disabled">ลงทะเบียนเข้าร่วมงาน</a>
            @endif
        </div>
        <br/>
    </div>

    <div class="section" id="s-exhibition">
        <h4 class="center theme-color">นิทรรศการ</h4>
        <br/>

        <h5 class="center theme-color light-text">แผนการเรียน</h5>
        <div class="row" style="line-height: 32px;">
            <div class="col s12 m5">
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ <br/>
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ ภาษาฝรั่งเศส <br/>
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ ภาษาเยอรมัน <br/>
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ ภาษาสเปน <br/>
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ ภาษาญี่ปุ่น <br/>
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ ภาษาจีน <br/>
                แผนการเรียนวิทยาศาสตร์-คณิตศาสตร์ ภาษาเกาหลี <br/>
                โครงการความสามารถพิเศษคณิตศาสตร์ <br/>
                โครงการความสามารถพิเศษวิทยาศาสตร์ <br/>
                <br/>
            </div>
            <div class="col s12 m2 hide-on-small-only">&nbsp;</div>
            <div class="col s12 m5">
                แผนการเรียนภาษา-คณิตศาสตร์ <br/>
                แผนการเรียนภาษา-ฝรั่งเศส <br/>
                แผนการเรียนภาษา-เยอรมัน <br/>
                แผนการเรียนภาษา-สเปน <br/>
                แผนการเรียนภาษา-ญี่ปุ่น <br/>
                แผนการเรียนภาษา-จีน <br/>
                แผนการเรียนภาษา-เกาหลี <br/>
                โครงการความสามารถพิเศษภาษาไทย <br/>
                โครงการความสามารถพิเศษภาษาอังกฤษ <br/>
            </div>
        </div>

        <h5 class="center theme-color light-text">ชมรม</h5>
        <div class="row" style="line-height: 32px;">
            <div class="container-fluid">
                <div class="col s12 m4">
                    ชมรมวิทยาศาสตร์ <br/>
                    ชมรมสังคมศึกษา <br/>
                    ชมรมภาษาไทย <br/>
                    <a href="https://www.facebook.com/ชมรมห้องสมุด-โรงเรียนเตรียมอุดมศึกษา-237566130068812/">ชมรมห้องสมุด</a>
                    <br/>
                    ชมรมศาสนาและวัฒนธรรมไทย <br/>
                    <a href="https://www.facebook.com/WatasilpTU/">ชมรมวาทศิลป์</a> <br/>
                    <a href="https://www.facebook.com/tu.literatureartclub/">ชมรมวรรณศิลป์ ต.อ.</a> <br/>
                    <a href="https://www.facebook.com/TuArtClub/">ชมรมศิลปศึกษา</a> <br/>
                    <a href="https://www.facebook.com/%E0%B8%8A%E0%B8%A1%E0%B8%A3%E0%B8%A1%E0%B8%81%E0%B8%8E%E0%B8%AB%E0%B8%A1%E0%B8%B2%E0%B8%A2%E0%B8%99%E0%B9%88%E0%B8%B2%E0%B8%A3%E0%B8%B9%E0%B9%89-%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%AD%E0%B8%B8%E0%B8%94%E0%B8%A1%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2-122742547806407/?ref=bookmarks">ชมรมกฎหมายน่ารู้</a>
                    <br/>
                </div>
                <div class="col s12 m4">
                    <a href="https://www.facebook.com/VolunteerclubTU/">ชมรมผู้บำเพ็ญประโยชน์</a> <br/>
                    <a href="https://www.facebook.com/tumedical/">ชมรมผู้นำเยาวชนฯ</a> <br/>
                    ชมรมอนุรักษ์ธรรมชาติ <br/>
                    ชมรมเพาะพันธุ์ไม้ <br/>
                    <a href="https://www.facebook.com/TUCROSSWORD/">ชมรมครอสเวิร์ด</a> <br/>
                    <a href="https://www.facebook.com/PhotoTriam/">ชมรมถ่ายภาพ</a> <br/>
                    <a href="https://www.facebook.com/IndyTriamudom/">ชมรมสิ่งละพันอันละน้อย</a> <br/>
                    ชมรมค้นพบตนเอง <br/>
                </div>
                <div class="col s12 m4">
                    <a href="https://www.facebook.com/tuyearbookclub/">ชมรมสร้างสรรค์หนังสือ</a> <br/>
                    <a href="https://www.facebook.com/tu.comicclub/">ชมรมการ์ตูน</a> <br/>
                    <a href="https://www.facebook.com/%E0%B8%8A%E0%B8%A1%E0%B8%A3%E0%B8%A1%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8%E0%B8%A8%E0%B8%B4%E0%B8%A5%E0%B8%9B-%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%AD%E0%B8%B8%E0%B8%94%E0%B8%A1%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2-168207636569942/">ชมรมนิเทศศิลป</a>	<br/>
                    <a href="https://www.facebook.com/RobotTU/">ชมรมของเล่นเพื่อการเรียนรู้</a> <br/>
                    ชมรมเศรษฐศาสตร์ <br/>
                    <a href="https://www.facebook.com/TUGLOBE/">ชมรมโลกทั้งระบบ</a> <br/>
                    ชมรมโลกศาสตร์ <br/>
                    <a href="https://www.facebook.com/TU.SFLC/">ชมรมสีสรรพ์ภาษาต่างประเทศที่ ๒</a> <br/>
                </div>
            </div>
        </div>
        <br/>

        <h5 class="center theme-color light-text">หน่วยงาน</h5>
        <div class="row" style="line-height: 32px;">
            <div class="container-fluid">
                <div class="col s12 m4">
                    <a href="https://www.facebook.com/TUSCofficial/">คณะกรรมการนักเรียน</a> <br/>
                    <a href="https://www.facebook.com/triamtalk">TriamTalk</a> <br/>
                </div>
                <div class="col s12 m4">
                    <a href="https://www.facebook.com/AICTriamUdom/">กลุ่มนักเรียนเอไอซี</a> <br/>
                    งานแนะแนว <br/>
                </div>
                <div class="col s12 m4">
                    <a href="https://www.facebook.com/TUBCofficial/">งานสวนพฤกษศาสตร์โรงเรียน</a> <br/>
                </div>
            </div>
        </div>
        <br/>

        <h5 class="center theme-color light-text">ผังงาน</h5>
        <div class="container">
            <div class="row">
                <a href="/plan-school.jpg" class="waves-effect waves-light btn fullwidth pink lighten-1 hide-on-small-only">ผังงานต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา</a>
                <a href="/plan-school.jpg" class="waves-effect waves-light btn fullwidth pink lighten-1 hide-on-med-and-up">ผังงานต.อ. นิทรรศ</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <a href="/plan-front.jpg" class="waves-effect waves-light btn fullwidth teal darken-3">บริเวณสนามหญ้าหน้าหอประชุม</a>
                <a href="/plan-auditorium.jpg" class="waves-effect waves-light btn fullwidth deep-purple darken-1">บริเวณหอประชุมโรงเรียน</a>
            </div>
            <div class="col s12 m6">
                <a href="/plan-ground.jpg" class="waves-effect waves-light btn fullwidth light-green darken-3">ลานอเนกประสงค์ 70 ปี ต.อ.</a>
                <a href="/plan-60.jpg" class="waves-effect waves-light btn fullwidth light-blue darken-4">บริเวณหน้าตึก 60 ปี</a>
                <a href="/plan-72.jpg" class="waves-effect waves-light btn fullwidth blue">บริเวณหน้าตึกเฉลิมพระเกียรติ 72 พรรษา</a>
            </div>
        </div>
    </div>
    <div class="divider"></div>

    <div class="section center-align fullpage" id="s-show">
        <div class="container">
            <h4 class="center theme-color">การแสดง</h4>
            <div class="row" style="line-height: 32px;">
                <div class="col s12 m6">
                    <h5>ลานอเนกประสงค์ 70 ปี ต.อ.</h5>
                    <a href="https://clubs.triamudom.ac.th/page/drum">คณะคทากรโรงเรียน</a>
                    คัลเลอร์การ์ด<br/>
                    <a href="https://www.facebook.com/triamudomcld/">คณะผู้นำเชียร์โรงเรียน</a>
                    คณะผู้นำเชียร์ประจำคณะสี<br/>
                    <a href=" https://www.facebook.com/tumusicclub/">ชมรมดนตรีสากล</a> ชมรมนิเทศศิลป<br/>
                    ชมรมเชียร์ ชมรมนาฏศิลป์<br/>
                    ชมรมสีสรรพ์ภาษาต่างประเทศที่ ๒ (ภาษาญี่ปุ่น)<br/>
                    นักเรียนสายการเรียนต่างๆ<br/>
                    แผนการเรียนภาษา-ญี่ปุ่น<br/>
                    กลุ่มสาระการเรียนรู้ภาษาต่างประเทศที่ ๒<br/>
                    กลุ่มสาระการเรียนรู้สุขศึกษาและพลศึกษา<br/>
                    <br/>
                </div>
                <div class="col s12 m6">
                    <h5>หอประชุมโรงเรียนเตรียมอุดมศึกษา</h5>
                    ชมรมภาพยนตร์สั้นและสื่อโทรทัศน์<br/>
                    <a href="https://www.facebook.com/artsclubofTU/">ชมรมนิเทศศิลป</a> <br/>
                    <a href="https://www.facebook.com/EntertainerClub/">ชมรมสันทนากร</a> <br/>
                    <a href=" https://m.facebook.com/Triamudom-Suksa-Wing-Symphony-Orchestra-338542792849087/">ชมรมดุริยางค์</a>และวงดนตรีร่วมสมัย
                    <br/>
                    <a href="https://www.facebook.com/tuengdrama/">ชมรมภาษาอังกฤษ (English Drama)</a>
                    ร่วมกับชมรมขับร้องประสานเสียง <br/>
                    ชมรมสีสรรพ์ต่างประเทศที่ ๒ (French Chorus)<br/>
                    กลุ่มนักเรียนตึกศิลปะ <br/>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <a href="/timetable_ground.pdf"
                       class="waves-effect waves-light btn fullwidth light-green darken-3 hide-on-small-only">ตารางการแสดง
                        ลานอเนกประสงค์ 70 ปี ต.อ.</a>
                    <a href="/timetable_ground.pdf"
                       class="waves-effect waves-light btn fullwidth light-green darken-3 hide-on-med-and-up">ตารางการแสดง
                        ลานอเนกประสงค์ฯ</a>
                </div>
                <div class="col s12 m6">
                    <a href="/timetable_hall.pdf"
                       class="waves-effect waves-light btn fullwidth deep-purple darken-1 hide-on-small-only">ตารางการแสดง
                        หอประชุมโรงเรียนเตรียมอุดมศึกษา</a>
                    <a href="/timetable_hall.pdf"
                       class="waves-effect waves-light btn fullwidth deep-purple darken-1 hide-on-med-and-up">ตารางการแสดง
                        หอประชุมโรงเรียนฯ</a>
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
                        <a style="margin-top: 8px;" href="https://tumso.triamudom.cc"
                           class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
                <br/>
                <div class="icon-block center-align">
                    <h5 class="center">TUGSA 8th</h5>
                    <p class="light">การแข่งขันตอบปัญหาสังคมศึกษาระดับชั้นมัธยมศึกษาตอนต้น<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/tugsaoftriamudom/"
                           class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">การแข่งขันกฎหมาย</h5>
                    <p class="light">การแข่งขันตอบปัญหากฎหมาย ระดับมัธยมศึกษาตอนปลาย ครั้งที่ 14<br/>
                        <a style="margin-top: 8px;"
                           href="https://www.facebook.com/%E0%B8%8A%E0%B8%A1%E0%B8%A3%E0%B8%A1%E0%B8%81%E0%B8%8E%E0%B8%AB%E0%B8%A1%E0%B8%B2%E0%B8%A2%E0%B8%99%E0%B9%88%E0%B8%B2%E0%B8%A3%E0%B8%B9%E0%B9%89-%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%A1%E0%B8%AD%E0%B8%B8%E0%B8%94%E0%B8%A1%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2-122742547806407/"
                           class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
                <br/>
                <div class="icon-block center-align">
                    <h5 class="center">Triam Debate</h5>
                    <p class="light">การแข่งขันโต้วาทีภาษาอังกฤษ 2018 Triam Debate Challenge<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/triamdebate/"
                           class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="icon-block center-align">
                    <h5 class="center">TUENT Dancing Contest 2018</h5>
                    <p class="light">การแข่งขันเต้น "Feet On Fire"<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/EntertainerClub/"
                           class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
                <br/>
                <div class="icon-block center-align">
                    <h5 class="center">TU Iron Chef</h5>
                    <p class="light">การแข่งขันทำอาหาร เชฟกระทะเหล็ก<br/>
                        <a style="margin-top: 8px;" href="https://www.facebook.com/IndyTriamudom/"
                           class="waves-effect waves-light btn">ดูรายละเอียด</a></p>
                </div>
            </div>
        </div>
        <br/><br/>

    </div>
    <div class="divider"></div>

    <div class="section center-align fullpage" id="s-map">
        <div class="container">
            <h4>สถานที่ <i class="material-icons">map</i></h4>
            <b>โรงเรียนเตรียมอุดมศึกษา</b><br/>
            227 ถนนพญาไท แขวงปทุมวัน เขตปทุมวัน กรุงเทพมหานคร 10330<br/>
            (<a class="modal-trigger" href="#modal-direction">การเดินทาง</a>{{-- | <a href="/birdmap.jpg">แผนผัง</a>--}}
            )
            <p>หมายเหตุ: ขอความกรุณาผู้ที่มาเข้าร่วมงาน ต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา เดินทางโดยรถสาธารณะ
                เพื่อลดปัญหาทางด้านการจราจร</p>
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
                    ถนนพญาไท: 21, 25, 29, 34, 36, 40, 47, 50, 93, 113, 141, 187, 542<br/>
                    ถนนอังรีดูนังต์: 16, 21
                </li>
                <li>
                    <b>รถไฟฟ้า BTS สถานีสยาม</b> โดยสามารถเดินต่อมายังโรงเรียนเตรียมอุดมศึกษาได้ทั้งฝั่งถนนพญาไท (900
                    เมตร) และถนนอังรีดูนังต์ (500-800 เมตร)
                    <!-- หรือโดยสารรถโดยสารภายในจุฬาลงกรณ์มหาวิทยาลัย --> หรือใช้บริการรถจักรยานยนต์รับจ้าง
                </li>
                <li>
                    <b>รถไฟฟ้า MRT สถานีสามย่าน</b> โดยสามารถเดินต่อมายังโรงเรียนเตรียมอุดมศึกษาได้ทั้งฝั่งถนนพญาไท (800
                    เมตร) และถนนอังรีดูนังต์ (1200 เมตร)
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
                <li><b>ประตูถนนอังรีดูนังต์ ตึก 3</b> เชื่อมต่อกับโรงเรียนสาธิตมหาวิทยาลัยศรีนครินทรวิโรฒ ปทุมวัน
                    และคณะอักษรศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย
                </li>
                <li><b>ประตูถนนอังรีดูนังต์ ตึก 50 ปี</b> ใกล้เคียงกับคณะสัตวแพทยศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย <i>(เปิดบางเวลาเท่านั้น)</i>
                </li>
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
    if (window.location.href.indexOf('#direction') != -1) {
    $('#modal-direction').modal('open');
    }
@endsection

@section('script')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111992660-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-111992660-1');
    </script>
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
