# Theme Developer Docs

## Custom Functions

### Building a block with wpcli

In order to build a block, run the following wpcli script.

Note: If you're using Local, you can open the shell from within Local to do this.
`Sitename -> Open site shell`

```PHP
wp wds create_portable_block myblock --title="This is myblock" --desc="This block
is used for wds." --keyword="myblock" --icon="table-row-before" --namespace="wds"
```

This will scaffold out a block inside of the `blocks` folder in the theme. Replace
`myblock` with the name of your block and update the other items `title`, `desc`,
`keyword`, `icon`, `namespace` with the appropriate
information.
