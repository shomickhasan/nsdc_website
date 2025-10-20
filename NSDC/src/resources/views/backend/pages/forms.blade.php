@extends('backend.template.template')
@section('title', 'Dashboard')
@section('main')
    @section('top-nav-button')
       <li> <button type="button" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light">List View</button></li>
    @endsection
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vertical Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">First Name</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Email</label>
                                                <input type="email" id="email-id-vertical" class="form-control" name="email-id" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Mobile</label>
                                                <input type="number" id="contact-info-vertical" class="form-control" name="contact" placeholder="Mobile">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">Password</label>
                                                <input type="password" id="password-vertical" class="form-control" name="contact" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="select">Select</label>
                                                <select class="form-control" id="select">
                                                    <option>IT</option>
                                                    <option>Blade Runner</option>
                                                    <option>Thor Ragnarok</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="select">Radio Button</label>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <label>
                                                                <input type="radio" name="radio" checked>
                                                                Active
                                                            </label>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <label>
                                                                <input type="radio" name="radio">
                                                                Inactive
                                                            </label>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <label>
                                                                <input type="radio" disabled checked>
                                                                Active - disabled
                                                            </label>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block">
                                                        <fieldset>
                                                            <label>
                                                                <input type="radio" disabled>
                                                                Inactive - disabled
                                                            </label>
                                                        </fieldset>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type='date' class="form-control"/>
                                            </div>
                                        </div>
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label for="">Select With Search</label>
                                               <select class="select2 form-control">
                                                   <option value="square">Square</option>
                                                   <option value="rectangle">Rectangle</option>
                                                   <option value="rombo">Rombo</option>
                                                   <option value="romboid">Romboid</option>
                                                   <option value="trapeze">Trapeze</option>
                                                   <option value="traible">Triangle</option>
                                                   <option value="polygon">Polygon</option>
                                               </select>
                                           </div>
                                       </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
                                                <label for="first-name-column">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
                                                <label for="last-name-column">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                                                <label for="city-column">City</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                                                <label for="country-floating">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                                <label for="company-column">Company</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                                <label for="email-id-column">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="modal-themes">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modal Themes</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-warning mr-1 mb-1 d-inline-block">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#warning">
                                            Warning
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning white">
                                                        <h5 class="modal-title" id="myModalLabel140">Warning Modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                        carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet
                                                        gummi
                                                        bears cupcake dessert.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Accept</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#large">
            Large Modal
        </button>
        <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        I love tart cookie cupcake. I love chupa chups biscuit. I love marshmallow apple pie wafer
                        liquorice. Marshmallow cotton candy chocolate. Apple pie muffin tart. Marshmallow halvah pie
                        marzipan lemon drops jujubes. Macaroon sugar plum cake icing toffee.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
@endsection
