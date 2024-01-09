<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">{{ __('dashboard.navigation') }}</li>

        <li>
            <a href="{{ route('admin.dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> {{ trans_choice('dashboard.module_dashboard', 1) }} </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> {{ trans_choice('dashboard.module_blog', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.article.index') }}">{{ trans_choice('dashboard.module_blog_list', 2) }}</a>
                    <a href="{{ route('admin.article-category.index') }}">{{ trans_choice('dashboard.module_blog_category', 2) }}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="far fa-images"></i></span>
                <span> {{ trans_choice('dashboard.module_portfolio', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.portfolio.index') }}">{{ trans_choice('dashboard.module_portfolio_list', 2) }}</a>
                    <a href="{{ route('admin.portfolio-category.index') }}">{{ trans_choice('dashboard.module_portfolio_category', 2) }}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.service.index') }}">
                <span class="icon"><i class="fas fa-tools"></i></span>
                <span> {{ trans_choice('dashboard.module_service', 2) }} </span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.certificate.index') }}">
                <span class="icon"><i class="fas fa-certificate"></i></span>
                <span> {{ trans_choice('dashboard.module_certificate', 2) }} </span>
            </a>
        </li>


        {{--  <li>
            <a href="{{ route('admin.pricing.index') }}">
                <span class="icon"><i class="fas fa-tags"></i></span>
                <span> {{ trans_choice('dashboard.module_pricing', 2) }} </span>
            </a>
        </li>  --}}

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-users"></i></span>
                <span> {{ trans_choice('dashboard.module_team', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.member.index') }}">{{ trans_choice('dashboard.module_member', 2) }}</a>
                    <a href="{{ route('admin.designation.index') }}">{{ trans_choice('dashboard.module_designation', 2) }}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> {{ trans_choice('dashboard.module_faq', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.faq.index') }}">{{ trans_choice('dashboard.module_faq_list', 2) }}</a>
                    <a href="{{ route('admin.faq-category.index') }}">{{ trans_choice('dashboard.module_faq_category', 2) }}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.slider.index') }}">
                <span class="icon"><i class="fas fa-photo-video"></i></span>
                <span> {{ trans_choice('dashboard.module_slider', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.client.index') }}">
                <span class="icon"><i class="fas fa-mug-hot"></i></span>
                <span> {{ trans_choice('dashboard.module_partner', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.testimonial.index') }}">
                <span class="icon"><i class="fas fa-comments"></i></span>
                <span> {{ trans_choice('dashboard.module_testimonial', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.work-process.index') }}">
                <span class="icon"><i class="fas fa-chart-line"></i></span>
                <span> {{ trans_choice('dashboard.module_work_process', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.why-choose-us.index') }}">
                <span class="icon"><i class="fas fa-hand-point-right"></i></span>
                <span> {{ trans_choice('dashboard.module_feature', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.counter.index') }}">
                <span class="icon"><i class="fas fa-stopwatch-20"></i></span>
                <span> {{ trans_choice('dashboard.module_counter', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.contact.index') }}">
                <span class="icon"><i class="fas fa-envelope-open-text"></i></span>
                <span> {{ trans_choice('dashboard.module_email', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.subscriber.index') }}">
                <span class="icon"><i class="fas fa-mail-bulk"></i></span>
                <span> {{ trans_choice('dashboard.module_subscriber', 2) }} </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-file"></i></span>
                <span> {{ trans_choice('dashboard.module_page', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.header.index') }}">{{ trans_choice('dashboard.module_header', 2) }}</a>
                    <a href="{{ route('admin.page.index') }}">{{ trans_choice('dashboard.module_footer_page', 2) }}</a>
                    <a href="{{ route('admin.section.index') }}">{{ trans_choice('dashboard.module_section', 2) }}</a>
                    <a href="{{ route('admin.about.index') }}">{{ trans_choice('dashboard.module_about', 2) }}</a>
                </li>
            </ul>
        </li>

        {{--  <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-language"></i></span>
                <span> {{ trans_choice('dashboard.module_language', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.language.index') }}">{{ trans_choice('dashboard.module_language', 1) }} {{ __('dashboard.setup') }}</a>
                    <a href="{{ URL('admin/translation') }}" target="_blank">{{ trans_choice('dashboard.module_translation', 2) }}</a>
                </li>
            </ul>
        </li>  --}}

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> {{ trans_choice('dashboard.module_setting', 2) }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.setting.index') }}">{{ trans_choice('dashboard.module_general_setting', 2) }}</a>
                    <a href="{{ route('admin.template.index') }}">{{ trans_choice('dashboard.module_template', 2) }}</a>
                    <a href="{{ route('admin.livechat.index') }}">{{ trans_choice('dashboard.module_live_chat', 2) }}</a>
                </li>
            </ul>
        </li>

    </ul>

</div>
<!-- End Sidebar -->
