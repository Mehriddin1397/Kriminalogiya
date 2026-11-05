<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('main')}}" class="b-brand" target="_blank" title="Saytni ko'rish">
                <img src="{{asset('assets/images/logoo.jfif')}}" alt="Kriminologiya" style="width: 50px; height: 50px; border-radius: 8px; object-fit: cover;" class="logo logo-lg" />
                <span class="ms-2 fw-bold text-white fs-14 logo logo-lg">Kriminologiya</span>
                <img src="{{asset('assets/images/logoo.jfif')}}" alt="Logo" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Asosiy</label>
                </li>
                
                {{-- Boshqaruv paneli --}}
                <li class="nxl-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-grid"></i></span>
                        <span class="nxl-mtext">Boshqaruv paneli</span>
                    </a>
                </li>

                <li class="nxl-item nxl-caption">
                    <label>Bo'limlar</label>
                </li>

                {{-- Axborot xizmati --}}
                <li class="nxl-item nxl-hasmenu {{ request()->routeIs('news.*', 'announcements.*', 'videos.*', 'site-images.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-bell"></i></span>
                        <span class="nxl-mtext">Axborot xizmati</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('news.index')}}"><i class="feather-file-text me-2"></i>Yangiliklar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('announcements.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('announcements.index')}}"><i class="feather-alert-circle me-2"></i>E'lonlar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('videos.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('videos.index')}}"><i class="feather-video me-2"></i>Videolar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('site-images.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('site-images.index')}}"><i class="feather-image me-2"></i>Sayt rasmlari</a>
                        </li>
                    </ul>
                </li>

                {{-- Institut --}}
                <li class="nxl-item nxl-hasmenu {{ request()->routeIs('rahbariyat.*', 'institut.*', 'partner.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-shield"></i></span>
                        <span class="nxl-mtext">Institut</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->routeIs('rahbariyat.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('rahbariyat.index')}}"><i class="feather-users me-2"></i>Rahbariyat</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('institut.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('institut.index')}}"><i class="feather-layers me-2"></i>Tuzilma va ishga qabul</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('partner.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('partner.index')}}"><i class="feather-briefcase me-2"></i>Hamkorlar</a>
                        </li>
                    </ul>
                </li>

                {{-- Ilmiy faoliyat va Jurnallar --}}
                <li class="nxl-item nxl-hasmenu {{ request()->routeIs('journal.*', 'issues.*', 'papers.*', 'academia.*', 'articles.*', 'bibliophilia.*', 'resources.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-book-open"></i></span>
                        <span class="nxl-mtext">Ilmiy nashrlar</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->routeIs('journal.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('journal.index')}}"><i class="feather-book me-2"></i>Jurnallar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('issues.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('issues.index')}}"><i class="feather-folder me-2"></i>Jurnal sonlari</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('papers.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('papers.index')}}"><i class="feather-file me-2"></i>Maqolalar (PDF)</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('academia.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('academia.index')}}"><i class="feather-award me-2"></i>Ilmiy Kengash & PDF</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('articles.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('articles.index')}}"><i class="feather-bookmark me-2"></i>Dissertatsiya mavzulari</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('bibliophilia.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('bibliophilia.index')}}"><i class="feather-book-open me-2"></i>Kitobxonlik</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('resources.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('resources.index')}}"><i class="feather-link me-2"></i>Foydali manbalar</a>
                        </li>
                    </ul>
                </li>

                {{-- Tadqiqotlar va Loyihalar --}}
                <li class="nxl-item nxl-hasmenu {{ request()->routeIs('explorations.*', 'research.*', 'scholars.*', 'expertise.*', 'crimes.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cpu"></i></span>
                        <span class="nxl-mtext">Tadqiqotlar</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->routeIs('explorations.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('explorations.index')}}"><i class="feather-activity me-2"></i>Ilmiy loyihalar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('research.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('research.index')}}"><i class="feather-search me-2"></i>Tadqiqotlar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('scholars.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('scholars.index')}}"><i class="feather-user-check me-2"></i>Olimlar & Izlanuvchilar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('expertise.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('expertise.index')}}"><i class="feather-check-circle me-2"></i>Ilmiy ekspertiza</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('crimes.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('crimes.index')}}"><i class="feather-alert-triangle me-2"></i>Kriminologik tahlil</a>
                        </li>
                    </ul>
                </li>

                {{-- Xalqaro hamkorlik --}}
                <li class="nxl-item nxl-hasmenu {{ request()->routeIs('memorandum.*', 'international-meeting.*', 'forums.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-globe"></i></span>
                        <span class="nxl-mtext">Xalqaro hamkorlik</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->routeIs('memorandum.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('memorandum.index')}}"><i class="feather-file me-2"></i>Memorandumlar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('international-meeting.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('international-meeting.index')}}"><i class="feather-map-pin me-2"></i>Xalqaro uchrashuvlar</a>
                        </li>
                        <li class="nxl-item {{ request()->routeIs('forums.*') ? 'active' : '' }}">
                            <a class="nxl-link" href="{{route('forums.index')}}"><i class="feather-message-square me-2"></i>Forumlar</a>
                        </li>
                    </ul>
                </li>

                <li class="nxl-item nxl-caption">
                    <label>Tizim</label>
                </li>

                {{-- Murojaatlar --}}
                <li class="nxl-item {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                    <a href="{{route('contact.index')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-mail"></i></span>
                        <span class="nxl-mtext">Murojaatlar / Aloqa</span>
                    </a>
                </li>

                {{-- So'rovnomalar --}}
                <li class="nxl-item {{ request()->routeIs('surveys.*') ? 'active' : '' }}">
                    <a href="{{route('surveys.index')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-bar-chart-2"></i></span>
                        <span class="nxl-mtext">So'rovnomalar</span>
                    </a>
                </li>

                {{-- Kategoriyalar --}}
                <li class="nxl-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <a href="{{route('categories.index')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-tag"></i></span>
                        <span class="nxl-mtext">Kategoriyalar</span>
                    </a>
                </li>

                {{-- Saytga o'tish --}}
                <li class="nxl-item mt-3">
                    <a href="{{route('main')}}" target="_blank" class="nxl-link text-primary">
                        <span class="nxl-micon"><i class="feather-external-link"></i></span>
                        <span class="nxl-mtext fw-bold">Saytni ochish ↗</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
