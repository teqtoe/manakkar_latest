<div class="bg-light">
<div class="container py-5">
    <div class="login-box">
    <div class="row no-gutters justify-content-center">

        <div class="col-md-6 login-left-bg">
            <img src="themes/edugator/assets/image/login-bg.jpg" class="img-fluid display-xs">
        </div>
        <div class="col-md-6 mx-auto">

            <div class="card-content">

                <div class="card-body">

            <h2 class="mb-5">{{__t('signup')}}  </h2>

            <div class="auth-form-wrap">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="name" class="col-form-label">{{__t('name')}}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="email" class="control-label">{{__t('email_address')}}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                        <label for="password" class="control-label">{{__t('password')}}</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-12">
                            <label for="password-confirm" class="control-label">{{__t('confirm_password')}}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-12">
                        <label for="password-confirm" class="control-label">{{__t('i_am')}}</label>
                        <br>
                            <label class="mr-3"><input type="radio" name="user_as" value="student" {{old('user_as') ? (old('user_as') == 'student') ? 'checked' : '' : 'checked' }}> {{__t('student')}} </label>
                            <label><input type="radio" name="user_as" value="instructor" {{old('user_as') == 'instructor' ? 'checked' : ''}} > {{__t('instructor')}} </label>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary signup-btn"> {{__t('register')}} </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>