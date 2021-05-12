@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('balereceptions.index') }}">Bale Receptions</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balereceptions.bales.index',$balereception) }}">Bales</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('balereceptions.bales.create',$balereception) }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Bale</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="bales-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Number</th>
                    <th>Grade</th>
                    <th>Weight at Reception</th>
                    <th>Farmer</th>
                    <th>Market</th>
                    <th>Store</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($bales)
                    @if (count($bales) > 0)
                        @foreach ($bales as $bale)
                            <tr>
                                <td>{{ $bale->number }}</td>
                                <td>{{ $bale->grade->grade_name }}</td>
                                <td>{{ $bale->weight_at_reception }}</td>
                                <td>{{ $bale->farmer->first_name }}</td>
                                <td>{{ $bale->balereception->station->name }}</td>
                                <td>{{ $bale->balereception->store->name }}</td>
                                <td><span class="badge badge-primary">{{ $bale->state }}</span></td>
                                <td>
                                    <a href="{{ route('balereceptions.bales.edit',['balereception'=>$balereception, 'bale'=>$bale]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit balereception Grade"> <i class="mdi mdi-square-edit-outline"></i></a>

                                    <a href="{{ route('balereceptions.bales.destroy', ['balereception'=>$balereception, 'bale'=>$bale]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete balereception Grade" onclick="event.preventDefault();document.getElementById('remove-balereception-grade-form_{{ $bale->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
                                    <form id="remove-balereception-grade-form_{{ $bale->id }}" action="{{ route('balereceptions.bales.destroy', ['balereception'=>$balereception, 'bale'=>$bale]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><p style="text-align:center">No Record(s)</p></td>
                        </tr>
                    @endif                    
                @endisset
            </tbody>
        </table>
    </div>
    
@endsection

