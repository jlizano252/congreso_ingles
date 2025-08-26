<div>
    {{-- total certificates widget --}}
    <div class="card overflow-hidden" style="min-width: 12rem">
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h6>Certificates</h6>
            <div class="d-flex align-items-end mb-2">
                <div class="display-4 fs-4 fw-semi-bold font-sans-serif text-danger" data-countup="{&quot;endValue&quot;:{{ $certificates }},&quot;decimalPlaces&quot;:0,&quot;suffix&quot;:&quot;&quot;}">{{ $certificates }}</div>
                <span class="ms-1 text-muted h4 mb-0">
                    <i class="fas fa-graduation-cap"></i>
                </span>
            </div>
        </div>
    </div>
</div>
