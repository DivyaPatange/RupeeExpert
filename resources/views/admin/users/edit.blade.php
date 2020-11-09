@extends('admin.adminLayout.mainlayout')
@section('title', 'Edit User')
@section('content')
@section('page_title', 'Edit User')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit User</div>
            </div>
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div  class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email2">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email2" placeholder="Enter Email" name="email" value="{{ $user->email }}" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_no">Contact No.</label>
                            <input type="number" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" placeholder="Enter Contact No." name="contact_no" value="{{ $user->contact_no }}">
                            @error('contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pan_card_no">PAN Card No.</label>
                            <input type="text" class="form-control @error('pan_card_no') is-invalid @enderror" id="pan_card_no" placeholder="Enter PAN Card No." name="pan_card_no" value="{{ $user->pan_card_no }}">
                            @error('pan_card_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bank_acc_no">Bank Account No.</label>
                            <input type="text" class="form-control @error('bank_acc_no') is-invalid @enderror" id="bank_acc_no" placeholder="Enter Bank Account No." name="bank_acc_no" value="{{ $user->bank_acc_no }}">
                            @error('bank_acc_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ifsc_code">IFSC Code</label>
                            <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" id="ifsc_code" placeholder="Enter IFSC Code" name="ifsc_code" value="{{ $user->ifsc_code }}">
                            @error('ifsc_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="4">
                            {{ $user->address }}
							</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="Enter State" name="state" value="{{ $user->state }}">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Enter City" name="city" value="{{ $user->city }}">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pin_code">Pin Code</label>
                            <input type="number" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" placeholder="Enter Pin Code" name="pin_code" value="{{ $user->pin_code }}">
                            @error('pin_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('admin.users.index') }}"><button class="btn btn-danger">Cancel</button></a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('customjs')

@endsection