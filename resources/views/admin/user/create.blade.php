    <!-- Add modal content -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ __('dashboard.add') }} {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">{{ __('dashboard.name') }} <span>*</span></label>
                        <input type="text" class="form-control" name="name" id="title" value="{{ old('name') }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.name') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">{{ __('dashboard.email') }} <span>*</span></label>
                        <input type="mail" class="form-control" name="email" id="title" value="{{ old('email') }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">{{ __('dashboard.password') }} <span>*</span></label>
                        <input type="mail" class="form-control" name="password" id="title" value="{{ old('password') }}" required>

                        <div class="invalid-feedback">
                          {{ __('dashboard.please_provide') }} {{ __('dashboard.password') }}
                        </div>
                    </div>




                    <div class="col-lg-12 col-md-12 col-12">
                        <select name="department" id="group" class="form-control group-select">
                            <option value="" selected=""> {{ __('contact.choose_dep') }}</option>

                            @foreach(\App\Models\PortfolioCategory::all() as $department)

                            <option value="{{ $department->id  }}">{{ $department->title }}</option>
                            @endforeach


                    </select>                                </div>


                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dashboard.btn_close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('dashboard.btn_save') }}</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
