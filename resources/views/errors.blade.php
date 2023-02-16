@if ( isset($errors) && $errors->any() )
    @include('notice::message', ['class' => 'alert-danger', 'message' => implode('',$errors->all('<p>:message</p>'))])
@endif