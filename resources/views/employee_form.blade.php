@extends('layouts.app_dashboard')
@section('content_dashboard')
    <!-- Page Heading -->
    <div class="header-title-dash p-3">
        <h1 class="h3 mb-0 text-gray-800">Employee</h1>
    </div>
    <div class="p-3">
        <div class="pt-2">
            <form action="{{$route}}" method="POST">
                @CSRF
                @if (Route::currentRouteName() == "employee.edit")
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="exampleFormControlInput1">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="First Name"
                           value="@if(isset($employee)){{$employee->first_name}}@else{{old('first_name')}}@endif"
                           @if (Route::currentRouteName() == "employee.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Last Name"
                           value="@if(isset($employee)){{$employee->last_name}}@else{{old('last_name')}}@endif"
                           @if (Route::currentRouteName() == "employee.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email"
                           value="@if(isset($employee)) {{$employee->email}} @else {{old('email')}} @endif"
                           @if (Route::currentRouteName() == "employee.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone"
                           value="@if(isset($employee)){{$employee->phone}}@else{{old('phone')}}@endif"
                           @if (Route::currentRouteName() == "employee.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Companies</label>

                    <select class="form-control" id="exampleFormControlSelect1" name="company_id"
                    @if (Route::currentRouteName() == "employee.show")
                        disabled
                    @endif
                    >
                        @foreach($company as $item)
                            <option
                                @if(isset($employee))
                                    @if($employee->company_id == $item->id) selected @endif
                                @else
                                    @if(old('company_id') == $item->id) selected @endif
                                @endif
                            value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('company_id'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('company_id') }}</strong>
                            </span>
                    @endif
                </div>

                @if (Route::currentRouteName() != "employee.show")
                    <button type="submit" class="btn btn-success mb-3">Submit</button>
                @endif

            </form>
        </div>
    </div>
@endsection
