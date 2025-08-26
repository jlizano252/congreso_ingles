<div>
    {{-- total records widget --}}
    <div class="card overflow-hidden" style="min-width: 12rem">
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h6>Total Records<span class="badge {{ $today_count > 0 ? 'badge-soft-success' : 'badge-soft-warning' }} rounded-pill ms-2">{{ $today_count }} Today</span></h6>
            <div class="d-flex align-items-end mb-2">
                <div class="display-4 fs-4 fw-semi-bold font-sans-serif text-warning" data-countup="{&quot;endValue&quot;:{{ $count }},&quot;decimalPlaces&quot;:0,&quot;suffix&quot;:&quot;&quot;}">{{ $count }}</div>
                <span class="ms-1 text-muted h4 mb-0">
                    <i class="fas fa-user-friends"></i>
                </span>
            </div>
        </div>
    </div>
</div>
