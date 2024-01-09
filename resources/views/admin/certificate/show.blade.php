    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ __('dashboard.view') }} {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><span class="text-highlight">{{ __('dashboard.title') }}:</span> {{ $row->title }}</h4>
                    <hr/>

                    @if(is_file('uploads/'.$path.'/'.$row->image_path))
                    <p><span class="text-highlight">{{ __('dashboard.thumbnail') }}:</span></p>
                    <img src="{{ asset('uploads/'.$path.'/'.$row->image_path) }}" class="img-fluid" alt="Logo">
                    @endif

                    <hr>
                    <p><span class="text-highlight">{{ __('dashboard.description') }}:</span> {!! $row->description !!}</p>
                    <hr>

                    @if(!empty($row->link))
                    <hr/>
                    <p><span class="badge badge-primary">{{ __('dashboard.web_link') }}:</span> <a href="{{ $row->link }}" target="_blank">{{ $row->link }}</a></p>
                    @endif

                    <hr/>
                    <p><span class="text-highlight">{{ __('dashboard.status') }}:</span> 
                    @if( $row->status == 1 )
                    <span class="badge badge-success badge-pill">{{ __('dashboard.active') }}</span>
                    @else
                    <span class="badge badge-danger badge-pill">{{ __('dashboard.inactive') }}</span>
                    @endif
                    </p>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dashboard.btn_close') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->