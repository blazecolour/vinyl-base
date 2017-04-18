<?php

namespace app\components\widgets\artist;
use yii\web\AssetBundle;

class ArtistWidgetAsset extends AssetBundle

{
	public $sourcePath = '@app/components/widgets/artist/assets';

	public $css = [
	// 'css/artist.scss'
	];

	public $js = [
		// 'js/adv-widget.js'
	];

	public $depends = [
	'yii\web\YiiAsset',
	'yii\bootstrap\BootstrapAsset',
	];
}