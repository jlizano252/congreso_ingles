<div class="container-fluid mt-5">

    {{-- Página --}}
    <div class="container-fluid mt-5 pt-5">
        {{-- Título --}}
        <div class="text-center mb-5">
            <h2 style="color: var(--congreso-azul); font-weight: 800; letter-spacing: 1px;">
                V ENGLISH TEACHING CONGRESS
                <br>
                <span style="color: #f57c00;">OF THE NORTHERN HUETAR REGION 2025</span>
            </h2>
            <p class="text-muted fs-6">Registered presenters participating in this event</p>
        </div>

        {{-- Tarjetas --}}
        <div class="d-flex justify-content-center">
            <div class="card p-4 shadow-lg border-0" style="border-radius: 18px; background-color: #ffffff; width: 95%; max-width: 1200px;">

                {{-- Buscador --}}
                <div class="d-flex justify-content-end mb-4">
                    <div class="input-group" style="max-width: 280px;">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fas fa-search text-secondary"></i>
                        </span>
                        <input wire:model.debounce.500ms="search" type="text" class="form-control form-control-sm border-start-0 shadow-none" placeholder="Search presenter..." />
                    </div>
                </div>

                {{-- Grid de expositores --}}
                <div class="row g-4">
                    @forelse($expositors as $user)
                    @php
                    $applicant = $user->applicant ?? null;
                    @endphp

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="expositor-card text-center p-4 shadow-sm h-100 border-0">
                            @if($applicant && $applicant->photo)
                            <img src="{{ asset('storage/' . $applicant->photo) }}" alt="{{ $user->name }}" class="rounded-circle mb-3 border border-3" style="width: 100px; height: 100px; object-fit: cover; border-color: var(--congreso-azul);">
                            @else
                            <i class="fas fa-user-circle fa-5x text-secondary mb-3"></i>
                            @endif

                            <h5 class="fw-bold mb-1" style="color: var(--congreso-azul);">
                                {{ $applicant->prefijo ?? '-' }}. {{ $user->name ?? 'Unknown' }} {{ $user->lastname ?? '' }}
                            </h5>

                            <span class="expositor-badge">{{ $applicant->academic_title ?? '—' }}</span>

                            <p class="mb-0 text-muted"><strong>Email:</strong> {{ $user->email ?? '-' }}</p>
                            <p class="mb-0 text-muted"><strong>Biography:</strong> {{ $applicant->exp ?? '-' }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="text-muted fw-bold mt-3">No registered speakers found.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>