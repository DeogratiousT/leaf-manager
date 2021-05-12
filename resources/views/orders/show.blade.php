@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
        <li class="breadcrumb-item active">{{ $order->order_number}}</li>
    </ol>
@endsection

@section('dynamic-content')
    @php
        $required_amount = round(($order->amount * 100) / ($order->product->yield_percentage));
        
        $total_ratio = 0;

        foreach ($order->product->grades as $grade) {
            $total_ratio += $grade->pivot->ratio; 
        }
    
        
    @endphp
    <div class="container">
        <div class="row">        
            <div class="col-lg-4 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <p>Order Details</p><hr>
                        <div class="list-group">
                            <span><b>Order Number</b> : {{$order->order_number}}</span><br>
                            <span><b>Product</b> : {{$order->product->product_name}}</span><br>
                            <span><b>Amount States</b> : {{$order->amount}} KGs</span><br>
                            <span><b>Yield Percentage</b> : {{$order->product->yield_percentage}}%</span><br>
                            <span><b>Required Amount</b> : {{ $required_amount }} KGs</span>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-body"> 
                        <div class="mt-2" style="float:left">
                            <p>Grades Details</p>
                        </div>

                        @if(count($order->product->grades) > 0)
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Tobacco Type</th>
                                        <th>Grade Name</th>
                                        <th>Ratio</th>
                                        <th>Kilograms</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->product->grades as $grade)
                                        <tr>
                                            <td>{{ $grade->tobaccotype->type_name}}</td>
                                            <td>{{ $grade->grade_name}}</td>
                                            <td>{{ $grade->pivot->ratio}}</td>
                                            <td>{{ round((($grade->pivot->ratio) / $total_ratio) * $required_amount) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @else
                            <p style="text-align:center"><b>No Grade(s) for this Product</b></p>
                        @endif
                            
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        
        <div class="row">
            <div class="col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-body"> 
        
                        <div class="mt-2" style="float:left">
                            <p>Production Line Components</p>
                        </div>

                        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#plc-modal">
                            <i class="mdi mdi-plus-circle-outline mr-1"></i>Add Component
                        </button>

                        @if(count($order->orderplcomponents) > 0)
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>PL Component</th>
                                        <th>Value</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderplcomponents as $orderplcomponent)
                                        <tr>
                                            <td>{{ $orderplcomponent->order->order_number }}</td>
                                            <td>{{ $orderplcomponent->plcomponent->name }}</td>
                                            <td>{{ $orderplcomponent->value }}</td>
                                            <td>{{ $orderplcomponent->unit->unit_name }}</td>
                                            <td>                
                                                <a href="{{ route('orders.order-plcomponents.destroy', ['order'=>$order, 'order_plcomponent'=>$orderplcomponent]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Component Details" onclick="event.preventDefault();document.getElementById('remove-component-form_{{ $orderplcomponent->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
                                                <form id="remove-component-form_{{ $orderplcomponent->id }}" action="{{ route('orders.order-plcomponents.destroy', ['order'=>$order, 'order_plcomponent'=>$orderplcomponent]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @else
                            <br><br><p style="text-align:center"><b>No Production Line Component(s) for this Order</b></p>
                        @endif
                        
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>

            <div class="col-lg-4 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <p>Packaging</p><hr>
                        <div class="list-group">
                        
                        @isset($order->final_weight)
                            <p><b>Final Weight:</b> <span>{{ $order->final_weight }}&nbsp; KGs</span></p>

                            <hr>
                        <p><b>No. of 250 KG Cartons:</b> <span>{{ round($order->final_weight / 250) }}</span></p>

                        <hr>
                        <p><b>Remnants (KGs):</b> <span>{{ $order->final_weight % 250 }}</span></p>
                        @else 
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-final-weight-modal"><i class="mdi mdi-plus-circle-outline"></i>&nbsp;Add Final Order Weight</button>                            
                        @endisset
                            
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

        </div>

        <!-- PLC modal -->
        <div class="modal fade" id="plc-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">{{ $order->order_number }} Production Line Components</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('orders.order-plcomponents.store',$order) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="plcomponent_id">Production Line Component</label>
                                <select class="form-control {{ $errors->has('plcomponent_id') ? ' is-invalid' : '' }}" name="plcomponent_id" id="plcomponent_id">
                                    @foreach ($plComponents as $plComponent)
                                        <option value="{{ $plComponent->id }}">{{ $plComponent->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('plcomponent_id'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('plcomponent_id') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="value">Value</label>
                                <input class="form-control {{ $errors->has('value') ? ' is-invalid' : '' }}" type="number" id="value" name="value" value="{{ old('value') }}" placeholder="Enter the Component value" required>
                                @if ($errors->has('value'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('value') }}
                                    </span>
                                @endif
                            </div>
                
                
                            <div class="form-group">
                                <label for="unit_id">Weighing Unit</label>
                                <select class="form-control {{ $errors->has('unit_id') ? ' is-invalid' : '' }}" name="unit_id" id="unit_id">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('unit_id'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('unit_id') }}
                                    </span>
                                @endif
                            </div>
                
                            <div class="form-group mb-2 text-center">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="mdi mdi-content-save"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Add Final Weight Modal -->
        <div id="add-final-weight-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success">
                        <h4 class="modal-title" id="success-header-modalLabel">Add Final Order Weight in KGs</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body mx-3">
                        <form action="{{ route('orders.packaging.store',$order) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="final_weight">Final Order Weight</label>
                                <input class="form-control {{ $errors->has('final_weight') ? ' is-invalid' : '' }}" type="number" id="final_weight" name="final_weight" final_weight="{{ old('final_weight') }}" placeholder="Enter the final order weight" required>
                                @if ($errors->has('final_weight'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('final_weight') }}
                                    </span>
                                @endif
                            </div>
                
                            <div class="form-group mb-2 text-center">
                                <button class="btn btn-info btn-block" type="submit">
                                    <i class="mdi mdi-content-save"></i> Submit
                                </button>
                            </div>

                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div> --}}
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        
    </div>
@endsection