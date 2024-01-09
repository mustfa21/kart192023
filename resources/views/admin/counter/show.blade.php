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
                    <h5><span class="text-highlight">{{ __('dashboard.value') }}:</span> <div class="btn btn-primary btn-sm">{{ $row->value }}</div></h5>
                    <hr/>
                    <p><span class="text-highlight">{{ __('dashboard.description') }}:</span> {!! $row->description !!}</p>

                    @if(!empty($row->icon))
                    <hr/>
                    <p><span class="text-highlight">{{ __('dashboard.icon') }}:</span> <div class="btn btn-secondary btn-sm">{!! $row->icon !!}</div></p>
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