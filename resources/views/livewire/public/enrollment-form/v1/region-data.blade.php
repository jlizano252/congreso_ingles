<div>
    {{-- region data --}}
    <div class="row mb-3">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="">
                <div class="d-flex align-items-start">
                    <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                    <label class="mt-1 mb-0" for="user-ide">Dirección Regional de Educación a la que pertenece</label>
                </div>
                <select wire:model="selected_region_id" wire:change="emitEvent" class="form-select form-select-sm" aria-label="Default select example">
                    @foreach( $region_list as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
