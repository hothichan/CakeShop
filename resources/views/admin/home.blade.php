@extends('admin.index')

@section('main')

    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3>Default Dashboard</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="dashboard_breadcam text-end"
                                >
                                    <p>
                                        <a href="index.html"
                                            >Dashboard</a
                                        >
                                        <i
                                            class="fas fa-caret-right"
                                        ></i>
                                        Address Book
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-8 col-xl-8">
                    <div class="white_box mb_30 card_height_100">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb_25">Overview</h3>
                            </div>
                        </div>
                        <div class="activity_progressbar">
                            <div class="single_progressbar d-flex">
                                <h6>Active Listings</h6>
                                <div id="bar1" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span
                                        class="fill"
                                        data-percentage="10"
                                    ></span>
                                </div>
                            </div>
                            <div class="single_progressbar d-flex">
                                <h6>Claimed Listings</h6>
                                <div id="bar2" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span
                                        class="fill"
                                        data-percentage="75"
                                    ></span>
                                </div>
                            </div>
                            <div class="single_progressbar d-flex">
                                <h6>Reported Listings</h6>
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span
                                        class="fill"
                                        data-percentage="55"
                                    ></span>
                                </div>
                            </div>
                            <div class="single_progressbar d-flex">
                                <h6>Pending Listings</h6>
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span
                                        class="fill"
                                        data-percentage="25"
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div
                        class="list_counter_wrapper white_box mb_30 p-0 card_height_100"
                    >
                        <div class="single_list_counter">
                            <h3 class="green_color">
                                <span class="counter green_color"
                                    >50</span
                                >
                                +
                            </h3>
                            <p>Total categories</p>
                        </div>
                        <div class="single_list_counter">
                            <h3 class="blue_color">
                                <span class="counter blue_color"
                                    >100</span
                                >
                                +
                            </h3>
                            <p>Total Listing</p>
                        </div>
                        <div class="single_list_counter">
                            <h3 class="deep_blue">
                                <span class="counter deep_blue"
                                    >20</span
                                >
                                +
                            </h3>
                            <p>Claimed Listing</p>
                        </div>
                        <div class="single_list_counter">
                            <h3 class="red_color">
                                <span class="counter red_color"
                                    >10</span
                                >
                                +
                            </h3>
                            <p>Reported Listing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="white_box card_height_100">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="m-0">Recent Activity</h3>
                            </div>
                        </div>
                        <div class="Activity_timeline">
                            <ul>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div
                                        class="timeLine_inner d-flex align-items-center"
                                    >
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>
                                                Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit. Quisque
                                                scelerisque
                                            </p>
                                        </div>
                                        <div
                                            class="notification_read_btn mb_10"
                                        >
                                            <a
                                                href="#"
                                                class="notification_btn"
                                                >Read</a
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div
                                        class="timeLine_inner d-flex align-items-center"
                                    >
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>
                                                Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit. Quisque
                                                scelerisque
                                            </p>
                                        </div>
                                        <div
                                            class="notification_read_btn mb_10"
                                        >
                                            <a
                                                href="#"
                                                class="notification_btn"
                                                >Read</a
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div
                                        class="timeLine_inner d-flex align-items-center"
                                    >
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>
                                                Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit. Quisque
                                                scelerisque
                                            </p>
                                        </div>
                                        <div
                                            class="notification_read_btn mb_10"
                                        >
                                            <a
                                                href="#"
                                                class="notification_btn"
                                                >Read</a
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div
                                        class="timeLine_inner d-flex align-items-center"
                                    >
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>
                                                Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit. Quisque
                                                scelerisque
                                            </p>
                                        </div>
                                        <div
                                            class="notification_read_btn mb_10"
                                        >
                                            <a
                                                href="#"
                                                class="notification_btn"
                                                >Read</a
                                            >
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="white_box QA_section card_height_100 blud_card"
                    >
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0 text_white">
                                    2400 + New Users
                                </h3>
                            </div>
                        </div>
                        <div class="content_user">
                            <p>
                                At vero eos et accusamus et iusto odio
                                dignissimos ducimus
                            </p>
                            <a href="#" class="btn_2">Learn more</a>
                            <img src="img/users_img.png" alt />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop()