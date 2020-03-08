<?php

$product = new StoutLogic\AcfBuilder\FieldsBuilder('product', ['title' => 'Produkt']);
$product
	->setLocation('post_type', '==', 'product')
	->setGroupConfig('position','acf_after_title');

$product
		->addTab('product-settings', ['label' => 'Opcje produktu'])
			->addTrueFalse('product-is-online', ['label' => 'Produkt dostępny tylko online', 'instructions' => 'Zaznacz jeśli produkt dostępny jest tylko online.'])
			->addText('product-desc-title', ['label' => 'Tytuł sekcji opisu produktu', 'required' => true, 'default_value' => 'O PRODUKCIE'])
			->addMessage('Opis produktu', '<p class="warning">Opis produktu umieść w przeznaczonym do tego polu wbudowanym Woocommerce, które znajduje się poniżej.</p>')
			->addImage('product-share-image', ['label' => 'Pinterest - obraz udostępniania', 'required' => true])
			 ->addRepeater('product-addons', ['label' => 'Informacje dodatkowe', 'button_label' => 'Dodaj informacje', 'layout' => 'row', 'instructions' => 'Tutaj umieść dodatkowe informacje o produkcje takie jak wymiary czy wykończenie'])
				 ->addText('product-addons-title', ['label' => 'Nagłówek'])
				 ->addTextarea('product-addons-desc', ['label' => 'Treść'])
				 ->addFile('product-addons-file', ['label' => 'Załącznik (opcjonalne)'])
				 ->addText('product-addons-file-text', ['label' => 'Tytuł przycisku załącznika'])
				 ->addTrueFalse('product-addons-popup', ['label' => 'Popup', 'instructions' => 'Zaznacz jeśli chcesz utworzyć przycisk otwierający popup z rozwinięciem informacji'])
				 ->addGroup('product-popup', ['label' => 'Treść Popupu dla informacji dodatkowej'])
				 	 ->conditional('product-addons-popup', '==', '1')
					 ->addText('product-popup-btn', ['label' => 'Treść przycisku otwierającego popup', 'required' => true])
					 ->addText('product-popup-title', ['label' => 'Tytuł nad treścią w popup', 'required' => true])
					 ->addTextarea('product-popup-desc', ['label' => 'Treść w popup', 'required' => true])
					 ->addImage('product-popup-photo', ['label' => 'Zdjęcie w popupie (opcjonalne)'])
				->endRepeater()

		->addTab('product-slider', ['label' => 'Slajder'])
				->addRepeater('product-slider-gallery', ['label' => 'Zdjęcia produktu', 'button_label' => 'Dodaj zdjęcie', 'layout' => 'row', 'min' => 1, 'max' => 15, 'required' => true])
				->addSelect('product-slider-type-slide', ['label' => "Wybierz typ slajdu"])
					->addChoices(['bg-duo' => 'Dwa zdjęcia'], ['bg' => 'Jedno zdjęcie'])
				->addImage('product-slider-gallery-img', ['label' => 'Zdjęcie', 'required' => true])
				->addTrueFalse('product-slider-gallery-img-type-1', ['label' => 'Typ zdjęcia', 'instructions' => 'Zaznacz jeśli zdjęcie ma zajmować całą przestrzeń slajdu, jako tło.'])
				->addImage('product-slider-gallery-img-2', ['label' => 'Zdjęcie 2', 'required' => true])
					->conditional('product-slider-type-slide', '==', 'bg-duo')
				->addTrueFalse('product-slider-gallery-img-type-2', ['label' => 'Typ zdjęcia', 'instructions' => 'Zaznacz jeśli zdjęcie ma zajmować całą przestrzeń slajdu, jako tło.'])
					->conditional('product-slider-type-slide', '==', 'bg-duo')
				->endRepeater()

		->addTab('product-variations', ['label' => 'Przykładowe Wykończenia'])
			->addText('product-variations-title', ['label' => 'Tytuł sekcji', 'required' => true, 'default_value' => 'Przykładowe wykończenia'])
			->addRepeater('product-variations-gallery', ['label' => 'Przykładowe zdjęcia', 'button_label' => 'Dodaj zdjęcie', 'layout' => 'row', 'min' => 1, 'max' => 10])
			->addImage('product-variations-gallery-img', ['label' => 'Zdjęcie']);


add_action('acf/init', function() use ($product) {
   acf_add_local_field_group($product->build());
});

//

acf_add_options_page([
	'page_title' => get_bloginfo('name') . ' Opcje',
	'menu_title' => 'Opcje strony',
	'menu_slug'  => 'theme-options',
	'capability' => 'edit_theme_options',
	'position'   => '999',
	'autoload'   => true
]);

$options = new StoutLogic\AcfBuilder\FieldsBuilder('options', ['title' => 'Opcje']);

$options
		->setLocation('options_page', '==', 'theme-options');

		$options
				->addImage('footer-brand', ['label' => 'Logo w  stopce'])
				->addText('col-1-title', ['label' => 'Tytuł kolumny 1'])
				->addWysiwyg('col-1-content')
				->addRepeater('social-list', ['label' => 'Profile w Social Media', 'button_label' => 'Dodaj', 'layout' => 'row'])
					->addImage('social-img', ['label' => 'Ikona'])
					->addUrl('social-url', ['label' => 'Link do profilu'])
				->endRepeater()
				->addText('col-2-title', ['label' => 'Tytuł kolumny 2'])
				->addRepeater('col-2-menu', ['label' => 'Menu w  kolumnie 2', 'button_label' => 'Dodaj Link', 'layout' => 'row'])
					->addLink('col-menu-item', ['label' => 'Dodaj link'])
				->endRepeater()
				->addText('col-3-title', ['label' => 'Tytuł kolumny 3'])
				->addRepeater('col-3-menu', ['label' => 'Menu w  kolumnie 3', 'button_label' => 'Dodaj Link', 'layout' => 'row'])
					->addLink('col-menu-item', ['label' => 'Dodaj link'])
				->endRepeater()
				->addText('col-4-title', ['label' => 'Tytuł kolumny 4'])
				->addWysiwyg('col-4-content')
				->addLink('col-4-url', ['label' => 'Link pod tekstem'])
				->addTextarea('copy', ['label' => 'Copyrights text']);

add_action('acf/init', function() use ($options) {
	acf_add_local_field_group($options->build());
});