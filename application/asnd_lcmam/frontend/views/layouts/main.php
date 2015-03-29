<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<img src="images/asnd_banner.png" id="image" style="width:300px; position:fixed; margin-top:-10px;" >',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            if (Yii::$app->user->isGuest) {
            $menuItems = [
                ['label' => 'HOME', 'url' => ['/site/about']],
                ['label' => 'CALENDAR', 'url' => ['site/calendar']],            
                ['label' => 'REFLECTIONS', 'url' => ['/site/reflections']],
                ['label' => 'NOTES', 'url' => ['/site/notes']],
                ['label' => 'ABOUT', 'url' => ['/site/about']],
                ['label' => 'CONTACT', 'url' => ['/site/contact']],
            ];
                $menuItems[] = ['label' => 'SIGNUP', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'LOGIN', 'url' => ['/site/login']];
            } else {
                $menuItems = [
                    ['label' => 'HOME', 'url' => ['/site/about']],
                    ['label' => 'CALENDAR', 'url' => ['site/calendar']],            
                    ['label' => 'REFLECTIONS', 'url' => ['/site/reflections']],
                    ['label' => 'NOTES', 'url' => ['/site/notes']],
                   // ['label' => 'ABOUT', 'url' => ['/site/about']],
                    ['label' => 'CONTACT', 'url' => ['/site/contact']],
                    ['label' => 'ACTIVITIES', 'items' => [  

                        '<li class="dropdown-header">CREATE</li>',
                        '<li class="divider"></li>',              
                        ['label' => 'Event Determinant', 'url' => '#'],
                        
                        '<li class="divider"></li>',
                        '<li class="dropdown-header">VIEW/UPDATE</li>',
                        '<li class="divider"></li>',
                        ['label' => 'Event Determinant', 'url' => '#'],
                        ['label' => 'Events', 'url' => '#'],
                        ['label' => 'Solemnities and Feasts', 'url' => '#'],
                        ['label' => 'Sunday Readings', 'url' => '#'],
                        ['label' => 'Weekday Readings', 'url' => '#'],
                        ['label' => 'User', 'url' => '#'], 
                        

                        '<li class="divider"></li>',
                        '<li class="dropdown-header">DELETE</li>',
                        '<li class="divider"></li>',
                        ['label' => 'Event Determinant', 'url' => '#'],
                        ['label' => 'Events', 'url' => '#'],

                        ]
                    ], 
                ];
            $menuItems[] = [ 
                    'label' => 'LOGOUT (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end(); 
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
