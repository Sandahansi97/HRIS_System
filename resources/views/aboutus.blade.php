@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('About us') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                <h5> 
                                Dumindu Industries (Pvt) Ltd is a manufacturing and distribution company in Sri Lanaka. Dumindu Industries (Pvt) Ltd
                                company loacated in Hambantota area (No, 2186 Singha Gammanaya,100 Feet Road, Hambantota). This company strated on 1998 
                                December as a family business with four family members. At present, they were able to increase the staff members up to 
                                fifty-two. And, they distribute their products to Colombo and within the Hambantota district.</h5>

                                <h4><b>Vision - “Active contribution of the business for the industrial and social development of the region, with more 
                                opportunities”.  </b></h4>

                                <h4><b>Mission – “To build a better brand name in our market with a certified standard.”</b><h4>
                                




                              




                </div>
            </div>
        </div>
    </div>
</div>
@endsection













