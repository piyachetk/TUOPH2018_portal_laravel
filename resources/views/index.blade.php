@extends('layouts.app')

@section("title")
    หน้าแรก
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
            <div class="z-depth-1 card-panel red white-text" style="max-width:1280px; margin: 3rem auto auto;">
                {{ session()->get('error') }}
            </div>
        @endif

        @if(session()->has('status'))
            <div class="z-depth-1 card-panel green white-text" style="max-width:1280px; margin: 3rem auto auto;">
                {{ session()->get('status') }}
            </div>
        @endif

        @if(\App\Http\Controllers\UserController::isLoggedIn())
            <div class="z-depth-1 card-panel white" style="max-width:800px;margin: 3rem auto auto;">
                <div class="row">
                    <h4 class="col s12">ลงทะเบียน</h4>
                    @if(\App\Http\Controllers\UserController::getUserData()['registered'])
                        <p class="col s12">คุณได้ลงทะเบียนเรียบร้อยแล้ว สามารถแก้ไขข้อมูลได้ผ่านทางแอปพลิเคชั่น</p>
                        <a class="right waves-effect waves-light btn" href="/redirectApp">ดาวน์โหลด</a>
                    @else
                        <p class="col s12">คุณยังไม่ได้ลงทะเบียน กดปุ่มต่อไปนี้เพื่อทำการลงทะเบียน</p>
                        <a class="right waves-effect waves-light btn" href="/register">ลงทะเบียน</a>
                    @endif
                </div>
            </div>
        @endif

        <!--Information here-->

    </div>
    <br><br>
</div>
@endsection
