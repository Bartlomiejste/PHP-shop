<?php

return [
    'welcome' => [
        'products' => 'Products',
        'categories' => [
            'Elektronika' => 'Electronic',
            'Akcesoria' => 'Accesorries',
            'Inne' => 'Others',
            'Jedzenie' => 'Food',
            'Odzież' => 'Clothes',      
    ],
        'price' => 'Price',
        'filter' => 'Search'
    ],
    'menu' =>[
        'users' => 'Users',
        'products' => 'Products',
    ],
    'columns' => [
        'actions' => 'Actions'
    ],
    'messages' => [
      'delete_confirm' => 'Are you sure?'
    ],
    'button' => [
        'save' => 'Save',
        'add' => 'Add',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'view' => 'View',
    ],
    'user' => [
        'index_title' => 'List users',
        'status' => [
            'delete' => [
                'success' => 'User deleted!'
            ],
        ],
    ],
    'product' => [
        'add_title' => 'Add product',
        'edit_title' => 'Edit product: :name',
        'show_title' => 'Show product',
        'index_title' => 'List products',
        'status' => [
            'store' => [
                'success' => 'Product stored!'
            ],
            'update' => [
                'success' => 'Product updated!'
            ],
            'delete' => [
                'success' => 'Product deleted!'
            ],
        ],
        'fields' => [
            'name' => 'Name',
            'description' => 'Description',
            'amount' => 'Amount',
            'price' => 'Price',
            'image' => 'Image',
            'category' => 'Category',
        ]
    ]
];