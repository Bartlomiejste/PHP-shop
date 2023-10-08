<?php

return [
    'welcome' => [
        'products' => 'Produkty',
        'categories' => [
            'Elektronika' => 'Elektronika',
            'Akcesoria' => 'Akcesoria',
            'Inne' => 'Inne',
            'Jedzenie' => 'Jedzenie',
            'Odzież' => 'Odzież',      
    ],
        'price' => 'Cena',
        'filter' => 'Filtruj',
        'sort' => "Sortuj",
    ],
    'menu' =>[
        'users' => 'Użytkownicy',
        'products' => 'Produkty',
        'shopping cart' => 'Koszyk',
    ],
    'columns' => [
        'actions' => 'Akcje'
    ],
    'messages' => [
      'delete_confirm' => 'Na pewno chcesz usunąć tą pozycję?'
    ],
    'button' => [
        'save' => 'Zapisz',
        'add' => 'Dodaj',
        'edit' => 'Edytuj',
        'delete' => 'Usuń',
        'view' => 'Podgląd',
    ],
    'user' => [
        'index_title' => 'Lista użytkowników',
        'status' => [
            'delete' => [
                'success' => 'Użytkownik usunięty!'
            ],
            'update' => [
                'success' => 'Użytkownik zaktualizowany!'
            ],
        ],
    ],
    'product' => [
        'add_title' => 'Dodawanie produktu',
        'edit_title' => 'Edycja produktu: :name',
        'show_title' => 'Podgląd produktu',
        'index_title' => 'Lista produktów',
        'status' => [
            'store' => [
                'success' => 'Produkt zapisany!'
            ],
            'update' => [
                'success' => 'Produkt zaktualizowany!'
            ],
            'delete' => [
                'success' => 'Produkt usunięty!'
            ],
        ],
        'fields' => [
            'name' => 'Nazwa',
            'description' => 'Opis',
            'amount' => 'Ilość',
            'price' => 'Cena',
            'image' => 'Grafika',
            'category' => 'Kategoria',
        ]
    ]
];