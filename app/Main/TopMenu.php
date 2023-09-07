<?php

namespace App\Main;

class TopMenu
{
    /**
     * List of top menu items.
     */
    public static function menu(): array
    {
        return [

            'الاعدادات' => [
                'icon' => 'Settings',
                'title' => 'الاعدادات',
                'sub_menu' => [
                    'users' => [
                        'icon' => 'Users',
                        'route_name' => 'users.index',
                        'can'=>'قائمة المستخدمين',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'المستخدمين'
                    ],
                    'roles' => [
                        'icon' => 'EyeOff',
                        'route_name' => 'roles.index',
                        'can'=>'صلاحيات المستخدمين',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'الصلحيات'
                    ],

                ]
            ],


            'الطلبات' => [
                'icon' => 'ShoppingCart',
                'title' => 'الطلبات',
                'sub_menu' => [
                    'orders' => [
                        'icon' => 'Database',
                        'route_name' => 'orders.index',
                        'can'=>'عرض طلب',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'عرض الطلبات'
                    ],
                    'create' => [
                        'icon' => 'Edit3',
                        'route_name' => 'orders.create',
                        'can'=>'اضافة طلب',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'اضافه طلب'
                    ],

                ]
            ],

            'menu-layout' => [
                'icon' => 'box',
                'title' => 'Menu Layout',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Side Menu'
                    ],
                   /*  'simple-menu' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Simple Menu'
                    ], */
                    'top-menu' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Top Menu'
                    ]
                ]
            ],

        ];


       /*  return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'sub_menu' => [
                    'dashboard-overview-1' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'Overview 1'
                    ],
                    'dashboard-overview-2' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-2',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'Overview 2'
                    ],
                    'dashboard-overview-3' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-3',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'Overview 3'
                    ],
                    'dashboard-overview-4' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-4',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'Overview 4'
                    ]
                ]
            ],
            'menu-layout' => [
                'icon' => 'box',
                'title' => 'Menu Layout',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Side Menu'
                    ],
                    'simple-menu' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Simple Menu'
                    ],
                    'top-menu' => [
                        'icon' => 'activity',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Top Menu'
                    ]
                ]
            ],
            'apps' => [
                'icon' => 'activity',
                'title' => 'Apps',
                'sub_menu' => [
                    'users' => [
                        'icon' => 'users',
                        'title' => 'Users',
                        'sub_menu' => [
                            'users-layout-1' => [
                                'icon' => 'zap',
                                'route_name' => 'users-layout-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 1'
                            ],
                            'users-layout-2' => [
                                'icon' => 'zap',
                                'route_name' => 'users-layout-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 2'
                            ],
                            'users-layout-3' => [
                                'icon' => 'zap',
                                'route_name' => 'users-layout-3',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 3'
                            ]
                        ]
                    ],
                    'profile' => [
                        'icon' => 'trello',
                        'title' => 'Profile',
                        'sub_menu' => [
                            'profile-overview-1' => [
                                'icon' => 'zap',
                                'route_name' => 'profile-overview-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Overview 1'
                            ],
                            'profile-overview-2' => [
                                'icon' => 'zap',
                                'route_name' => 'profile-overview-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Overview 2'
                            ],
                            'profile-overview-3' => [
                                'icon' => 'zap',
                                'route_name' => 'profile-overview-3',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Overview 3'
                            ]
                        ]
                    ],
                    'e-commerce' => [
                        'icon' => 'shopping-bag',
                        'title' => 'E-Commerce',
                        'sub_menu' => [
                            'categories' => [
                                'icon' => 'zap',
                                'route_name' => 'categories',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Categories'
                            ],
                            'add-product' => [
                                'icon' => 'zap',
                                'route_name' => 'add-product',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Add Product',
                            ],
                            'product-list' => [
                                'icon' => 'zap',
                                'route_name' => 'product-list',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Product List'
                            ],
                            'product-grid' => [
                                'icon' => 'zap',
                                'route_name' => 'product-grid',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Product Grid'
                            ],
                            'transaction-list' => [
                                'icon' => 'zap',
                                'route_name' => 'transaction-list',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Transaction List'
                            ],
                            'transaction-detail' => [
                                'icon' => 'zap',
                                'route_name' => 'transaction-detail',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Transaction Detail'
                            ],
                            'seller-list' => [
                                'icon' => 'zap',
                                'route_name' => 'seller-list',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Seller List'
                            ],
                            'seller-detail' => [
                                'icon' => 'zap',
                                'route_name' => 'seller-detail',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Seller Detail'
                            ],
                            'reviews' => [
                                'icon' => 'zap',
                                'route_name' => 'reviews',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Reviews'
                            ],
                        ]
                    ],
                    'inbox' => [
                        'icon' => 'inbox',
                        'route_name' => 'inbox',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Inbox'
                    ],
                    'file-manager' => [
                        'icon' => 'folder',
                        'route_name' => 'file-manager',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'File Manager'
                    ],
                    'point-of-sale' => [
                        'icon' => 'credit-card',
                        'route_name' => 'point-of-sale',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Point of Sale'
                    ],
                    'chat' => [
                        'icon' => 'message-square',
                        'route_name' => 'chat',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Chat'
                    ],
                    'post' => [
                        'icon' => 'file-text',
                        'route_name' => 'post',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Post'
                    ],
                    'calendar' => [
                        'icon' => 'calendar',
                        'route_name' => 'calendar',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Calendar'
                    ],
                    'crud' => [
                        'icon' => 'edit',
                        'title' => 'Crud',
                        'sub_menu' => [
                            'crud-data-list' => [
                                'icon' => 'zap',
                                'route_name' => 'crud-data-list',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Data List'
                            ],
                            'crud-form' => [
                                'icon' => 'zap',
                                'route_name' => 'crud-form',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Form'
                            ]
                        ]
                    ]
                ]
            ],
            'pages' => [
                'icon' => 'layout',
                'title' => 'Pages',
                'sub_menu' => [
                    'wizards' => [
                        'icon' => 'activity',
                        'title' => 'Wizards',
                        'sub_menu' => [
                            'wizard-layout-1' => [
                                'icon' => 'zap',
                                'route_name' => 'wizard-layout-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 1'
                            ],
                            'wizard-layout-2' => [
                                'icon' => 'zap',
                                'route_name' => 'wizard-layout-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 2'
                            ],
                            'wizard-layout-3' => [
                                'icon' => 'zap',
                                'route_name' => 'wizard-layout-3',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 3'
                            ]
                        ]
                    ],
                    'blog' => [
                        'icon' => 'activity',
                        'title' => 'Blog',
                        'sub_menu' => [
                            'blog-layout-1' => [
                                'icon' => 'zap',
                                'route_name' => 'blog-layout-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 1'
                            ],
                            'blog-layout-2' => [
                                'icon' => 'zap',
                                'route_name' => 'blog-layout-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 2'
                            ],
                            'blog-layout-3' => [
                                'icon' => 'zap',
                                'route_name' => 'blog-layout-3',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 3'
                            ]
                        ]
                    ],
                    'pricing' => [
                        'icon' => 'activity',
                        'title' => 'Pricing',
                        'sub_menu' => [
                            'pricing-layout-1' => [
                                'icon' => 'zap',
                                'route_name' => 'pricing-layout-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 1'
                            ],
                            'pricing-layout-2' => [
                                'icon' => 'zap',
                                'route_name' => 'pricing-layout-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 2'
                            ]
                        ]
                    ],
                    'invoice' => [
                        'icon' => 'activity',
                        'title' => 'Invoice',
                        'sub_menu' => [
                            'invoice-layout-1' => [
                                'icon' => 'zap',
                                'route_name' => 'invoice-layout-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 1'
                            ],
                            'invoice-layout-2' => [
                                'icon' => 'zap',
                                'route_name' => 'invoice-layout-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 2'
                            ]
                        ]
                    ],
                    'faq' => [
                        'icon' => 'activity',
                        'title' => 'FAQ',
                        'sub_menu' => [
                            'faq-layout-1' => [
                                'icon' => 'zap',
                                'route_name' => 'faq-layout-1',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 1'
                            ],
                            'faq-layout-2' => [
                                'icon' => 'zap',
                                'route_name' => 'faq-layout-2',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 2'
                            ],
                            'faq-layout-3' => [
                                'icon' => 'zap',
                                'route_name' => 'faq-layout-3',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Layout 3'
                            ]
                        ]
                    ],
                    'login' => [
                        'icon' => 'activity',
                        'route_name' => 'login',
                        'params' => [
                            'layout' => 'base'
                        ],
                        'title' => 'Login'
                    ],
                    'register' => [
                        'icon' => 'activity',
                        'route_name' => 'register',
                        'params' => [
                            'layout' => 'base'
                        ],
                        'title' => 'Register'
                    ],
                    'error-page' => [
                        'icon' => 'activity',
                        'route_name' => 'error-page',
                        'params' => [
                            'layout' => 'base'
                        ],
                        'title' => 'Error Page'
                    ],
                    'update-profile' => [
                        'icon' => 'activity',
                        'route_name' => 'update-profile',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Update profile'
                    ],
                    'change-password' => [
                        'icon' => 'activity',
                        'route_name' => 'change-password',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Change Password'
                    ]
                ]
            ],
            'components' => [
                'icon' => 'inbox',
                'title' => 'Components',
                'sub_menu' => [
                    'grid' => [
                        'icon' => 'activity',
                        'title' => 'Grid',
                        'sub_menu' => [
                            'regular-table' => [
                                'icon' => 'zap',
                                'route_name' => 'regular-table',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Regular Table'
                            ],
                            'tabulator' => [
                                'icon' => 'zap',
                                'route_name' => 'tabulator',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Tabulator'
                            ]
                        ]
                    ],
                    'overlay' => [
                        'icon' => 'activity',
                        'title' => 'Overlay',
                        'sub_menu' => [
                            'modal' => [
                                'icon' => 'zap',
                                'route_name' => 'modal',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Modal'
                            ],
                            'slide-over' => [
                                'icon' => 'zap',
                                'route_name' => 'slide-over',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Slide Over'
                            ],
                            'notification' => [
                                'icon' => 'zap',
                                'route_name' => 'notification',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Notification'
                            ],
                        ]
                    ],
                    'tab' => [
                        'icon' => 'activity',
                        'route_name' => 'tab',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Tab'
                    ],
                    'accordion' => [
                        'icon' => 'activity',
                        'route_name' => 'accordion',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Accordion'
                    ],
                    'button' => [
                        'icon' => 'activity',
                        'route_name' => 'button',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Button'
                    ],
                    'alert' => [
                        'icon' => 'activity',
                        'route_name' => 'alert',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Alert'
                    ],
                    'progress-bar' => [
                        'icon' => 'activity',
                        'route_name' => 'progress-bar',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Progress Bar'
                    ],
                    'tooltip' => [
                        'icon' => 'activity',
                        'route_name' => 'tooltip',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Tooltip'
                    ],
                    'dropdown' => [
                        'icon' => 'activity',
                        'route_name' => 'dropdown',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Dropdown'
                    ],
                    'typography' => [
                        'icon' => 'activity',
                        'route_name' => 'typography',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Typography'
                    ],
                    'icon' => [
                        'icon' => 'activity',
                        'route_name' => 'icon',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Icon'
                    ],
                    'loading-icon' => [
                        'icon' => 'activity',
                        'route_name' => 'loading-icon',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Loading Icon'
                    ]
                ]
            ],
            'forms' => [
                'icon' => 'sidebar',
                'title' => 'Forms',
                'sub_menu' => [
                    'regular-form' => [
                        'icon' => 'activity',
                        'route_name' => 'regular-form',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Regular Form'
                    ],
                    'datepicker' => [
                        'icon' => 'activity',
                        'route_name' => 'datepicker',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Datepicker'
                    ],
                    'tom-select' => [
                        'icon' => 'activity',
                        'route_name' => 'tom-select',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Tom Select'
                    ],
                    'file-upload' => [
                        'icon' => 'activity',
                        'route_name' => 'file-upload',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'File Upload'
                    ],
                    'wysiwyg-editor' => [
                        'icon' => 'activity',
                        'title' => 'Wysiwyg Editor',
                        'sub_menu' => [
                            'wysiwyg-editor-classic' => [
                                'icon' => 'zap',
                                'route_name' => 'wysiwyg-editor-classic',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Classic'
                            ],
                            'wysiwyg-editor-inline' => [
                                'icon' => 'zap',
                                'route_name' => 'wysiwyg-editor-inline',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Inline'
                            ],
                            'wysiwyg-editor-balloon' => [
                                'icon' => 'zap',
                                'route_name' => 'wysiwyg-editor-balloon',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Balloon'
                            ],
                            'wysiwyg-editor-balloon-block' => [
                                'icon' => 'zap',
                                'route_name' => 'wysiwyg-editor-balloon-block',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Balloon Block'
                            ],
                            'wysiwyg-editor-document' => [
                                'icon' => 'zap',
                                'route_name' => 'wysiwyg-editor-document',
                                'params' => [
                                    'layout' => 'top-menu'
                                ],
                                'title' => 'Document'
                            ],
                        ]
                    ],
                    'validation' => [
                        'icon' => 'activity',
                        'route_name' => 'validation',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Validation'
                    ]
                ]
            ],
            'widgets' => [
                'icon' => 'hard-drive',
                'title' => 'Widgets',
                'sub_menu' => [
                    'chart' => [
                        'icon' => 'activity',
                        'route_name' => 'chart',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Chart'
                    ],
                    'slider' => [
                        'icon' => 'activity',
                        'route_name' => 'slider',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Slider'
                    ],
                    'image-zoom' => [
                        'icon' => 'activity',
                        'route_name' => 'image-zoom',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Image Zoom'
                    ]
                ]
            ]
        ]; */
    }
}
