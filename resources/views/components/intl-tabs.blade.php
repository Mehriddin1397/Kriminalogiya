@props(['active'])

<div class="lx-tl-tabs lx-intl-tabs" data-aos="fade-up" role="tablist">
    <a href="{{ route('international_partners') }}"
       class="lx-tl-tab {{ $active === 'partners' ? 'is-active' : '' }}"
       role="tab" aria-selected="{{ $active === 'partners' ? 'true' : 'false' }}">
        <span class="lx-tl-tab-icon" aria-hidden="true">🤝</span>
        {{ __('lan.xalqaro_hamkorlar') }}
    </a>
    <a href="{{ route('memorandums') }}"
       class="lx-tl-tab {{ $active === 'memorandums' ? 'is-active' : '' }}"
       role="tab" aria-selected="{{ $active === 'memorandums' ? 'true' : 'false' }}">
        <span class="lx-tl-tab-icon" aria-hidden="true">📜</span>
        {{ __('lan.memorandumlar') }}
    </a>
</div>
