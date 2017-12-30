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

        <div class="z-depth-1 card-panel white" style="max-width:800px;margin: 3rem auto auto;">
            <div class="row">
                <div class="col s12 m3 center-align">
                    <br />
                    <i class="large material-icons black-text">build</i><br/>
                </div>
                <div class="col s12 m9">
                    <h5 class="center">Under Construction</h5>
                    <p class="center">โปรดติดต่อ<a href="mailto:piyachetk@gmail.com">ผู้ดูแลระบบเว็บไซต์งานกิจกรรมพัฒนาผู้เรียน</a></p>
                    @if(\App\Http\Controllers\UserController::isLoggedIn())
                        <p class="center">Your ID is {{ \App\Http\Controllers\UserController::getUserData()['id'] }}</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
