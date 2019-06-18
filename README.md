# Craft-Var-Dumper plugin for Craft CMS 3.x

Add's Symfony Var-Dumper to Craft CMS by using 
[Twig Dump Extension](https://github.com/nlemoine/twig-dump-extension) from [nlemoine](https://github.com/nlemoine).

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

some Twig-File:

```
    // dump everything.
    {{ dump() }}
    
    // dump Variable.
    {{ dump(myVariable) }}
    
    // dump multiple Variables.
    {{ dump(myVariable, mySecondVariable) }}
```

## Craft-Var-Dumper Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [Mark Wolff](https://github.com/markwff)
