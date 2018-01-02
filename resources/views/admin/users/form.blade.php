

            <div class="login_wrapper">


                    <div class="from-group form-group-lg {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name </label>
                        {!! Form::text('name',null,['class'=>'form-control','id'=>'user','autofocus require','value'=>old('email')]) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="from-group form-group-lg {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email_Address: </label>
                        {!! Form::email('email',null,['class'=>'form-control','id'=>'email','autofocus require','value'=>old('email')]) !!}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                @if(isset($user_one))
                    <div class="form-group form-group-lg {{$errors->has('passowrd')? 'has-error': ''}}">
                        <label for="pwd">New Password: </label>
                        <input id="password" type="password" class="form-control" name="password" >

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                @endif

                @if(!isset($user_one))
                    <div class="form-group form-group-lg {{$errors->has('passowrd')? 'has-error': ''}}">
                        <label for="pwd">Password: </label>
                        <input id="password" type="password" class="form-control" name="password" >

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group form-group-lg">
                        <label for="password">Confirm Password: </label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                    </div>


                    <div class="login_submit">
                        <button class="btn btn-primary btn-lg">Create Account</button>
                    </div>
                @endif

                @if(isset($user_one))
                <div class="login_submit" style="margin-top: 20px; margin-right: 10px;">
                    <button class="btn btn-primary btn-lg">Update my Info</button>
                </div>
                    @endif

            </div>