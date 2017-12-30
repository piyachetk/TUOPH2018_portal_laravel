@extends('layouts.app')

@section("title")
    เข้าสู่ระบบ
@endsection

@section("content")
<div class="container">
    <div class="section">

        <div class="z-depth-1 card-panel white" style="max-width:540px;margin: 3rem auto auto;">
            <div class="row">
                <h3 class="col s12 center">เข้าสู่ระบบ</h3>
                <a href="/login/facebook" class="col s12 waves-effect waves-light btn blue" style="margin-top:32px;margin-bottom:8px;">เข้าสู่ระบบด้วย Facebook</a>
                <a href="/login/google" class="col s12 waves-effect waves-light btn red">เข้าสู่ระบบด้วย Google</a>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
