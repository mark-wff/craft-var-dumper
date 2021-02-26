# Craft-Var-Dumper plugin for Craft CMS 3.x

Activates the Symfony VarDumper in Twig.
The VarDumper component provides mechanisms for extracting the state out of any PHP variables.
Built on top, it provides a better dump() function that you can use instead of var_dump. With a
nice Frontend-View.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require mark-wff/craft-var-dumper

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Craft-Var-Dumper.

## Using Craft-Var-Dumper

some Twig-Demo's:

```
    // dump everything.
    {{ dump() }}

    // dump Variable.
    {{ dump(myVariable) }}

    // dump multiple Variables.
    {{ dump(myVariable, mySecondVariable) }}
```

## Craft-Var-Dumper Roadmap

Brought to you by [Mark Wolff](https://github.com/markwff)
