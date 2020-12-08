@extends('layouts.app')

@section('content')
<div class="container">
    <home-components :applicants="{{json_encode($applicant)}}" :division-names="{{json_encode($divisionsNames)}}"></home-components>
</div>
@endsection
