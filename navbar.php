<div id=navbar>
	<div page=index        onclick=window.location="index.php"><a>HOME</a></div>
	<div page=devices      onclick=window.location="devices.php"><a>PLC addresses</a></div>
	<div page=readings     onclick=window.location="readings.php"><a>Readings</a></div>
	<div page=calculations onclick=window.location="calculations.php"><a>Calculations</a></div>
	<div page=setpoints    onclick=window.location="setpoints.php"><a>Setpoints</a></div>
	<div page=offline      onclick=window.location="offline.php"><a>Offline</a></div>
	<div page=export       onclick=window.location="export.php"><a>Export</a></div>
	<div page=problems     onclick=window.location="problems.php"><a>Problems</a></div>
	<div page=about        onclick=window.location="about.php"><a>About</a></div>
	<!--
	<a href="/mbr/rules/rules.php">Rules</a>
	<a href="/mbr/sql.php">SQL (adv)</a>
	-->
</div>

<style>
	#navbar {
		background:#efefef;
		border-bottom:1px solid #ccc;
		padding-left:30px;
		text-shadow: 0 1px 0 #fff;
	}
	#navbar div {
		cursor:pointer;
		display:inline-block;
		padding:1em 0.5em;
	}
	#navbar div:hover {
		background:#ccc;
		transition:background 0.15s;
	}
</style>
