<div>
    {{-- appointment type --}}
    <div class="row mb-3">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="">
                <div class="d-flex align-items-start">
                    <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                    <label class="mt-1 mb-0" for="user-appoint">Tipo de nombramiento que ostenta</label>
                </div>
                <select wire:model="selected_appoint_id" wire:change="emitEvent" class="form-select form-select-sm">
                    @foreach( $appoint_list as $appoint )
                        <option value="{{$appoint->id}}">{{$appoint->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
