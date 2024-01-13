@extends('layouts.app')

@section('content')
<x-banner title="Post Details" description="Single blog post"></x-banner>
    <div class="container m-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div id="data">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
   
@endsection
@section('contents')
    {!! $dataTable->table(['class' => 'table table-bordered'], true) !!}
@endsection
 
@push('scripts')
    
{{ $dataTable->scripts() }}
@endpush

