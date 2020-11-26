<?php
/**
 * Craft-Var-Dumper plugin for Craft CMS 3.x
 *
 * Adds Symfony Var-Dumper to Craft CMS
 *
 * @link      https://github.com/markwff
 * @copyright Copyright (c) 2019 Mark Wolff
 */

namespace markwff\craftvardumper;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class CraftVarDumper
 *
 * @author    Mark Wolff
 * @package   CraftVarDumper
 * @since     1.0.0
 *
 */
class CraftVarDumper extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftVarDumper
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new DumpExtension());

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'craft-var-dumper',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
