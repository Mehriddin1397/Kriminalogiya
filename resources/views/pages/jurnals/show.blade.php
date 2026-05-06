<x-main title="Jurnals">
    <div class="home-luxury">

        {{-- ─────── Page hero ─────── --}}
        @php
            $heroBg = collect([
                'assets/img/banner3.jpg',
                'assets/img/banner1.jpg',
                'assets/img/banner4.jpg',
                'assets/img/aa.jpg',
            ])->first(fn($p) => file_exists(public_path($p)));
        @endphp

        <section class="lx-page-hero">
            @if($heroBg)
                <div class="lx-page-hero-bg" aria-hidden="true">
                    <img src="{{ asset($heroBg) }}" alt="" loading="lazy">
                </div>
            @endif

            <div class="lx-page-hero-decor" aria-hidden="true">
                <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
            </div>

            <div class="container">
                <div class="lx-breadcrumb" data-aos="fade-up">
                    <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') ?? 'Bosh sahifa' }}</a>
                    <span class="sep">—</span>
                    <a href="{{ route('journals_index') }}">{{ __('lan.ilm_jurnal') ?? 'Bosh sahifa' }}</a>
                    <span class="sep">—</span>
                    <span>{{ $journal->name }}</span>
                </div>

                <span class="lx-eyebrow" data-aos="fade-up">{{ __('lan.ilm_jurnal') }}</span>
                <h1 class="lx-page-title" data-aos="fade-up">{{ $journal->name }}</h1>
                <div class="lx-page-divider" data-aos="fade-up"></div>
                <p class="lx-page-meta" data-aos="fade-up">



                </p>
            </div>
        </section>

        {{-- ─────── News list ─────── --}}
        <section class="lx-section" style="background: var(--lx-cream);">
            <div class="container">

                <div class="container py-5">

                    <!-- 🔥 TOP: jurnal info -->
                    <div class="row align-items-center mb-5">

                        <!-- RASM -->
                        <div class="col-md-5 text-center">
                            @if($photo = $journal->photos->first())
                                <img src="{{ asset('storage/'.$photo->file_path) }}"
                                     class="img-fluid rounded shadow"
                                     style="max-height:400px; object-fit:cover;">
                            @endif
                        </div>

                        <!-- MA'LUMOT -->
                        <div class="col-md-7">
                            <h2 class="fw-bold mb-3">{{ $journal->name }}</h2>

                            <p class="mb-2">
                                {!! $journal->description !!}
                            </p>

                            <p><b>E-ISSN:</b> {{ $journal->e_issn }}</p>

                            <!-- PDF BUTTON -->
                            @if($journal->file_path)
                                <a href="{{ asset('storage/'.$journal->file_path) }}"
                                   target="_blank"
                                   class="btn btn-danger mt-2">
                                    📄 Jurnalni PDF ko‘rish
                                </a>
                            @endif
                        </div>

                    </div>


                    <!-- 🔥 ISSUE TANLASH -->
                    <div class="mb-4">
                        <label class="fw-bold mb-2">Jurnal sonini tanlang:</label>

                        <select id="issueSelect" class="form-select w-50">
                            <option value="">-- Tanlang --</option>

                            @foreach($journal->issues as $issue)
                                <option value="{{ $issue->id }}">
                                    № {{ $issue->number }} ({{ $issue->year }})
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <!-- 🔥 MAQOLALAR -->
                    <div id="papersContainer">
                        <p class="text-muted">Iltimos, jurnal sonini tanlang...</p>
                    </div>

                </div>


                <!-- 🔥 JS -->
                <script>
                    const issues = @json($journal->issues->load('papers'));

                    document.getElementById('issueSelect').addEventListener('change', function () {

                        let issueId = this.value;
                        let container = document.getElementById('papersContainer');

                        if (!issueId) {
                            container.innerHTML = '<p class="text-muted">Iltimos, jurnal sonini tanlang...</p>';
                            return;
                        }

                        let issue = issues.find(i => i.id == issueId);

                        if (!issue || !issue.papers.length) {
                            container.innerHTML = '<p class="text-danger">Maqola topilmadi</p>';
                            return;
                        }

                        let html = `
            <h4 class="mb-3">Maqolalar (${issue.papers.length})</h4>
            <ul class="list-group">
        `;

                        issue.papers.forEach(paper => {
                            html += `
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <div>
                        <b>${paper.title_uz ?? paper.title}</b><br>
                        <small class="text-muted">${paper.author}</small><br>
                        <small class="text-secondary">👁 ${paper.views} marta ko‘rilgan</small>
                    </div>

                    <a href="/journals/paper/${paper.id}" class="btn btn-sm btn-primary">
                        Ochish
                    </a>

                </li>
            `;
                        });

                        html += '</ul>';

                        container.innerHTML = html;
                    });
                </script>



            </div>
        </section>

    </div>
</x-main>
