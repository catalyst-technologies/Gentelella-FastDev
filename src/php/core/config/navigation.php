<?php
$navigation = array();
$navigation['main'] = array(
    'title' => 'MAIN NAVIGATION',
    'items' => array(
        array(
            'title' => 'Dashboard',
            'icon' => 'fa fa-dashboard',
            'menu' => array(
                array(
                    'title' => 'Dashboard 1',
                    'link' => 'index'
                ),
                array(
                    'title' => 'Dashboard 2',
                    'link' => 'index2'
                )
            )
        ),
        array(
            'title' => 'Layout Option',
            'icon' => 'fa fa-files-o',
            'menu' => array(
                array(
                    'title' => 'Top Navigation',
                    'link' => 'layout/top-nav'
                ),
                array(
                    'title' => 'Boxed',
                    'link' => 'layout/boxed'
                ),
                array(
                    'title' => 'Fixed',
                    'link' => 'layout/fixed'
                ),
                array(
                    'title' => 'Collapsed Sidebar',
                    'link' => 'layout/collapsed'
                )
            )
        ),
        array(
            'title' => 'Widgets',
            'icon' => 'fa fa-th',
            'link' => 'widgets'
        ),
        array(
            'title' => 'Charts',
            'icon' => 'fa fa-pie-chart',
            'menu' => array(
                array(
                    'title' => 'ChartJS',
                    'link' => 'chart/chartjs'
                ),
                array(
                    'title' => 'Morris',
                    'link' => 'chart/morris'
                ),
                array(
                    'title' => 'Flot',
                    'link' => 'chart/flot'
                ),
                array(
                    'title' => 'inline Charts',
                    'link' => 'chart/inline'
                )
            )
        ),
        array(
            'title' => 'UI Elements',
            'icon' => 'fa fa-laptop',
            'menu' => array(
                array(
                    'title' => 'General',
                    'link' => 'ui/general'
                ),
                array(
                    'title' => 'Icons',
                    'link' => 'ui/icon'
                ),
                array(
                    'title' => 'Buttons',
                    'link' => 'ui/button'
                ),
                array(
                    'title' => 'Sliders',
                    'link' => 'ui/slider'
                ),
                array(
                    'title' => 'Timeline',
                    'link' => 'ui/timeline'
                ),
                array(
                    'title' => 'Modals',
                    'link' => 'ui/modal'
                )
            )
        ),
        array(
            'title' => 'Forms',
            'icon' => 'fa fa-edit',
            'menu' => array(
                array(
                    'title' => 'General Elements',
                    'link' => 'form/general'
                ),
                array(
                    'title' => 'Advance Element',
                    'link' => 'form/advance'
                ),
                array(
                    'title' => 'Editors',
                    'link' => 'form/editor'
                )
            )
        ),
        array(
            'title' => 'Tables',
            'icon' => 'fa fa-table',
            'menu' => array(
                array(
                    'title' => 'Simple Table',
                    'link' => 'table/simple'
                ),
                array(
                    'title' => 'Data Tables',
                    'link' => 'table/data_table'
                )
            )
        ),
        array(
            'title' => 'Calendar',
            'icon' => 'fa fa-calendar',
            'link' => 'calendar'
        ),
        array(
            'title' => 'Mailbox',
            'icon' => 'fa fa-envelope',
            'link' => 'mail'
        ),
        array(
            'title' => 'Examples',
            'icon' => 'fa fa-folder',
            'menu' => array(
                array(
                    'title' => 'Invoice',
                    'link' => 'example/invoice'
                ),
                array(
                    'title' => 'Profile',
                    'link' => 'example/profile'
                ),
                array(
                    'title' => 'Login',
                    'link' => 'example/login'
                ),
                array(
                    'title' => 'Register',
                    'link' => 'example/register'
                ),
                array(
                    'title' => 'Lockscreen',
                    'link' => 'example/lockscreen'
                ),
                array(
                    'title' => '404 Error',
                    'link' => 'example/error_404'
                ),
                array(
                    'title' => '500 Error',
                    'link' => 'example/error_500'
                ),
                array(
                    'title' => 'Blank Page',
                    'link' => 'example/blank'
                ),
                array(
                    'title' => 'Pace Page',
                    'link' => 'example/pace'
                )
            )
        ),
        array(
            'title' => 'Multilevel',
            'icon' => 'fa fa-share',
            'menu' => array(
                array(
                    'title' => 'Level One',
                    'link' => '#'
                ),
                array(
                    'title' => 'Level One',
                    'menu' => array(
                        array(
                            'title' => 'Level Two',
                            'link' => '#'
                        ),
                        array(
                            'title' => 'Level Two',
                            'menu' => array(
                                array(
                                    'title' => 'Level Three',
                                    'link' => '#'
                                ),
                                array(
                                    'title' => 'Level Three',
                                    'link' => '#'
                                )
                            )
                        )
                    )
                ),
                array(
                    'title' => 'Level One',
                    'link' => '#'
                )
            )
        ),
        array(
            'title' => 'Documentation',
            'icon' => 'fa fa-book',
            'link' => '#'
        )
    )
);
