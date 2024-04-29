@include('admindashboard.style')
<!-- Sidebar  -->
@include('admindashboard.nav')
<!-- end sidebar -->
<!-- right content -->
<div id="content">
    <!-- topbar -->
    @include('admindashboard.topbar')
    <!-- end topbar -->

    <body class="dashboard dashboard_1">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 style="margin-left: 170px; margin-top: 20px;">Add Supplier</h1>

                    <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Supplier Name:</strong>
                                    <input type="text" name="supplier_name" class="form-control"
                                        placeholder="Supplier Name" />
                                </div>
                                @error('supplier_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" class="form-control" placeholder="Email" />
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Phone:</strong>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" />
                                </div>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <input type="text" name="eddress" class="form-control" placeholder="Address" />
                                </div>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="company"><strong>Company:</strong></label>
                                    <input type="text" name="company" class="form-control" placeholder="Company">
                                </div>
                                @error('company')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</div>
@include('admindashboard.script')
