# Theme Developer Docs

## Custom Functions

<details>
<summary>Building a block with wpcli</summary>

<p>In order to build a block, run the following wpcli script.</p>

<p>Note: If you're using Local, you can open the shell from within Local to do this.
<code>Sitename -> Open site shell</code>.</p>

<code>
wp wds create_portable_block myblock --title="This is myblock" --desc="This block
is used for wds." --keyword="myblock" --icon="table-row-before" --namespace="wds"
</code>

<p>This will scaffold out a block inside of the <code>blocks</code> folder in the
theme. Replace <code>myblock</code> with the name of your block and update the
other items <code>title</code>, <code>desc</code>, <code>keyword</code>, <code>icon</code>,
<code>namespace</code> with the appropriate information.</p>
</details>
