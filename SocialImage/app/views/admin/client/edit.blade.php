@extends('layout.admin')

@section('content')
<div class="container">
	<form method="POST" action="{{{ URL::to('users/update') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $user->id }}">
    <fieldset>
        @if (Cache::remember('username_in_confide', 5, function() {
            return Schema::hasColumn(Config::get('auth.table'), 'username');
        }))
            <div class="form-group">
                <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ (isset($user->username))?$user->username:'' }}}">
            </div>
        @endif
        <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ (isset($user->email))?$user->email:'' }}}">
        </div>
        <div class="form-group">
            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
        </div>

        <input type="hidden" name="confirmed" value="1">

        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">
                @if (is_array(Session::get('error')))
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{ URL::to('admin/client') }}" class="btn btn-default">Cencel</a>
        </div>

    </fieldset>
</form>
	
</div>
@stop