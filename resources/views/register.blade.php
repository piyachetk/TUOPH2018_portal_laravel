@extends('layouts.app')

@section("title")
    ลงทะเบียน
@endsection

@section("content")

    <script>
        function student() {
            if ($("#accountType").val() === 'student') {
                $("#studentYearDiv").show();
            }
            else {
                $("#studentYearDiv").hide();
            }
        }
    </script>

    <div class="container">
        <div class="section">

            <h5>ลงทะเบียน</h5>

            <br/>

            <div class="panel-body">

                @if(session()->has('error'))
                    <div class="z-depth-1 card-panel red white-text" style="max-width:1280px; margin: auto auto auto;">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <div class="z-depth-1 card-panel white" style="max-width:1280px; margin: auto auto auto;">
                    กรุณากรอกข้อมูลเป็น<em>ภาษาไทย</em> ตามความเป็นจริงทุกช่อง
                </div>

                <br/>

                <div class="row">

                    <form id="main-form" class="col s12" method="POST" action="/register">

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="input-field col s12">
                                <select name="prefix" required>
                                    <option value="" selected disabled>เลือกคำนำหน้าชื่อ</option>
                                    <option value="master-boy"{{ old('prefix') === 'master-boy' ? " selected" : "" }}>เด็กชาย</option>
                                    <option value="master-girl"{{ old('prefix') === 'master-girl' ? " selected" : "" }}>เด็กหญิง</option>
                                    <option value="mr"{{ old('prefix') === 'mr' ? " selected" : "" }}>นาย</option>
                                    <option value="miss"{{ old('prefix') === 'miss' ? " selected" : "" }}>นางสาว</option>
                                    <option value="mrs"{{ old('prefix') === 'mrs' ? " selected" : "" }}>นาง</option>
                                    <option value="other"{{ old('prefix') === 'other' ? " selected" : "" }}>อื่นๆ (โปรดระบุในช่องต่อไป ติดกับชื่อ)</option>
                                </select>

                                <label>คำนำหน้าชื่อ</label>

                                @if ($errors->has('prefix'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prefix') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s12">
                                <input name="firstName" id="firstName" type="text" class="validate" value="{{ old('firstName') }}" required/>
                                <label for="firstName">ชื่อ</label>

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s12">
                                <input name="lastName" id="lastName" type="text" class="validate" value="{{ old('lastName') }}" required/>
                                <label for="lastName">นามสกุล</label>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s12">
                                <input name="email" id="email" type="email" class="validate" value="{{ old('email') }}" required/>
                                <label for="email">อีเมล</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s12">
                                <select id="accountType" name="accountType" required>
                                    <option value="" selected disabled>เลือกประเภท</option>
                                    <option value="student"{{ old('accountType') === 'student' ? " selected" : "" }}>นักเรียน</option>
                                    <option value="teacher"{{ old('accountType') === 'teacher' ? " selected" : "" }}>ครู</option>
                                    <option value="student-college"{{ old('accountType') === 'student-college' ? " selected" : "" }}>นักศึกษา</option>
                                    <option value="guardian"{{ old('accountType') === 'guardian' ? " selected" : "" }}>ผู้ปกครอง</option>
                                </select>

                                <label>ประเภท</label>

                                @if ($errors->has('accountType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accountType') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <div id="studentYearDiv" class="input-field col s12">
                                <select id="studentYear" name="studentYear">
                                    <option value="" selected disabled>เลือกชั้นปีที่ศึกษา</option>
                                    <option value="p1-3"{{ old('accountType') === 'p1-3' ? " selected" : "" }}>ประถมศึกษาตอนต้น</option>
                                    <option value="p4-6"{{ old('accountType') === 'p4-6' ? " selected" : "" }}>ประถมศึกษาตอนปลาย</option>
                                    <option value="m1"{{ old('accountType') === 'm1' ? " selected" : "" }}>มัธยมศึกษาปีที่ 1</option>
                                    <option value="m2"{{ old('accountType') === 'm2' ? " selected" : "" }}>มัธยมศึกษาปีที่ 2</option>
                                    <option value="m3"{{ old('accountType') === 'm3' ? " selected" : "" }}>มัธยมศึกษาปีที่ 3</option>
                                    <option value="m4"{{ old('accountType') === 'm4' ? " selected" : "" }}>มัธยมศึกษาปีที่ 4</option>
                                    <option value="m5"{{ old('accountType') === 'm5' ? " selected" : "" }}>มัธยมศึกษาปีที่ 5</option>
                                    <option value="m6"{{ old('accountType') === 'm6' ? " selected" : "" }}>มัธยมศึกษาปีที่ 6</option>
                                </select>

                                <label>ชั้นปีที่ศึกษา</label>

                                @if ($errors->has('studentYear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('studentYear') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s12">
                                <input name="schoolName" type="text" id="autocomplete-input" class="autocomplete">
                                <label for="autocomplete-input">โรงเรียน (ไม่ต้องมีคำว่า'โรงเรียน')</label>
                                @if ($errors->has('schoolName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('schoolName') }}</strong>
                                        <br/>
                                        <br/>
                                    </span>
                                @endif
                            </div>

                            <button class="btn waves-effect waves-light" type="submit" style="margin-top: 32px;">
                                ลงทะเบียน
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('startup-js')

    $('input.autocomplete').autocomplete({
        data: {
            'เตรียมอุดมศึกษา' : null,
            'สาธิตมหาวิทยาลัยศรีนครินทรวิโรฒ ปทุมวัน' : null,
            'สตรีวิทยา' : null,
            'สามเสนวิทยาลัย' : null,
            'บดินทรเดชา (สิงห์ สิงหเสนี)' : null,
            'เตรียมอุดมศึกษาพัฒนาการ' : null,
            'สวนกุหลาบวิทยาลัย' : null,
            'สาธิตจุฬาลงกรณ์มหาวิทยาลัย ฝ่ายมัธยม' : null,
            'โยธินบูรณะ' : null,
            'สตรีวิทยา ๒' : null,
            'สาธิตแห่งมหาวิทยาลัยเกษตรศาสตร์ ศูนย์วิจัยฯ' : null,
            'สวนกุหลาบวิทยาลัย นนทบุรี' : null,
            'หอวัง' : null,
            'เบญจมราชูทิศ' : null,
            'มาแตร์เดอีวิทยาลัย' : null,
            'สาธิตมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา' : null,
            'เซนต์โยเซฟคอนเวนต์' : null,
            'นครสวรรค์' : null,
            'ศึกษานารี' : null,
            'หาดใหญ่วิทยาลัย' : null,
            'อัสสัมชัญ' : null,
            'สุราษฎร์ธานี' : null,
            'เตรียมอุดมศึกษาน้อมเกล้า' : null,
            'สุรนารีวิทยา' : null,
            'ระยองวิทยาคม' : null,
            'วัฒนาวิทยาลัย' : null,
            'เซนต์คาเบรียล' : null,
            'สาธิตมหาวิทยาลัยราชภัฏเทพสตรี' : null,
            'บดินทรเดชา (สิงห์ สิงหเสนี) ๒' : null,
            'อัสสัมชัญคอนแวนต์' : null,
            'อุดรพิทยานุกูล' : null,
            'สาธิตมหาวิทยาลัยราชภัฏนครปฐม' : null,
            'เบญจมราชูทิศ จังหวัดจันทบุรี' : null,
            'ชลราษฎรอำรุง' : null,
            'ภูเก็ตวิทยาลัย' : null,
            'พรหมานุสรณ์จังหวัดเพชรบุรี' : null,
            'ชลกันยานุกูล' : null,
            'เบ็ญจะมะมหาราช' : null,
            'แสงทองวิทยา' : null,
            'สวนกุหลาบวิทยาลัย รังสิต' : null,
            'เทพศิรินทร์' : null,
            'โพธิสารพิทยากร' : null,
            'ราชวินิตบางแก้ว' : null,
            'เซนต์ฟรังซีสซาเวียร์คอนแวนต์' : null,
            'สาธิต "พิบูลบำเพ็ญ" มหาวิทยาลัยบูรพา' : null,
            'กรุงเทพคริสเตียนวิทยาลัย' : null,
            'วิสุทธรังษี จังหวัดกาญจนบุรี' : null,
            'จุฬาภรณราชวิทยาลัย ตรัง' : null,
            'สาธิต มศว ประสานมิตร (ฝ่ายมัธยม)' : null,
            'ราชินี' : null,
            'เบญจมราชูทิศ ราชบุรี' : null,
            'นวมินทราชินูทิศ เตรียมอุดมศึกษาน้อมเกล้า' : null,
            'มัธยมปัญญารัตน์' : null,
            'ราชินีบน' : null,
            'สาธิตมหาวิทยาลัยราชภัฏสวนสุนันทา' : null,
            'มัธยมวัดนายโรง' : null,
            'ธิดานุเคราะห์' : null,
            'ศรียาภัย' : null,
            'สตรีวัดมหาพฤฒาราม ในพระบรมราชินูปถัมภ์' : null,
            'สาธิตแห่งมหาวิทยาลัยเกษตรศาสตร์' : null,
            'อัสสัมชัญสมุทรปราการ' : null,
            'เบญจมราชรังสฤษฎิ์ ฉะเชิงเทรา' : null,
            'มอ.วิทยานุสรณ์' : null,
            'เซนต์โยเซฟ บางนา' : null,
            'สิรินธร' : null,
            'ราชสีมาวิทยาลัย' : null,
            'มัธยมสาธิตมหาวิทยาลัยนเรศวร' : null,
            'บุรีรัมย์พิทยาคม' : null,
            'วิทยานุกูลนารี' : null,
            'สระบุรีวิทยาคม' : null,
            'สารสาสน์เอกตรา' : null,
            'อัสสัมชัญธนบุรี' : null,
            'วัดสุทธิวราราม' : null,
            'เซนต์ดอมินิก' : null,
            'อำนวยศิลป์' : null,
            'ยอแซฟอุปถัมภ์' : null,
            'บูรณะรำลึก' : null,
            'สารสาสน์วิเทศร่มเกล้า' : null,
            'สามัคคีวิทยาคม' : null,
            'มงฟอร์ตวิทยาลัย' : null,
            'สาธิตมหาวิทยาลัยรามคำแหง' : null,
            'ปราจิณราษฎรอำรุง' : null,
            'มัธยมสาธิตวัดพระศรีมหาธาตุ มหาวิทยาลัยราชภัฏพระนคร' : null,
            'สาธิตมหาวิทยาลัยสงขลานครินทร์' : null,
            'เฉลิมขวัญสตรี' : null,
            'จุฬาภรณราชวิทยาลัย ปทุมธานี' : null,
            'สตรีวิทยา ๒ มัธยมศึกษาตอนต้น' : null,
            'พิชัยรัตนาคาร' : null,
            'อัสสัมชัญศรีราชา' : null,
            'ตราษตระการคุณ' : null,
            'จิตรลดา' : null,
            'ปทุมเทพวิทยาคาร' : null,
            'ร้อยเอ็ดวิทยาลัย' : null,
            'วาสุเทวี' : null,
            'พระหฤทัยคอนแวนต์' : null,
            'บุญวาทย์วิทยาลัย' : null,
            'สายน้ำผึ้ง ในพระอุปถัมภ์ฯ' : null,
            'สตรีศึกษา' : null,
            'อัสสัมชัญหลักสูตรภาษาอังกฤษ' : null,
            'นารีรัตน์ จังหวัดแพร่' : null,
            'ขอนแก่นวิทยายน' : null,
            'วินิตศึกษา ในพระราชูปถัมภ์ฯ' : null,
            'พัทลุง' : null,
            'เบญจมเทพอุทิศจังหวัดเพชรบุรี' : null,
            'สตรีสมุทรปราการ' : null,
            'สอาดเผดิมวิทยา' : null,
            'สารสาสน์วิเทศศึกษา' : null,
            'ขจรเกียรติศึกษา' : null,
            'สารสาสน์วิเทศสายไหม' : null,
            'สารวิทยา' : null,
            'พระมารดานิจจานุเคราะห์' : null,
            'ศรัทธาสมุทร' : null,
            'อำมาตย์พานิชนุกูล' : null,
            'จุฬาภรณราชวิทยาลัย นครศรีธรรมราช' : null,
            'สตรีนนทบุรี' : null,
            'สาธิตมหาวิทยาลัยขอนแก่น' : null,
            'เซนต์ฟรังซีสเซเวียร์' : null,
            'สาธิต มหาวิทยาลัยศิลปากร' : null,
            'วัดราชบพิธ' : null,
            'นาคประสิทธิ์' : null,
            'กรรณสูตศึกษาลัย จังหวัดสุพรรณบุรี' : null,
            'ปรินส์รอยแยลส์วิทยาลัย' : null,
            'จุฬาภรณราชวิทยาลัย ชลบุรี' : null,
            'สาธิตมหาวิทยาลัยมหาสารคาม (ฝ่ายมัยธยม)' : null,
            'สารสาสน์วิเทศบางบอน' : null,
            'เขมะสิริอนุสสรณ์' : null,
            'มอ.วิทยานุสรณ์ สุราษฎร์ธานี' : null,
            'จุฬาภรณราชวิทยาลัย สตูล' : null,
            'สาธิต มหาวิทยาลัยสงขลานครินทร์' : null,
            'สมุทรสาครวิทยาลัย' : null,
            'อุตรดิตถ์ดรุณี' : null,
            'วัดปทุมวนาราม ในพระราชูปถัมภ์ฯ' : null,
            'เทพศิรินทร์ นนทบุรี' : null,
            'เพลินพัฒนา' : null,
            'ซางตาครู้สคอนแวนท์' : null,
            'นวมินทราชินูทิศ สตรีวิทยา พุทธมณฑล' : null,
            'ราชวินิต มัธยม' : null,
            'ไทยคริสเตียน' : null,
            'สงวนหญิง' : null,
            'เลยพิทยาคม' : null,
            'สาธิตพัฒนา' : null,
            'นครนายกวิทยาคม' : null,
            'เบญจมราชรังสฤษฎิ์ 2' : null,
            'อุทัยวิทยาคม' : null,
            'สตรีอ่างทอง' : null,
            'อัสสัมชัญศึกษา' : null,
            'พิษณุโลกพิทยาคม' : null,
            'สุรวิทยาคาร' : null,
            'เตรียมอุดมศึกษาพัฒนาการ นนทบุรี' : null,
            'มัธยมสาธิต มรภ.บ้านสมเด็จเจ้าพระยา' : null,
            'สารสาสน์วิเทศนครราชสีมา' : null,
            'จุฬาภรณราชวิทยาลัย บุรีรัมย์' : null,
            'มารีย์วิทยา' : null,
            'ชลประทานวิทยา' : null,
            'ยโสธรพิทยาคม' : null,
            'พระปฐมวิทยาลัย' : null,
            'ชัยนาทพิทยาคม' : null,
            'สตรีสิริเกศ' : null,
            'ปิยะมหาราชาลัย' : null,
            'สาธิตแห่งมหาวิทยาลัยรังสิต' : null,
            'มัธยมสาธิต มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา' : null,
            'ไผทอุดมศึกษา' : null,
            'พิริยาลัยจังหวัดแพร่' : null,
            'สารสาสน์วิเทศสุวรรณภูมิ' : null,
            'มัธยมสาธิตมหาวิทยาลัยราชภัฏสวนสุนันทา' : null,
            'ทวีธาภิเศก' : null,
            'ศรีสวัสดิ์วิทยาคารจังหวัดน่าน' : null,
            'สตรีศรีสุริโยทัย' : null,
            'อุตรดิตถ์' : null,
            'สิงห์บุรี' : null,
            'พระหฤทัยนนทบุรี' : null,
            'สารสาสน์วิเทศนิมิตใหม่' : null,
            'มารีวิทย์ สัตหีบ' : null,
            'ปากช่อง' : null,
            'สกลราชวิทยานุกูล' : null,
            'วชิราวุธวิทยาลัย' : null,
            'เลิศหล้า ถนนกาญจนาภิเษก' : null,
            'สตรีวัดระฆัง' : null,
            'จินดามณี' : null,
            'สิงห์สมุทร' : null,
            'ศรียานุสรณ์' : null,
            'ชัยภูมิภักดีชุมพล' : null,
            'จุฬาภรณราชวิทยาลัย มุกดาหาร' : null,
            'สาธิตเทศบาลวัดเพชรจริก' : null,
            'สิรินธรราชวิทยาลัย' : null,
            'นวมินทราชินูทิศ บดินทรเดชา' : null,
            'เซนต์โยเซฟทิพวัล' : null,
            'ศรีสะเกษวิทยาลัย' : null,
            'สวนกุหลาบวิทยาลัย ธนบุรี' : null,
            'พนัสพิทยาคาร' : null,
            'วัดปทุมวนาราม' : null,
            'ราชวินิตบางเขน' : null,
            'ประจวบวิทยาลัย' : null,
            'กาญจนาภิเษกวิทยาลัย สุพรรณบุรี' : null,
            'มหาวชิราวุธ จังหวัดสงขลา' : null,
            'สรรพวิทยาคม' : null,
            'ศรีอยุธยา ในพระอุปถัมภ์ฯ' : null,
            'กาญจนาภิเษกวิทยาลัย นครปฐม (พระตำหนักสวนกุหลาบมัธยม)' : null,
            'นวมินทราชินูทิศ สตรีวิทยา ๒' : null,
            'ดีบุกพังงาวิทยายน' : null,
            'สมุทรสาครบูรณะ' : null,
            'ดอนเมืองทหารอากาศบำรุง' : null,
            'นวมินทราชินูทิศ หอวัง นนทบุรี' : null,
            'สตรีศรีน่าน' : null,
            'สตรีวัดอัปสรสวรรค์' : null,
            'อัสสัมชัญระยอง' : null,
            'บางปะกอกวิทยาคม' : null,
            'สาธิตมหาวิทยาลัยเชียงใหม่' : null,
            'ราชวินิตบางแก้ว ในพระบรมราชูปถัมภ์' : null,
            'รัตนโกสินทร์สมโภชบางขุนเทียน' : null,
            'มัธยมวัดสิงห์' : null,
            'ฤทธิยะวรรณาลัย' : null,
            'อมาตยกุล' : null,
            'รุ่งอรุณ' : null,
            'หล่มสักวิทยาคม' : null,
            'หัวหินวิทยาลัย' : null,
            'สุราษฎร์พิทยา' : null,
            'ธัชรินทร์วิทยาบางเขน' : null,
            'ถาวรานุกูล' : null,
            'พระหฤทัยดอนเมือง' : null,
            'มารีวิทย์' : null,
            'ปัญจทรัพย์' : null,
            'เลิศหล้า ถนนเกษตร-นวมินทร์' : null,
            'คณะราษฎร์บำรุงปทุมธานี' : null,
            'วัดเขมาภิรตาราม' : null,
            'สวนศรีวิทยา' : null,
            'ประชาคมนานาชาติ' : null,
            'อัสสัมชัญลำปาง' : null,
            'กาฬสินธุ์พิทยาสรรพ์' : null,
            'อนุราชประสิทธิ์' : null,
            'ตะพานหิน' : null,
            'จุฬาภรณราชวิทยาลัย เพชรบุรี' : null,
            'ยุพราชวิทยาลัย' : null,
            'ปัญญาวิทย์' : null,
            'จอมสุรางค์อุปถัมภ์' : null,
            'กรพิทักษ์ศึกษา' : null,
            'สองภาษาระยอง' : null,
            'จุฬาภรณราชวิทยาลัย ลพบุรี' : null,
            'สตรีประเสริฐศิลป์' : null,
            'ดรุณพัฒน์' : null,
            'สายปัญญา ในพระบรมราชินูปถัมภ์' : null,
            'วัดนวลนรดิศ' : null,
            'มารีวิทยากบินทร์บุรี' : null,
            'วัดบวรนิเวศ' : null,
            'วัดแพรกษา' : null,
            'กสิณธรเซนต์ปีเตอร์' : null,
            'ป้อมนาคราชสวาทยานนท์' : null,
            'เซนต์หลุยส์ ฉะเชิงเทรา' : null,
            'พิจิตรพิทยาคม' : null,
            'ตะกั่วป่า "เสนานุกูล"' : null,
            'ลาซาล' : null,
            'สตรีนครสวรรค์' : null,
            'ห้องสอนศึกษา' : null,
            'สมถวิล วิเทศศึกษา ห้วยมงคล' : null,
            'อ่างทองปัทมโรจน์วิทยาคม' : null,
            'นานาชาติเซนต์ สตีเฟนส์' : null,
            'เบญจมราชาลัย ในพระบรมราชูปถัมภ์' : null,
            'สันติดรุณ' : null,
            'อัสสัมชัญคอนแวนต์ ลพบุรี' : null,
            'สำเร็จวิทยา' : null,
            'เซนต์โยเซฟระยอง' : null,
            'ปากเกร็ด' : null,
            'สันติราษฎร์วิทยาลัย' : null,
            'บางมดวิทยา' : null,
            'กาญจนาภิเษกวิทยาลัย นครปฐม' : null,
            'ศรีบุณยานนท์' : null,
            'เตรียมอุดมศึกษาพัฒนาการ รัชดา' : null,
            'เทพศิรินทร์ร่มเกล้า' : null,
            'วิทยาลัยนาฎศิลปเชียงใหม่' : null,
            'ธีรธาดา พิษณุโลก' : null,
            'มัธยมตากสินระยอง' : null,
            'คริสตสงเคราะห์' : null,
            'นวมินทราชินูทิศ เตรียมอุดมศึกษาพัฒนาการ' : null,
            'ภูบดินทร์พิทยาลัย' : null,
            'สตรีชัยภูมิ' : null,
            'ทิวไผ่งาม' : null,
            'สาธิตมหาวิทยาลัยมหาสารคาม' : null,
            'ศรีกระนวนวิทยาคม' : null,
            'สายปัญญารังสิต' : null,
            'เทพศิรินทร์ สมุทรปราการ' : null,
            'สุรศักดิ์มนตรี' : null,
            'แม่พระฟาติมา' : null,
            'วิชัยวิทยา' : null,
            'วิเศษไชยชาญ "ตันติวิทยาภูมิ"' : null,
            'บางกะปิ' : null,
            'Ramkhamhaeng Advent International School' : null,
            'อัสสัมชัญคอนแวนต์ ลำนารายณ์' : null,
            'ลาดปลาเค้าพิทยาคม' : null,
            'อุดมศึกษา' : null,
            'สีตบุตรบำรุง' : null,
            'เทพลีลา' : null,
            'มุกดาหาร' : null,
            'University of Cambridge' : null,
            'สามมุกคริสเตียนวิทยา' : null,
            'บางมูลนากภูมิวิทยาคม' : null,
            'เซนต์หลุยส์ศึกษา' : null,
            'ธรรมศาสตร์คลองหลวงวิทยาคม' : null,
            'พระโขนงพิทยาลัย' : null,
            'อำนาจเจริญ' : null,
            'อรรถมิตร' : null,
            'ลาซาลโชติรวีนครสวรรค์' : null,
            'ตันตรารักษ์' : null,
            'รุ่งอรุณวิทยา' : null,
            'เฉลิมพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัวภูมิพลอดุยเดชฯ' : null,
            'เตรียมอุดมศึกษาพัฒนาการสุวรรณภูมิ' : null,
            'สารสาสน์วิเทศราชพฤกษ์' : null,
            'สุคนธีรวิทย์' : null,
            'แกลง "วิทยสถาวร"' : null,
            'ราชโบริกานุเคราะห์' : null,
            'ดัดดรุณี' : null,
            'อัมพรไพศาล' : null,
            'ศรีวิกรม์' : null,
            'Westbourne School UK.' : null,
            'สาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)' : null,
            'พรตพิทยพยัต' : null,
            'มัธยมสังคีตวิทยา กรุงเทพมหานคร' : null,
            'กัลยาณีศรีธรรมราช' : null,
            'กาญจนาภิเษกวิทยาลัย สุราษฎร์ธานี' : null,
            'นางรอง' : null,
            'เบตง "วีระราษฎร์ประสาน"' : null,
            'ราชนันทาจารย์ สามเสนวิทยาลัย 2' : null,
            'วิทยาลัยนาฏศิลป' : null,
            'สระแก้ว' : null,
            'สภาราชินี จังหวัดตรัง' : null,
            'อัสสัมชัญอุบลราชธานี' : null,
            'วัดป่าประดู่' : null,
            'วัชรวิทยา' : null,
            'เลิศปัญญา' : null,
            'วังน้ำเย็นวิทยาคม' : null,
            'เต็มรักศึกษา' : null,
            'หัวหิน' : null,
            'อนุบาลวชิร' : null,
            'ร่วมฤดีวิเทศศึกษา' : null,
            'ทีปังกรวิทยาพัฒน์ (วัดน้อยใน) ในพระราชูปถัมภ์ฯ' : null,
            'ปลูกปัญญา' : null
        },
        limit: 20
    });

    $('select').material_select();
    student();
    $("#accountType").on('change', function() {
        student();
    });
@endsection
