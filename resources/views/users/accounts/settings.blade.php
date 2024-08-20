@extends('layouts.app')

@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.accountSidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                   <form method="post" action="{{route('users.settings.update')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px">
                          <span class="mt-4">Account Settings </span>
                            <hr>
                            <div class="row m-3">
                                <div class="col-12 col-md-4 ">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> First Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input @error('first_name') is-invalid @enderror" type="text"
                                            value="{{$user->first_name}}" placeholder="First name" id="name" name="first_name">
                                    </div>
                                    @error('first_name')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 ">
                                    <div class="ps-form__group">
                                        <label for="name" style="color:rgb(114, 111, 111)"> Last Name</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input @error('last_name') is-invalid @enderror" type="text"
                                            value="{{$user->last_name}}" placeholder="Last name"  name="last_name">
                                    </div>
                                    @error('first_name')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 ">
                                    <div class="ps-form__group">
                                        <label for="phone" style="color:rgb(114, 111, 111)"> Phone Number</label>
                                        <input style="border-radius: 5px" class="form-control ps-form__input @error('phone') is-invalid @enderror" type="text"
                                            value="{{$user->phone}}" placeholder="Phone Number" name="phone">
                                    </div>
                                    @error('phone')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="city" style="color:rgb(114, 111, 111)"> City</label>
                                        <input class="form-control ps-form__input @error('city') is-invalid @enderror" type="text"
                                            placeholder="Enter City and State"  id="city" value="{{$user->city}}" name="city">
                                    </div>
                                    @error('city')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="country" style="color:rgb(114, 111, 111)">Country </label>
                                        <input class="form-control ps-form__input @error('country') is-invalid @enderror" type="text"
                                            placeholder="Country"  id="country" value="{{$user->country}}" name="country">
                                    </div>
                                    @error('country')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="oldpassword" style="color:rgb(114, 111, 111)">Old Password</label>
                                        <input class="form-control ps-form__input @error('oldpassword') is-invalid @enderror" type="password"
                                            placeholder="Old password"  id="oldpassword" value="" name="oldpassword" autocomplete="off">
                                    </div>
                                    @error('old password')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mt-1">
                                    <div class="ps-form__group">
                                        <label id="password" style="color:rgb(114, 111, 111)">New Password</label>
                                        <input class="form-control ps-form__input @error('password') is-invalid @enderror" type="password"
                                            placeholder="password"  id="password" value="" name="password" autocomplete="off">
                                    </div>
                                    @error('password')
                                    <span class="alert alert-danger" role="error">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="m-4" style="">
                                <button class="ps-btn ps-btn--primary w-100" style="border-radius: 5px"> Update Account</button>
                            </div>
                        </div>
                    </div>
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
@endsection
