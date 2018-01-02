

    <div class="panel panel-default">
        <div class="panel-heading">File Your Profile</div>

        <div class="panel-body">

            <div class="form-group">
                <label for="tilte" > Image </label>
                {!! Form::file('avatar',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="tilte" > Facebook Link </label>
                {!! Form::text('facebook',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Youtube Link </label>
                {!! Form::text('youtube',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="Content" > About You </label>
                {!! Form::textarea('about',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="text-center">
                    @if(!isset($var))
                    <button class="btn btn-success" type="submit">
                        Store profile
                    </button>
                        @else
                        <button class="btn btn-success" type="submit">
                            Update Profile
                        </button>
                        @endif
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>