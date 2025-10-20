@extends('backend.template.template')
@section('title', 'Table')
@section('main')
    {{--@section('top-nav-button')
        <li> <button type="button" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light">Create</button></li>
    @endsection--}}
   <section class="mb-1">
       <div class="col-12">
           <h2 class="content-header-title float-left mb-0">Table</h2>
           <div class="breadcrumb-wrapper col-12">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.html">Home</a>
                   </li>
                   <li class="breadcrumb-item"><a href="#">Data List</a>
                   </li>
                   <li class="breadcrumb-item active">List View
                   </li>
               </ol>
           </div>
           <div class="col-12 top_btn">
               <div class="btn-group">
                   <button class="btn btn-outline-primary"><span><i class="feather icon-plus"></i> Add New</span></button>
               </div>
           </div>
       </div>
   </section>
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Table</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                              <table class="table table-striped data-table-with-export">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Shad Decker</td>
                                        <td>Regional Director</td>
                                        <td>Edinburgh</td>
                                        <td>51</td>
                                        <td>2008/11/13</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Bruce</td>
                                        <td>Javascript Developer</td>
                                        <td>Singapore</td>
                                        <td>29</td>
                                        <td>2011/06/27</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr>
                                        <td>Donna Snider</td>
                                        <td>Customer Support</td>
                                        <td>New York</td>
                                        <td>27</td>
                                        <td>2011/01/25</td>
                                        <td>$112,000</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
