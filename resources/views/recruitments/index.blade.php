@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('cropyears.index') }}">Crop Year</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cropyears.recruitments.index',$cropyear) }}">{{ $cropyear->slug_name }}</a></li>
        <li class="breadcrumb-item active">Recruited Farmers</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('cropyears.recruitments.create',$cropyear) }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Recruit Farmers</a>

    <a href="{{ route('cropyear-farmers-pdf',$cropyear) }}" class="btn btn-secondary"><i class="mdi mdi-file-export-outline mr-1"></i>Export PDF</a>

    <a href="{{ route('cropyear-farmers-excel',$cropyear) }}" class="btn btn-secondary"><i class="mdi mdi-file-export-outline mr-1"></i>Export Excel</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <h4>Crop Year: {{ $cropyear->slug_name }}</h4>
        <table class="table table-hover table-centered mb-0">
            <thead>
                <tr>
                    <th>ID NO.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Acrerage</th>
                    <th>County</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($farmers) > 0)
                    @foreach ($farmers as $farmer)
                        <tr>
                            <td>{{ $farmer->id_number }}</td>
                            <td>{{ $farmer->first_name }} {{ $farmer->middle_name }} {{ $farmer->last_name }}</td>
                            <td>{{ $farmer->mobile_number }}</td>
                            <td>{{ $farmer->acrerage }}</td>
                            <td>{{ $farmer->county->county_name }}</td>
                            <td>
                                <a href="{{ route('cropyears.recruitments.destroy', ['cropyear'=>$cropyear, 'recruitment'=>$farmer]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Remove farmer" onclick="event.preventDefault();document.getElementById('remove-farmer-form_{{ $farmer->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
                                <form id="remove-farmer-form_{{ $farmer->id }}" action="{{ route('cropyears.recruitments.destroy', ['cropyear'=>$cropyear, 'recruitment'=>$farmer]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{$farmers->links()}}
                @else
                    <tr>
                        <td colspan="4"><p style="text-align:center">No Record(s)</p></td>
                    </tr>
                                        
                @endif
            </tbody>
        </table>
    </div>
    
@endsection

