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
			->addSelect('product-slider-type', ['label' => "Wybierz typ slajdera"])
				->addChoices(['bg-duo' => 'Dwa zdjęcia'], ['bg' => 'Jedno zdjęcie'])
				->addRepeater('product-slider-gallery', ['label' => 'Zdjęcia produktu', 'button_label' => 'Dodaj zdjęcie', 'layout' => 'row', 'min' => 1, 'max' => 15, 'required' => true])
					->addImage('product-slider-gallery-img', ['label' => 'Zdjęcie'])
				->endRepeater()

		->addTab('product-variations', ['label' => 'Przykładowe Wykończenia'])
			->addText('product-variations-title', ['label' => 'Tytuł sekcji', 'required' => true, 'default_value' => 'Przykładowe wykończenia'])
			->addRepeater('product-variations-gallery', ['label' => 'Przykładowe zdjęcia', 'button_label' => 'Dodaj zdjęcie', 'layout' => 'row', 'min' => 1, 'max' => 10])
			->addImage('product-variations-gallery-img', ['label' => 'Zdjęcie']);

add_action('acf/init', function() use ($product) {
   acf_add_local_field_group($product->build());
});