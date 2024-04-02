<div class="panelBox widgets">
    <div class="logo">
        <a href="./" title="Company Logo">
            <!-- <img src="assets/images/logo.webp" alt=""> -->
            Charity Wallet
        </a>
    </div>
    <h3>Main Menu</h3>
    <nav class="scrollcustom">
        <ul>
            <li>
                <a href="./" title="">
                    <small><img src="{{ asset('assets/images/icons/dashboardicon.png') }}" alt=""></small> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.donors') }}" title="">
                    <small><img src="{{ asset('assets/images/icons/walletico.png') }}" alt=""></small> Donors
                    {{-- <i class="fal fa-chevron-down chev"></i> --}}
                </a> 
            </li>
            <li>
                <a href="javascript:;" title="">
                    <small><img src="{{ asset('assets/images/icons/depositico.png') }}" alt=""></small> Deposit Funds
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        75
                    </span>
                </a>
            </li>
            <li>
                <a href="javascript:;" title="">
                    <small><img src="{{ asset('assets/images/icons/invoiceico.png') }}" alt=""></small>
                    Transfer Funds

                </a>

            </li>
            <li>
                <a href="javascript:;" title="">
                    <small><img src="{{ asset('assets/images/icons/ordercertificate.png') }}" alt=""></small> Order Certificates
                </a>
            </li>
            <li>
                <a href="javascript:;" title="">
                    <small><img src="{{ asset('assets/images/icons/chatico.png') }}" alt=""></small> Messages
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        New!
                    </span>
                </a>
            </li>
        </ul>
        <ul class="mt-5">
            <li>
                <a href="javascript:;" title="">
                    <small><img src="{{ asset('assets/images/icons/setting.png') }}" alt=""></small> Settings
                </a>
            </li>
        </ul>
    </nav>
</div>